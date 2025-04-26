<?php
class View {
    public function render($name, $data = []) {
        extract($data);
        require_once "views/{$name}.php";
    }
}
