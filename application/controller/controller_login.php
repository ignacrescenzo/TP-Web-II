<?php

class Controller_Login extends Controller{
    function index(){
        $this->view->generate('login_view.php', 'template_view.php');
    }
}