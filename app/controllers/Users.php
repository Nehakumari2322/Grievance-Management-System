<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Software Development Wing <Penta Head Private Ltd.>
 */

class Users extends Controller{

    public function __construct() {
       // echo 'executives construct';
        // $this->agent = $this->model('Agent');
    }

    public function logmein()
    {
        $this->view('user/login');
    } 

}
?>