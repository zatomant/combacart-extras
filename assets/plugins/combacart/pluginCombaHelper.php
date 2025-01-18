<?php
/**
 * CombaHelper
 *
 * цей файл буде перезаписаний після встановлення CombaCart
 *
 * @category    plugin
 * @version     2.6
 * @package     evo
 * @internal    @events OnDocFormSave,OnWebPageInit,OnPageNotFound,OnWebPagePrerender
 * @internal    @modx_category Comba
 * @author      zatomant
 * @lastupdate  26-03-2025
 */

if (!defined('MODX_BASE_PATH')) {
    die('What are you doing? Get out of here!');
}

global $modx;
$e = $modx->event;

if ($e->name == 'OnPageNotFound') {
    // сторінка керування замовленнями, за замовчуванням
    // site_url/comba
    if (strpos($_SERVER['REQUEST_URI'], 'comba') !== false) {
        header("Location: /assets/plugins/combacart/update");
        exit;
    }
}
