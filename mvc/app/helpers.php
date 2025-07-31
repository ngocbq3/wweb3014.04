<?php

use eftec\bladeone\BladeOne;
//hàm dd dùng để bug dữ liệu
function dd(...$data)
{
    echo "<pre>";

    foreach ($data as $value) {
        var_dump($value);
    }
    exit;
}
/**
 * Hàm view dùng để render view
 * $fileName: tên file view
 * $data: dữ liệu được gửi vào view
 */

function view($fileName, $data = [])
{
    $views = APP_DIR . '/resources/views';
    $cache = APP_DIR . '/storage/cache';
    $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
    // $fileName = str_replace(".", "/", $fileName);

    echo $blade->run($fileName, $data); // it calls /views/$fileName.blade.php
}

//Hàm điều hướng website
function redirect($path)
{
    header("location: " . APP_URL . $path);
    die;
}
