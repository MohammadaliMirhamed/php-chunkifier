<?php

namespace Src\Contracts;


interface ChunkifierInterface 
{
    public function chunk(int $buffer, int $buffer_magnifier_regulator): int;
}