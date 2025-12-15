<?php

class Tour
{
    protected $conn;

    public function __construct()
    {
        $this->conn = getDB(); //  LẤY PDO TỪ HELPER
    }

    // Lấy tour theo HDV
    public function getTourByGuide($guideId)
    {
        $sql = "SELECT t.*
                FROM tours t
                JOIN tour_guides tg ON t.id = tg.tour_id
                WHERE tg.guide_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$guideId]);
        return $stmt->fetchAll();
    }

    // Lấy thông tin tour
    public function getTourById($tourId)
    {
        $sql = "SELECT * FROM tours WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$tourId]);
        return $stmt->fetch();
    }

    // THÊM HÀM NÀY ĐỂ HẾT LỖI
    public function getTourSchedule($tourId)
    {
        $sql = "SELECT 
                    day_number,
                    activity,
                    guide_task
                FROM tour_schedules
                WHERE tour_id = ?
                ORDER BY day_number ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$tourId]);
        return $stmt->fetchAll();
    }
}