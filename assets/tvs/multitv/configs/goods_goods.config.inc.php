<?php

$settings['display'] = 'datatable';
$settings['fields'] = [
    'goods_avail' => [
        'caption' => 'Наявність',
        'type' => 'text',
        'width' => '25'
    ],
    'goods_price' => [
        'caption' => 'Ціна',
        'type' => 'text',
        'width' => '60'
    ],
    'goods_price_old' => [
        'caption' => 'Ціна стара',
        'type' => 'text',
        'width' => '60'
    ],
    'goods_code' => [
        'caption' => 'Код товару',
        'type' => 'text',
        'width' => '80'
    ],
    'goods_name' => [
        'caption' => 'Назва',
        'type' => 'text',
        'width' => '200'
    ],
    'thumb' => [
        'caption' => 'Thumbnail',
        'type' => 'thumb',
        'thumbof' => 'image',
    ],
    'image' => [
        'caption' => 'Фото',
        'type' => 'image',
        'width' => '200'
    ],
    'img16x9' => [
        'caption' => 'Пропорція 16x9',
        'type' => 'crop',
        'cropof' => 'image'
    ],
    'img4x3' => [
        'caption' => 'Пропорція 4x3',
        'type' => 'crop',
        'cropof' => 'image'
    ],
    'img1x1' => [
        'caption' => 'Пропорція 1x1',
        'type' => 'crop',
        'cropof' => 'image'
    ],
    'img2x3' => [
        'caption' => 'Пропорція 2x3',
        'type' => 'crop',
        'cropof' => 'image'
    ],
];
$settings['form'] = [
    [
        'caption' => 'Опис',
        'content' => [
            'goods_avail' => [],
            'goods_code' => [],
            'goods_name' => [],
            'goods_price' => [],
            'goods_price_old' => []
        ]
    ],
    [
        'caption' => 'Фото',
        'content' => [
            'thumb' => [],
            'image' => [],
            'img16x9' => [],
            'img4x3' => [],
            'img1x1' => [],
            'img2x3' => []
        ]
    ],
];

$settings['configuration'] = [
    'pagination' => false,
    'displayLength' => 100,
    'display' => 100,
    'enablePaste' => false,
    'sorting' => false
];

