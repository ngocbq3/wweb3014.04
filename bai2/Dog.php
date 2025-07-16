<?php

namespace App;

class Dog extends Cat
{
    public function run()
    {
        echo "{$this->name} chạy rất nhanh<br>";
    }
    public function speak()
    {
        echo "{$this->name} đang nói goo .. goo<br>";
    }
}
