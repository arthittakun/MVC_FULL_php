<?php
class HomeController extends BaseViewController {
    protected $auth = false; // เปิดใช้งานการตรวจสอบ auth
    protected $excludeMethods = ['about']; // methods ที่ไม่ต้องตรวจสอบ auth

    public function index() {
        try {
            $data = [
                'title' => 'หน้าแรก',
                'content' => 'ยินดีต้อนรับ '
            ];
            return $this->view('page/index', $data);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->view('page/index', [
                'title' => 'Error',
                'error' => 'An error occurred'
            ]);
        }
    }
    public function page() {
        try {
            $data = [
                'title' => 'หน้าแรก',
                'content' => 'ยินดีต้อนรับ '
            ];
            return $this->view('page/page', $data);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return $this->view('page/page', [
                'title' => 'Error',
                'error' => 'An error occurred'
            ]);
        }
    }

    public function about() {
        // หน้านี้ไม่ต้อง login ก็เข้าได้
        return $this->view('page/about', [
            'title' => 'เกี่ยวกับเรา'
        ]);
    }

    public function rawPage() {
        $this->setLayout(false); // ไม่ใช้ layout
        return $this->view('page/raw', [
            'content' => 'This is raw content without layout'
        ]);
    }
}