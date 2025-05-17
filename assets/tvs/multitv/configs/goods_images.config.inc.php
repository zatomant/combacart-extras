<?php

$settings['display'] = 'datatable';
$settings['fields'] = [
    'thumb' => [
        'caption' => 'Thumbnail',
        'type' => 'thumb',
        'thumbof' => 'image',
    ],
    'image' => [
        'caption' => 'Зображення',
        'type' => 'image'
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
    'id' => [
        'caption' => 'ID',
        'type' => 'text',
        'default' => 'img{i}'
    ],
    'legend' => [
        'caption' => 'Опис',
        'type' => 'text'
    ],
];

$settings['form'] = [
    [
        'caption' => 'Основні',
        'content' => [
            'thumb' => [],
            'image' => [],
            'img16x9' => [],
            'img4x3' => [],
            'img1x1' => [],
            'img2x3' => [],
        ]
    ],
    [
        'caption' => 'Дані',
        'content' => [
            'id' => [],
            'legend' => [],
        ]
    ]
];

$settings['columns'] = [
    [
        'caption' => 'Зображення',
        'fieldname' => 'image',
        'width' => '150',
        'render' => '<img src="/[+image+]" height="150" alt="[+legend+]">',
    ],
    [
        'caption' => 'Ід',
        'fieldname' => 'id',
        'width' => '100',
    ],
    [
        'caption' => 'Опис та додаткові дані',
        'fieldname' => 'legend',
        'render' => '[+legend:is=``:then=``:else=`[+legend+]<br>`+]<span class="text-secondary">[+img16x9:is=``:then=``:else=`<i class="fa fa-picture-o"></i>16x9`+] [+img4x3:is=``:then=``:else=`<i class="fa fa-picture-o"></i>4x3`+] [+img1x1:is=``:then=``:else=`<i class="fa fa-picture-o"></i>1x1`+] [+img2x3:is=``:then=``:else=`<i class="fa fa-file-image-o"></i> 2x3`+]</span>'
    ]
];

$settings['configuration'] = [
    'pagination' => false,
    'displayLength' => 100,
    'display' => 'All',
    'enablePaste' => false,
    'sorting' => false
];

$settings['templates'] = [
    'outerTpl' => '<div class="images">[+wrapper+]</div>',
    'rowTpl' => '<div class="image"><img src="[+image+]" alt="[+legend+]" />'
];
