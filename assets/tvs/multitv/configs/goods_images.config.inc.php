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
    'sorting' => false,

];

$settings['templates'] = [
    'outerTpl' => '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">[+wrapper+]</div>',
    'rowTpl' => '<div class="col-12 col-sm-6">s
    <div class="position-relative">
            <picture>
                <source
                        srcset="[(site_url)][[CombaFunctions? &fnct=`GetImage` &id=`[+docid+]` &n=`[+iteration+]` &preset=`page-goods-2` &flags=`webp,dw`]],
                        [(site_url)][[CombaFunctions? &fnct=`GetImage` &id=`[+docid+]` &n=`[+iteration+]` &preset=`page-goods` &flags=`webp,dw`]]"
                        data-fullsize="[(site_url)][[CombaFunctions? &fnct=`GetImage` &id=`[+docid+]` &n=`[+iteration+]` &preset=`image-max` &flags=`webp`]]"
                        type="image/webp" sizes="(max-width: 400px) 340px, 567px">
                <img loading="lazy"
                     class="lazy img-thumbnail img-fluid rounded-lg w-100"
                     data-src="[(site_url)][[CombaFunctions? &fnct=`GetImage` &id=`[+docid+]` &n=`[+iteration+]` &preset=`page-goods` &flags=`lazy,sof`]]"
                     data-fullsize="[(site_url)][[CombaFunctions? &fnct=`GetImage` &id=`[+docid+]` &n=`[+iteration+]` &preset=`image-max`]]"
                     alt="[*pagetitle*] ((legend))"
                >
            </picture>
            <a href="[(site_url)][[CombaFunctions? &fnct=`GetImage` &id=`[+docid+]` &n=`[+iteration+]` &preset=`image-max`]]"
            class="venobox position-absolute top-50 start-50 translate-middle"
            data-gall="images" title="[*pagetitle*] ((legend))">
                <span class="text-bg-primary opacity-50 p-3 rounded-circle shadow">
                    <i class="bi bi-search fs-3"></i>
                </span>
            </a>
    </div>
</div>'
];

