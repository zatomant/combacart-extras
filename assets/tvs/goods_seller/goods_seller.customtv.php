<?php

/**
 * goods_seller
 * кастомний TV
 * з перевіркою прив'язки Продавців до Користувача (mgr)
 *
 * щоб зробити прив'язку вставте в поле comment користувача
 * <seller></seller> з переліком uid Продавців розділениї через ';'
 */

if (!IN_MANAGER_MODE) {
    die('<h1>ERROR:</h1><p>Please use the EVO Content Manager instead of accessing this file directly.</p>');
}

global $row;

$field_elements = !empty($field_elements) ? $field_elements : '@EVAL return $modx->runSnippet("GoodsFunctions", ["fnct"=>"getSellers"]);';
list ($cmd, $param) = ParseCommand($field_elements);
$cmd = trim($cmd);
$param = parseTvValues($param, $tvsArray);
$_tres = eval ($param);
switch ($cmd) {
    case 'EVAL' : // evaluates text as php codes return the results
        try {
            $_sellers = array_map(fn($p) => array_combine(['label', 'uid'], explode('==', $p)), explode('||', $_tres));
        } catch (Throwable $e) {
            $_sellers = [];
        }
        break;
}

/*
 * Перевіряти прив'язки Користувача до Продавців?
 */
if (defined('COMBAMODX_MANAGER_SELLER_CHECK') && COMBAMODX_MANAGER_SELLER_CHECK) {

    $mgr = $modx->getUserInfo($modx->getLoginUserID());
    $_sellers_bind = null;
    if (preg_match('/<seller>(.*?)<\/seller>/', $mgr['comment'], $matches)) {
        $_sellers_bind = explode(';', $matches[1]);
    }

    if (empty($_sellers_bind) || empty(array_filter($_sellers_bind))) {
        // Якщо немає приив'язок
        $filtered_sellers = $_sellers;
    } else {
        // Спочатку в перелік додаємо Продавців, де 'uid' співпадає з $field_value
        $filtered_sellers = array_filter($_sellers, function($seller) use ($field_value) {
            return $seller['uid'] == $field_value;
        });
        if (in_array($field_value,$_sellers_bind)) {
            // і далі додаємо тих чиї 'uid' присутні в $_sellers_bind
            $filtered_sellers = array_merge($filtered_sellers, array_filter($_sellers, function ($seller) use ($_sellers_bind) {
                return in_array($seller['uid'], $_sellers_bind);
            }));
        }
        $filtered_sellers = array_values(array_unique($filtered_sellers, SORT_REGULAR));
        $disabled_select = ' style="background-color: orange"';
    }
} else {
    $filtered_sellers = $_sellers;
}

foreach ($filtered_sellers as $row) {
    $selected = ($row['uid'] == $field_value) ? 'selected="selected"' : '';
    $output .= "<option value='" . $row['uid'] . "' " . $selected . ">" . $row['label'] . "</option>";
}
echo '
<select id="tv' . $field_id . '" name="tv' . $field_id . '" size="1" onchange="documentDirty=true;" ' . $disabled_select . '>
    ' . $output . '
</select>
';
if (!empty($disabled_select)) {
    echo '<div class="text-warning">* активна перевірка прив\'язок до Продавців</div>';
}