<?php
class UserController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('UserModel');
    }

    public function index() {
        try {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 10;
            $offset = ($page - 1) * $limit;

            $users = $this->userModel->getUsers($limit, $offset);
            $totalUsers = $this->userModel->getTotalUsers();
            $totalPages = ceil($totalUsers / $limit);

            $this->view('users/index', [
                'users' => $users,
                'currentPage' => $page,
                'totalPages' => $totalPages,
                'title' => 'User List'
            ]);
        } catch (Exception $e) {
            $this->view('errors/500', [
                'message' => 'Database error occurred'
            ]);
        }
    }

    public function search() {
        try {
            $keyword = isset($_GET['search']) ? $_GET['search'] : '';
            $users = $this->userModel->searchUsers($keyword);
            $this->view('users/index', [
                'users' => $users,
                'search' => $keyword,
                'title' => 'Search Results'
            ]);
        } catch (Exception $e) {
            $this->view('errors/500', [
                'message' => 'Search error occurred'
            ]);
        }
    }
}
