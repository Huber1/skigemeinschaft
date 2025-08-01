<?php

require __DIR__ . '/kirby/bootstrap.php';

echo (new Kirby([
    'urls' => [
        'index' => '/',
    ],
]))->render();
