<?php

namespace Src\Helpers;

class Helper
{

    /**
     * @param string $source
     * @return bool
     */
    static function isSparseFile(string $source) :bool
    {
        // open source file
        $handle = fopen($source, "rb"); 
        
        // get file size
        $fsize = filesize($source); 

        // read the file content
        $contents = fread($handle, $fsize); 
        
        // convert to byte to int
        $byteArray = unpack("N*",$contents); 

        // check each byte if is greater then zero
        foreach ($byteArray as $byte) {
            if($byte > 0)
                return false;
        }

        return true;
    }
}