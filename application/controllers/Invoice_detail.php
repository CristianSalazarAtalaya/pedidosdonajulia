<?php

 
class Invoice_detail extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library(['session']);
        $this->load->helper(array('checkSession'));
        check_isvalidated($this->session->userdata('type'));;
        $this->load->model('Invoice_detail_model');
    } 

    /*
     * Listing of invoice_details
     */
    function index()
    {
        $data['invoice_details'] = $this->Invoice_detail_model->get_all_invoice_details();
        
        $data['_view'] = 'invoice_detail/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new invoice_detail
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id_invoice' => $this->input->post('id_invoice'),
				'id_product' => $this->input->post('id_product'),
				'name_product' => $this->input->post('name_product'),
				'amount' => $this->input->post('amount'),
				'price' => $this->input->post('price'),
				'discount' => $this->input->post('discount'),
				'final_price' => $this->input->post('final_price'),
                'date_updated' => date('Y-m-d H:i:s')
				//'date_created' => $this->input->post('date_created'),
				//'date_updated' => $this->input->post('date_updated'),
            );
            
            $invoice_detail_id = $this->Invoice_detail_model->add_invoice_detail($params);
            redirect('invoice_detail/index');
        }
        else
        {
			$this->load->model('Invoice_model');
			$data['all_invoice'] = $this->Invoice_model->get_all_invoice();

			$this->load->model('Product_model');
			$data['all_products'] = $this->Product_model->get_all_products();
            
            $data['_view'] = 'invoice_detail/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a invoice_detail
     */
    function edit($id)
    {   
        // check if the invoice_detail exists before trying to edit it
        $data['invoice_detail'] = $this->Invoice_detail_model->get_invoice_detail($id);
        
        if(isset($data['invoice_detail']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_invoice' => $this->input->post('id_invoice'),
					'id_product' => $this->input->post('id_product'),
					'name_product' => $this->input->post('name_product'),
					'amount' => $this->input->post('amount'),
					'price' => $this->input->post('price'),
					'discount' => $this->input->post('discount'),
					'final_price' => $this->input->post('final_price'),
                    'date_updated' => date('Y-m-d H:i:s')
					//'date_created' => $this->input->post('date_created'),
					//'date_updated' => $this->input->post('date_updated'),
                );

                $this->Invoice_detail_model->update_invoice_detail($id,$params);            
                redirect('invoice_detail/index');
            }
            else
            {
				$this->load->model('Invoice_model');
				$data['all_invoice'] = $this->Invoice_model->get_all_invoice();

				$this->load->model('Product_model');
				$data['all_products'] = $this->Product_model->get_all_products();

                $data['_view'] = 'invoice_detail/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The invoice_detail you are trying to edit does not exist.');
    } 

    /*
     * Deleting invoice_detail
     */
    function remove($id)
    {
        $invoice_detail = $this->Invoice_detail_model->get_invoice_detail($id);

        // check if the invoice_detail exists before trying to delete it
        if(isset($invoice_detail['id']))
        {
            $this->Invoice_detail_model->delete_invoice_detail($id);
            redirect('invoice_detail/index');
        }
        else
            show_error('The invoice_detail you are trying to delete does not exist.');
    }
    
}
