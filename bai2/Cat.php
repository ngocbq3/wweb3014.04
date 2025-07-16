<?php
namespace App;
class Cat extends Animal
{
    public function info()
    {
        echo "Name: {$this->name}<br>";
        echo "Color: {$this->color}<br>";
        echo "Weight: {$this->weight}<br>";
    }
    public function run()
    {
        echo "{$this->name} thích leo chèo <br>";
    }
    public function speak()
    {
        echo "{$this->name} đang nói meo..weo..<br>";
    }
}
