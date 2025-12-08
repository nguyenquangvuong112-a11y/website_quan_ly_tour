<?php

// Model User đại diện cho thực thể người dùng trong hệ thống
class User
{
    // Các thuộc tính của User
    public $id;
    public $name;
    public $email;
    public $role;
    public $status;

    // Constructor để khởi tạo thực thể User
    public function __construct($data = [])
    {
        // Nếu truyền vào mảng dữ liệu thì gán vào các thuộc tính
        if (is_array($data)) {
            $this->id = $data['id'] ?? null;
            $this->name = $data['name'] ?? '';
            $this->email = $data['email'] ?? '';
            $this->role = $data['role'] ?? 'huong_dan_vien';
            $this->status = $data['status'] ?? 1;
        } else {
            // Nếu truyền vào string thì coi như tên (tương thích với code cũ)
            $this->name = $data;
        }
    }

    // Tìm user theo email
    public static function findByEmail($email)
    {
        $db = getDB();
        if (!$db) {
            return null;
        }

        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND status = 1 ");
            $stmt->execute([$email]);
            $data = $stmt->fetch();
            if ($data) {
                return new User($data);
            }

            return null;
        } catch (PDOException $e) {
            error_log("Loi khi tim email" . $e->getMessage());
            return null;
        }
    }

    // Xác thực đăng nhập email và pasword 
    public static function authenticate($email, $password)
    {
        // Thuc hien tim user theo email
        $user = self::findByEmail($email);
        if (!$user) {
            return null;
        }
        // Lay pass hash tu db 
        $db = getDB();
        if (!$db) {
            return null;
        }
        try {
            $stmt = $db->prepare("SELECT password FROM users WHERE id = ? ");
            $stmt->execute([$user->id]);
            $result = $stmt->fetch();

            // Kiem tra so sanh password nhap vao password trong db bang password_verify
            if ($result && password_verify($password, $result['password'])) {
                return $user;
            }
            return null;
        } catch (PDOException $e) {
            error_log("Loi mat khau khong trung khop " . $e->getMessage());
            return null;
        }
    }

    // Trả về tên người dùng để hiển thị
    public function getName()
    {
        return $this->name;
    }

    // Kiểm tra xem user có phải là admin không
    // @return bool true nếu là admin, false nếu không
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Kiểm tra xem user có phải là hướng dẫn viên không
    // @return bool true nếu là hướng dẫn viên, false nếu không
    public function isGuide()
    {
        return $this->role === 'huong_dan_vien';
    }
}
