<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $conn = null; //thuộc tính kết nối database
    protected $table = null; //Tên bảng muốn truy cập
    protected $queryBuilder = null; //Xây dựng câu lệnh SQL

    public function __construct()
    {
        try {
            $this->conn = new \PDO("mysql:host=" . HOST .
                "; dbname=" . DBNAME . "; port=" . PORT .
                "; charset=utf8", USERNAME, PASSWORD);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Lỗi truy cập database: " . $e->getMessage();
        }
    }

    //Lấy toàn bộ dữ liệu của bảng
    public static function all()
    {
        $model = new static;
        $sql = "SELECT * FROM {$model->table}";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
}
