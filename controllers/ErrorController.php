<?php
class ErrorController extends Controller {
    public function notFound() {
        $data = [
            'title' => '404 Not Found',
            'message' => 'The page you requested could not be found.'
        ];
        $this->view('errors/404', $data);
    }

    public function serverError() {
        $data = [
            'title' => '500 Server Error',
            'message' => 'An internal server error occurred.'
        ];
        $this->view('errors/500', $data);
    }
}
