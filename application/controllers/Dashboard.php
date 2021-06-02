<?php
 
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library(['session']);
        $this->load->helper(array('checkSession'));
        check_isvalidated();
        
    }

    function index()
    {
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }

    // private function check_isvalidated(){
    //     if(!$_SESSION['username']){
    //         redirect('user/login');
    //     }
    // }
}
