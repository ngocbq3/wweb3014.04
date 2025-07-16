<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Cat;
use App\Dog;

$tom = new Cat('Mèo Tom', 'Tam thể', 16);
$tom->info();
$tom->run();
$tom->speak();
echo "<br>";

$cauvang = new Dog('Cậu vàng', 'Vàng', 35);
$cauvang->info();
$cauvang->run();
$cauvang->speak();

$student1 = new App\Student('Hoàng');
$student1->setPoint(9);
$student1->info();
