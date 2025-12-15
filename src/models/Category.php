<?php
class Category
{
    // Khai báo thuộc tính category
    public $id;
    public $name;
    public $description;
    public $status;
    public $created_at;
    public $updated_at;

    // Khai báo hàm khởi tạo Category

    public function __construct($data = [])
    {
        if (is_array($data)) {
            $this->id = $data['id'] ?? null;
            $this->name = $data['name'] ?? '';
            $this->description = $data['description'] ?? '';
            $this->status = $data['status'] ?? 1;
            $this->created_at = $data['created_at'] ?? null;
            $this->updated_at = $data['updated_at'] ?? null;
        }
    }

    // Hàm lấy danh sách tất cả danh mục 

    public static function all($status = null, $keyword = null)
    {
        $db = getDB();
        if (!$db) {
            return [];
        }
        try {
            $where = [];
            $params = [];

            // Lọc theo trạng thái 
            if ($status !== null && $status !== '') {
                $where[] = "status = ?";
                $params[] = (int)$status;
            }

            // Lọc theo từ khóa     
            if (!empty($keyword)) {
                $where[] = ("name LIKE ? OR description LIKE ?");
                $searchTerm = '%' . trim($keyword) . '%';
                $params[] = $searchTerm;
                $params[] = $searchTerm;
            }

            // Viết câu lệnh SQL
            $sql = "SELECT * FROM categories";
            if (!empty($where)) {
                $sql .= " WHERE " . implode(" AND ", $where);
            }

            $sql .= " ORDER BY created_at DESC";

            $stmt = $db->prepare($sql);
            $stmt->execute($params);

            return $result = $stmt->fetchAll();
            // $categories = [];
        } catch (PDOException $e) {
            error_log("Lỗi khi lấy dữ liệu danh mục tour" . $e->getMessage());
            return [];
        }
    }
}