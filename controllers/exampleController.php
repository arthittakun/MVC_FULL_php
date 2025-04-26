<?php
class PageController extends Controller {
    public function index() {
        try {
            // จำลองข้อมูล
            $mockData = [
                ['id' => 1, 'name' => 'หน้าแรก', 'description' => 'หน้าหลักของเว็บไซต์', 'created_at' => '2024-01-01'],
                ['id' => 2, 'name' => 'เกี่ยวกับเรา', 'description' => 'ข้อมูลเกี่ยวกับบริษัท', 'created_at' => '2024-01-02'],
                ['id' => 3, 'name' => 'บริการ', 'description' => 'รายการบริการต่างๆ', 'created_at' => '2024-01-03'],
                ['id' => 4, 'name' => 'ติดต่อ', 'description' => 'ข้อมูลการติดต่อ', 'created_at' => '2024-01-04'],
                ['id' => 5, 'name' => 'บทความ', 'description' => 'บทความที่น่าสนใจ', 'created_at' => '2024-01-05']
            ];

            // จัดการการค้นหา
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            if ($search) {
                $mockData = array_filter($mockData, function($item) use ($search) {
                    return stripos($item['name'], $search) !== false || 
                           stripos($item['description'], $search) !== false;
                });
            }

            // จัดการ pagination
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 2; // แสดง 2 รายการต่อหน้า
            $totalItems = count($mockData);
            $totalPages = ceil($totalItems / $limit);
            
            // จัดการ offset
            $offset = ($page - 1) * $limit;
            $items = array_slice($mockData, $offset, $limit);

            // ส่งข้อมูลไปยัง view
            $this->view('page/index', [
                'title' => 'รายการหน้าเว็บ',
                'items' => $items,
                'currentPage' => $page,
                'totalPages' => $totalPages
            ]);
            
        } catch (Exception $e) {
            $this->view('errors/500', ['message' => 'เกิดข้อผิดพลาด']);
        }
    }
}
