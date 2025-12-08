<?php

class CategoryController
{
    public function index()
    {
        requireLogin();

        // Lấy dữ liệu từ from 
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $status = isset($_GET['status']) && $_GET['status'] !== '' ? $_GET['status'] : null;


        // Lấy danh mục vs bộ lọc 
        $categories = Category::all($status, $keyword);

        // Truyền dữ liệu sang view
        view('admin.categories.index', [
            'title' => "Quản lý danh mục",
            'categories' => $categories,
            'currentKeyword' => $keyword,
            'currentStatus' => $status,
        ]);
    }
}
