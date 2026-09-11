<?php

// Force Vercel to use /tmp for all write operations
$storagePath = '/tmp/storage';

$dirs = [
    $storagePath . '/framework/views',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/logs',
    '/tmp/views'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Override Laravel Environment Paths before runtime
putenv("APP_STORAGE_PATH={$storagePath}");
$_ENV['APP_STORAGE_PATH'] = $storagePath;

putenv("VIEW_COMPILED_PATH=/tmp/views");
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/views';

putenv("LOG_CHANNEL=stderr");
$_ENV['LOG_CHANNEL'] = 'stderr';

putenv("CACHE_DRIVER=array");
$_ENV['CACHE_DRIVER'] = 'array';

putenv("SESSION_DRIVER=array");
$_ENV['SESSION_DRIVER'] = 'array';

// Load Public Index
require __DIR__ . '/../public/index.php';