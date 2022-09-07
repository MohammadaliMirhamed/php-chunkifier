<?php

use PHPUnit\Framework\TestCase;
use Src\Classes\Chunkifier;

class ChunkifierTest extends TestCase
{
    public function testChunkingFile()
    {
        $source = "data/data.txt";
        $destination = "data/output/";

        $chunkifier = new Chunkifier($source, $destination);
        $result = $chunkifier->chunk(1337, 11);

        $this->assertEquals(0, $result);
    }
}