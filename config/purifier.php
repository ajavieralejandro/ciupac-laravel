<?php

return [
    'encoding' => 'UTF-8',
    'finalize' => true,
    'ignoreNonStrings' => false,
    'cachePath' => storage_path('app/purifier'),
    'settings' => [
        'default' => [
            'HTML.Doctype' => 'HTML 4.01 Transitional',
            'HTML.Allowed' => 'p,br,b,strong,i,em,ul,ol,li,a[href|title|target|rel],h2,h3,h4,blockquote',
            'CSS.AllowedProperties' => '',
            'AutoFormat.AutoParagraph' => false,
            'AutoFormat.RemoveEmpty' => true,
            'HTML.ForbiddenElements' => 'script,style,iframe',
            'HTML.ForbiddenAttributes' => '*.style,on*,style',
            'Attr.AllowedFrameTargets' => ['_blank'],
            'HTML.Nofollow' => true,
            'HTML.TargetBlank' => true,
            'URI.AllowedSchemes' => [
                'http' => true,
                'https' => true,
                'mailto' => true,
            ],
        ],
        'ciupac_content' => [
            'HTML.Doctype' => 'HTML 4.01 Transitional',
            'HTML.Allowed' => 'p,br,b,strong,i,em,ul,ol,li,a[href|title|target|rel],h2,h3,h4,blockquote',
            'CSS.AllowedProperties' => '',
            'AutoFormat.AutoParagraph' => false,
            'AutoFormat.RemoveEmpty' => true,
            'HTML.ForbiddenElements' => 'script,style,iframe',
            'HTML.ForbiddenAttributes' => '*.style,on*,style',
            'Attr.AllowedFrameTargets' => ['_blank'],
            'HTML.Nofollow' => true,
            'HTML.TargetBlank' => true,
            'URI.AllowedSchemes' => [
                'http' => true,
                'https' => true,
                'mailto' => true,
            ],
        ],
    ],
];
