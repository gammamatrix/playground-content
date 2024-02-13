<?php

return [
    'load' => [
        // 'commands' => (bool) env('PLAYGROUND_HTTP_LOAD_COMMANDS', true),
        'translations' => (bool) env('PLAYGROUND_HTTP_LOAD_TRANSLATIONS', true),
    ],
    'purifier' => [
        'iframes' => env('PLAYGROUND_HTTP_PURIFIER_IFRAMES', ''),
        'path' => env('PLAYGROUND_HTTP_PURIFIER_PATH', ''),
    ],
];
