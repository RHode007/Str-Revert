<?php
use PHPUnit\Framework\TestCase;
require_once 'index.php';

class Test extends TestCase
{
    public function test()
    {
        $this->expectOutputString('Привет! Давно не виделись.');
        echo revertCharacters("Тевирп! Онвад ен ьсиледив.");
    }

}
