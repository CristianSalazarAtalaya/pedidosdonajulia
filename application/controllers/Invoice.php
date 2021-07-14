<?php

 
class Invoice extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library(['session']);
        $this->load->helper(array('checkSession'));
        check_isvalidated($this->session->userdata('type'));;
        $this->load->model('Invoice_model');
    } 

    /*
     * Listing of invoice
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('invoice/index?');
        $config['total_rows'] = $this->Invoice_model->get_all_invoice_count();
        $this->pagination->initialize($config);

        $data['invoice'] = $this->Invoice_model->get_all_invoice($params);
        
        $data['_view'] = 'invoice/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new invoice
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('direction','Direction','max_length[500]');
		$this->form_validation->set_rules('reference_dir','Reference Dir','max_length[500]');
		$this->form_validation->set_rules('notes','Notes','max_length[500]');
		$this->form_validation->set_rules('type_doc','Type Doc','max_length[20]');
		$this->form_validation->set_rules('num_doc','Num Doc','max_length[30]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_user' => $this->session->userdata('user_id'),
				'user_created' => $this->session->userdata('user_id'),
				'direction' => $this->input->post('direction'),
				'reference_dir' => $this->input->post('reference_dir'),
				'total_price' => $this->input->post('total_price'),
				'date_order' => $this->input->post('date_order'),
				'date_delivery' => $this->input->post('date_delivery'),
				'notes' => $this->input->post('notes'),
				'type_pay' => $this->input->post('type_pay'),
				'date_getorder' => $this->input->post('date_getorder'),
				'date_deliveredorder' => $this->input->post('date_deliveredorder'),
				'type_doc' => $this->input->post('type_doc'),
				'num_doc' => $this->input->post('num_doc'),
				'cod_fac' => $this->input->post('cod_fac'),
				'num_fac' => $this->input->post('num_fac'),
                'date_updated' => date('Y-m-d H:i:s')
				//'date_created' => $this->input->post('date_created'),
				//'date_updated' => $this->input->post('date_updated'),
            );
            
            $invoice_id = $this->Invoice_model->add_invoice($params);
            redirect('invoice/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'invoice/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a invoice
     */
    function edit($id)
    {   
        // check if the invoice exists before trying to edit it
        $data['invoice'] = $this->Invoice_model->get_invoice($id);
        
        if(isset($data['invoice']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('direction','Direction','max_length[500]');
			$this->form_validation->set_rules('reference_dir','Reference Dir','max_length[500]');
			$this->form_validation->set_rules('notes','Notes','max_length[500]');
			$this->form_validation->set_rules('type_doc','Type Doc','max_length[20]');
			$this->form_validation->set_rules('num_doc','Num Doc','max_length[30]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_user' => $this->input->post('id_user'),
					'direction' => $this->input->post('direction'),
					'reference_dir' => $this->input->post('reference_dir'),
					'total_price' => $this->input->post('total_price'),
					'date_order' => $this->input->post('date_order'),
					'date_delivery' => $this->input->post('date_delivery'),
					'notes' => $this->input->post('notes'),
					'type_pay' => $this->input->post('type_pay'),
					'date_getorder' => $this->input->post('date_getorder'),
					'date_deliveredorder' => $this->input->post('date_deliveredorder'),
					'type_doc' => $this->input->post('type_doc'),
					'num_doc' => $this->input->post('num_doc'),
					'cod_fac' => $this->input->post('cod_fac'),
					'num_fac' => $this->input->post('num_fac'),
                    'date_updated' => date('Y-m-d H:i:s')
					//'date_created' => $this->input->post('date_created'),
					//'date_updated' => $this->input->post('date_updated'),
                );

                $this->Invoice_model->update_invoice($id,$params);            
                redirect('invoice/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'invoice/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The invoice you are trying to edit does not exist.');
    } 

    /*
     * Deleting invoice
     */
    function remove($id)
    {
        $invoice = $this->Invoice_model->get_invoice($id);

        // check if the invoice exists before trying to delete it
        if(isset($invoice['id']))
        {
            $this->Invoice_model->delete_invoice($id);
            redirect('invoice/index');
        }
        else
            show_error('The invoice you are trying to delete does not exist.');
    }
    
}
