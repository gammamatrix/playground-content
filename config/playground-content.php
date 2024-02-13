<?php

return [
    'load' => [
        'commands' => (bool) env('PLAYGROUND_CONTENT_LOAD_COMMANDS', true),
        'translations' => (bool) env('PLAYGROUND_CONTENT_LOAD_TRANSLATIONS', true),
    ],
];
