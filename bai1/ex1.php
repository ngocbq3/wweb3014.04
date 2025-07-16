<?php

class Person
{
    private $name;
    public $age;
    public $address;

    public function __construct($name, $age, $address)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }
    public function wark()
    {
        echo "{$this->name} đang đi bộ trên đường<br>";
    }

    //Truy cập thuộc tính name
    public function getName()
    {
        return $this->name;
    }
    //Thay đổi thuộc tính name
    public function setName($name)
    {
        $this->name = $name;
    }
}

//TÍnh kế thừa
class Student extends Person
{
    private $point;
    private $id;

    public function __construct($name, $age, $address, $id)
    {
        parent::__construct($name, $age, $address);
        $this->id = $id;
    }

    public function info()
    {
        echo "Name: {$this->getName()} <br>";
        echo "Age: {$this->age} <br>";
        echo "Address: {$this->address} <br>";
        if ($this->point) {
            echo "Point: {$this->point} <br>";
        } else {
            echo "Bạn chưa có điểm <br>";
        }
    }
    //Lấy và đặt điểm cho sinh viên
    public function setPoint($point)
    {
        $this->point = $point;
    }
    public function getPoint()
    {
        return $this->point;
    }
}

$person1 = new Person('Peter', 20, 'Hà Nội');
$person2 = new Person('Tom', 22, 'Hòa bình');

$person1->wark();
$person2->wark();

$person1->setName('Hải');
echo "Name: " . $person1->getName();
echo "<br>";
//Tạo sinh viên
$student1 = new Student('Nam', 19, 'Nam định', 'ph012311');
$student1->setPoint(9);
$student1->info();
