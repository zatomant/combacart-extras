## Важливо! ## 
Використовуйте цей пакет для зручного встановлення плагіну CombaCart через модуль Extras в EVO 1.4+ та Evolution CMS 3+ [github.com](https://github.com/evolution-cms/evolution)    
Цей extras пакет в автоматичному режимі створює шаблони, сніпети, ТВ та плагін для роботи CombaCart.  
Крок 5 стадії встановлення оновлює CombaCart та його залежності до актуальної версії.  

Детальна інформація саме про CombaCart [github.com](https://github.com/zatomant/combacart)  

## Встановлення ##
  
Кроки:  
1. завантажте останній реліз "CombaCart extras" з [github.com](https://github.com/zatomant/combacart-extras/archive/refs/heads/main.zip)
2. авторизуйтесь в адміністративній частині Evolution CMS ( /manager )
3. запустіть модуль Extras, перейдіть до опції «Install by file», виберіть завантажений файл і натисніть «Install».
4. дочекайтесь закінчення процесу інсталяції extras пакету
5. відкрийте в браузері сторінку ваш_сайт/comba (або ваш_сайт/assets/plugins/combacart/update) для завершального кроку інсталяції - оновлення composer залежностей  

Якщо на завершальному кроці (5) ви отримуєте помилку 504 Gateway Time-out, оновіть сторінку.  
Або запустіть скрипт напряму через консоль веб серверу:  
```
cd коренева_тека_вашого_сайту_/assets/plugins/combacart/update
php process.php
```

Важливо! Видаліть файл 'combacart/update/lock.php', щоб дозволити виконання кроку 5 с самого спочатку.  

##  Наявність composer ##  
  
Якщо отримали повідомлення "Composer не знайдено. Встановіть Composer перед виконанням цього оновлення.", а ви впевнені що він є, перевірте шлях до composer.

Зазвичай, шлях до composer регулюється глобально системно, але ви можете примусово вказати повний шлях файлу composer. 
Файл update/process.php строка 11
```
private const COMPOSER_PATH = 'composer';
```
наприклад 
```
private const COMPOSER_PATH = '/usr/local/bin/composer';
```
або
```
private const COMPOSER_PATH = '/usr/bin/composer';
```
або додатково ще вказати версію php
```
private const COMPOSER_PATH = 'php8.1 /usr/bin/composer';
```
