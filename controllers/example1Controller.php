<?php
class HomeController extends Controller {
    public function index() {
        $userModel = $this->model('UserModel');
        $data = [
            'title' => 'Home Page',
            'content' => 'Welcome to our website'
        ];
        $this->view('page/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About Us',
            'content' => 'This is the about page'
        ];
        $this->view('home/about', $data);
    }
}
