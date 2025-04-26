<?php
class PageController extends Controller {
    protected $auth = true;
    protected $excludeMethods = ['view']; // หน้า view สามารถดูได้โดยไม่ต้อง login

    public function index() {
        try {
            // Get page and search parameters
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $limit = 10;
            $offset = ($page - 1) * $limit;

            // จำลองข้อมูล
            $mockData = [
                ['id' => 1, 'name' => 'หน้า 1', 'created_by' => $_SESSION['username']],
                ['id' => 2, 'name' => 'หน้า 2', 'created_by' => $_SESSION['username']]
            ];

            return $this->view('page/index', [
                'title' => 'จัดการหน้า',
                'items' => $mockData
            ]);
        } catch (Exception $e) {
            return $this->view('page/index', [
                'title' => 'Error',
                'error' => 'Database error occurred'
            ]);
        }
    }

    public function view($id) {
        // หน้านี้สามารถเข้าดูได้โดยไม่ต้อง login
        return $this->view('page/view', [
            'title' => 'ดูหน้า ' . $id
        ]);
    }
}
