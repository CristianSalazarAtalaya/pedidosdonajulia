<?php
 
class Client extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        //$this->load->library(['session']);
        //$this->load->helper(array('checkSession'));
        //check_isvalidated();
        
    }

    function index()
    {
        $data['categories'] = $this->Product_model->get_all_categories();
        $data['products'] = $this->Product_model->get_all_products_with_oferts();
        $data['_view'] = 'client/index';
        $this->load->view('layouts/main_client',$data);
    }

    // private function check_isvalidated(){
    //     if(!$_SESSION['username']){
    //         redirect('user/login');
    //     }
    // }
}
