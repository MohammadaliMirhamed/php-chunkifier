<?php

require __DIR__.'/vendor/autoload.php';

use Src\Classes\Chunkifier;

$source = $argv[1];
$destination = $argv[2];
$maximum_file_size = 1000000; // 1MB


if(!$source || !$destination) {
    print('Source and destination are required e.g. => php run.php testfile.txt /home/target-folder/' . PHP_EOL);
    exit(1);
}

if(!file_exists($source)) {
    print('Source file does not exist.' . PHP_EOL);
    exit(1);
}

if(filesize($source) > $maximum_file_size) {
    print('Source file as too large.' . PHP_EOL);
    exit(1);
} 


$chunkifier = new Chunkifier($argv[1], $argv[2]);
$result = $chunkifier->chunk(1337, 11);

print $result;
exit(0);