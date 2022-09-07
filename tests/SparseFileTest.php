<?php

use PHPUnit\Framework\TestCase;
use Src\Helpers\Helper;

class SparseFileTest extends TestCase
{
    public function testChunkingFile()
    {
        $source = "data/sparse_file";

        $this->assertEquals(true, Helper::isSparseFile($source));
    }
}