<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'FontAwesome Provider',
    'description' => 'Integrates legacy FontawesomeIconProvider and FontAwesome 4.7',
    'category' => 'be',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'author' => 'TYPO3 Community',
    'author_email' => '',
    'author_company' => '',
    'version' => '1.0.4',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
