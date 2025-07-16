<?php
namespace App;
abstract class Animal
{
    public $name;
    public $color;
    public $weight;

    public function __construct($name, $color, $weight)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }

    public abstract function info();
    public abstract function run();
    public abstract function speak();
}
