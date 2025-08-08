<?php

namespace App\Models;

use PDO;

class User extends BaseModel
{
    protected $table = 'users';

    public static function where($column, $operator, $value)
    {
        $model = new static;
        $sql = "SELECT * FROM {$model->table} WHERE $column $operator :$column";

        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["$column" => $value]);

        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result[0] ?? [];
    }
}
