<?php

 
class Product extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library(['session']);
        $this->load->helper(array('checkSession'));
        check_isvalidated($this->session->userdata('type'));;
        $this->load->model('Product_model');
    } 

    /*
     * Listing of products
     */
    function index()
    {
        $data['products'] = $this->Product_model->get_all_products();
        
        $data['_view'] = 'product/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new product
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('categorie','Categorie','max_length[100]');
		$this->form_validation->set_rules('names','Names','max_length[500]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'user_created' => $this->session->userdata('user_id'),
				'categorie' => $this->input->post('categorie'),
				'names' => $this->input->post('names'),
				'price' => $this->input->post('price'),
				'discount' => $this->input->post('discount'),
				'stock' => $this->input->post('stock'),
				'enabled' => $this->input->post('enabled'),
				//'date_created' => $this->input->post('date_created'),
				//'date_update' => $this->input->post('date_update'),
				'description' => $this->input->post('description'),
            );
            
            $product_id = $this->Product_model->add_product($params);
            redirect('product/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'product/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a product
     */
    function edit($id)
    {   
        // check if the product exists before trying to edit it
        $data['product'] = $this->Product_model->get_product($id);
        
        if(isset($data['product']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('categorie','Categorie','max_length[100]');
			$this->form_validation->set_rules('names','Names','max_length[500]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'categorie' => $this->input->post('categorie'),
					'names' => $this->input->post('names'),
					'price' => $this->input->post('price'),
					'discount' => $this->input->post('discount'),
					'stock' => $this->input->post('stock'),
					'enabled' => $this->input->post('enabled'),
					//'date_created' => $this->input->post('date_created'),
					//'date_update' => $this->input->post('date_update'),
					'description' => $this->input->post('description'),
                );

                $this->Product_model->update_product($id,$params);            
                redirect('product/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'product/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The product you are trying to edit does not exist.');
    } 

    /*
     * Deleting product
     */
    function remove($id)
    {
        $product = $this->Product_model->get_product($id);

        // check if the product exists before trying to delete it
        if(isset($product['id']))
        {
            $this->Product_model->delete_product($id);
            redirect('product/index');
        }
        else
            show_error('The product you are trying to delete does not exist.');
    }
    
}
