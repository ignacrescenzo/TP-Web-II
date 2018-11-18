<?php

class Controller_Main extends Controller{
    function index(){
        $this->view->generateSt('home_view.php');
    }
}