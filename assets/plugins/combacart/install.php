<?php

function recursiveDelete($dir)
{
    foreach (new RecursiveIteratorIterator(
                 new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
                 RecursiveIteratorIterator::CHILD_FIRST
             ) as $fileinfo) {
        $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
        $todo($fileinfo->getRealPath());
    }
    rmdir($dir);
}

function echoo(string $str)
{
    if (PHP_SAPI !== 'cli') {
        $str = str_replace("\n", "<br>", $str);
    }

    echo $str;
}

function diee(string $str)
{
    echoo("FAIL\n");
    die($str);
}

// Перевірка наявності папки vendor
if (is_dir('vendor')) {
    diee("Помилка: Папка 'vendor' існує. Завершення роботи.\n");
}

$zipUrl = 'https://github.com/zatomant/combacart/archive/refs/heads/main.zip';
$tempDir = sys_get_temp_dir() . '/combacart_temp';
$zipFile = $tempDir . '/combacart.zip';

// Створюємо тимчасову директорію, якщо її немає
if (!is_dir($tempDir)) {
    mkdir($tempDir, 0777, true);
}

echoo("Завантаження архіву...");
if (!file_put_contents($zipFile, file_get_contents($zipUrl))) {
    diee("Помилка при завантаженні архіву $zipUrl\n");
}
echoo("OK\n");

$zip = new ZipArchive;
if ($zip->open($zipFile) === TRUE) {
    echo "Розпакування архіву...";
    if (!$zip->extractTo($tempDir)) {
        diee("Помилка при розпакуванні архіву.\n");
    }
    $zip->close();
} else {
    diee("Не вдалося відкрити ZIP-архів.\n");
}
echoo("OK\n");

$sourceDir = $tempDir . '/combacart-main';
$targetDir = './';

echoo("Копіювання файлів...");
if (is_dir($sourceDir)) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($files as $fileinfo) {
        $targetPath = $targetDir . DIRECTORY_SEPARATOR . $files->getSubPathName();
        if ($fileinfo->isDir()) {
            if (!is_dir($targetPath)) {
                if (!mkdir($targetPath, 0777, true)){
                    diee("Не вдалось створити папку, можливо відсутні права.\n");
                }
            }
        } else {
            if (!copy($fileinfo, $targetPath)){
                diee("Не вдалось скопіювати файл, можливо відсутні права.\n");
            }
        }
    }
    // Видаляємо тимчасову папку
    recursiveDelete($sourceDir);
} else {
    diee("Не знайденo папку 'combacart-main' в архіві.\n");
}
echoo("OK\n");

echoo("Видалення тимчасових файлів...");
array_map('unlink', glob("$tempDir/*"));
rmdir($tempDir); // Видаляємо тимчасову папку
echoo("OK\n");

echoo("Встановлення залежностей...");
chdir($targetDir);
exec('composer install --no-interaction --ansi', $output, $returnCode);

// Перевіряємо на помилки
if ($returnCode !== 0) {
    diee("Помилка при встановленні залежностей Composer:\n" . implode("\n", $output));
}
echoo("OK\n");

echoo("\nCombaCart успішно встановлено!\n");
