<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $conn = null; //thuộc tính kết nối database
    protected $table = null; //Tên bảng muốn truy cập
    protected $queryBuilder = null; //Xây dựng câu lệnh SQL
    protected $primaryKey = "id"; //Khóa chính của bảng

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

    //Lấy 1 bản ghi theo id
    public static function find($id)
    {
        $model = new static;
        $sql = "SELECT * FROM {$model->table} WHERE 
                {$model->primaryKey} = :{$model->primaryKey}";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["{$model->primaryKey}" => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result[0] ?? [];
    }

    /**
     * hàm create: để thêm dữ liệu
     * @param: $data sẽ là 1 mảng bao gồm có key và tên cột và value là giá trị tương ứng
     */
    public static function create($data)
    {
        $model = new static;
        $cols = "";
        $params = "";

        //Triển khai câu lệnh SQL để lấy ra cột và tham số trong câu lệnh SQL
        foreach ($data as $key => $value) {
            $cols .= "`{$key}`, ";
            $params .= ":{$key}, ";
        }
        //Xóa dấu , ở cuối chuỗi
        $cols = rtrim($cols, ", ");
        $params = rtrim($params, ", ");

        //Viết câu lệnh SQL hoàn chỉnh
        $sql = "INSERT INTO {$model->table} ({$cols}) VALUES ({$params})";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);
        return $model->conn->lastInsertId();
    }
}
