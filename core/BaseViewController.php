<?php
class BaseViewController extends Controller {
    protected $useLayout = true;  // เพิ่มตัวแปรควบคุมการใช้ layout

    protected function setLayout($use = true) {
        $this->useLayout = $use;
    }

    protected function renderView($view, $data = []) {
        try {
            ob_start();
            
            if ($this->useLayout) {
                require_once BASEPATH . '/plugin/header.php';
                require_once BASEPATH . '/plugin/navbar.php';
            }
            
            // Load main content
            require_once BASEPATH . "/views/{$view}.php";
            
            if ($this->useLayout) {
                require_once BASEPATH . '/plugin/footer.php';
            }

            return ob_get_clean();
        } catch (Exception $e) {
            error_log('Template Error: ' . $e->getMessage());
            return 'An error occurred while loading the template.';
        }
    }

    protected function view($name, $data = []) {
        echo $this->renderView($name, $data);
    }
}
