<?php
require_once BASE_PATH . '/src/models/Tour.php';

class GuideController{
    protected $tourModel;

    public function __construct()
    {
        $this->tourModel = new Tour(getDB());
    }

    public function schedule(){
        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'guide'){
            header('Location: index.php?act=login');
            exit;
        }

        $guideId = $_SESSION['user']['id'];
        $tours = $this->tourModel->getTourByGuide($guideId);
        require BASE_PATH . '/views/guide/schedules/index.php';
    }

    public function scheduleDetail(){
        $tourId = $_GET['id'] ?? null;
        if(!$tourId){
            header('Location: index.php?act=guide/schedules');
            exit;
        }

        $tour = $this->tourModel->getTourById($tourId);
        $schedules = $this->tourModel->getTourSchedule($tourId);

        require BASE_PATH . '/views/guide/schedules/detail.php';
        exit;
    }
}