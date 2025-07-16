<?php

namespace App;

class Student implements InterfacePerson
{
    public $name;
    public $point;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function info()
    {
        echo "Name: {$this->name}<br>";
        if ($this->point) {
            echo "Point: {$this->point}<br>";
        } else {
            echo "Bạn chưa có điểm thi<br>";
        }
    }
    public function setPoint($point)
    {
        $this->point = $point;
    }
    public function rollCall()
    {
        echo "{$this->name} đã được điểm danh<br>";
    }
}
