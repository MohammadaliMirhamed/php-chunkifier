<?php

namespace Src\Classes;

use Src\Contracts\ChunkifierInterface;

class Chunkifier implements ChunkifierInterface
{
    const FILE_CHUNKED_FLAG = 0;

    /**
     * init the source file and destination
     */
    public function __construct(
        protected string $source,
        protected string $destination
    ){}


    /**
     * @param int $buffer
     * @param int $buffer_magnifier_regulator
     * @return int
     */
    public function chunk(int $buffer, int $buffer_magnifier_regulator) :int 
    {                          
        // open source file
        $file_handle = fopen($this->source, 'r');          

        $buffer_magnifier = 0;
        
        // chunked file name counter
        $filename_counter = 1;

        while (!feof ($file_handle)) {
            // read buffer sized amount from file
            $file_part = fread($file_handle, $buffer + $buffer_magnifier);
            
            // get source file name
            $filename = basename($this->source);

            // prepare new file new with destination path
            $file_part_path = $this->destination . $filename . ".part$filename_counter";

            // open the new file [create it] to write
            $file_new = fopen($file_part_path, 'w+');

            // write the part of file
            fwrite($file_new, $file_part);

            // close new file handle
            fclose($file_new);

            // add buffer magnifier regulator to buffer magnifier
            $buffer_magnifier += $buffer_magnifier_regulator;
            
            // increase chunked file name counter
            $filename_counter++;            
        }    
        
        // close the main file handle
        fclose($file_handle);

        return self::FILE_CHUNKED_FLAG;
    }
}