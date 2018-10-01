<?php

require_once 'vendor/autoload.php';

// Args
$args       = new \Cliphp\Args();
$chunkCount = $args->get('chunks') ? $args->get('chunks') : 1;
$processor  = $args->get('processor') ? $args->get('processor') : 1;
$rootPath   = $args->get('root') ? $args->get('root') : null;

if ( ! $rootPath) {
    echo 'Please provide an absolute path to your root folder first. Eg: --root="/Users/.../app"'."\n";
    exit;
}

// AndroidX class mappings.
$mappings   = json_decode(file_get_contents('mappings.json'), true);
$local      = new \League\Flysystem\Adapter\Local($rootPath);
$filesystem = new \League\Flysystem\Filesystem($local);

$listFilesPlugin = new \League\Flysystem\Plugin\ListFiles();
$filesystem->addPlugin($listFilesPlugin);

// Get all files.
$files = $filesystem->listFiles('', true);

/**
 * @param                              $files
 * @param                              $mappings
 * @param \League\Flysystem\Filesystem $filesystem
 */
function replaceFiles($files, $mappings, \League\Flysystem\Filesystem $filesystem)
{
    $stat = ['total_files' => count($files), 'success' => 0, 'replace' => 0, 'error_files' => []];

    foreach ($files as $file) {

        try {

            // Get file contents.
            $content = $filesystem->read($file['path']);

            // Replace paths.
            foreach ($mappings as $oldName => $newName) {

                // Find and replace then save.
                $content = str_replace($oldName, $newName, $content, $count);
                $filesystem->put($file['path'], $content);

                $stat['replace'] = $stat['replace'] + $count;
            }


            $stat['files']   = $stat['files'] + 1;
            $stat['success'] = $stat['success'] + 1;

        } catch (Exception $e) {

            $stat['error_files'] = $file['path'];
            $stat['files']       = $stat['files'] + 1;
        }

        system('clear');
        print_r($stat);
    }
}

$loop = React\EventLoop\Factory::create();

$chunkCount = count($files) / $chunkCount;
$chunks     = array_chunk($files, $chunkCount);
$chunkIndex = $processor - 1;

if ( ! isset($chunks[$chunkIndex])) {
    echo 'Sorry, you can\'t process this chunk: '.$chunkIndex."\n";
    exit;
}

// Files to process.
$chunk = $chunks[$chunkIndex];

$loop->addPeriodicTimer(1, function () use ($chunk, $mappings, $rootPath, $filesystem, $loop) {
    replaceFiles($chunk, $mappings, $filesystem);
    $loop->stop();
});

$loop->run();