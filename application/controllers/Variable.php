<?php

 
class Variable extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library(['session']);
        $this->load->helper(array('checkSession'));
        check_isvalidated($this->session->userdata('type'));;
        $this->load->model('Variable_model');
    } 

    /*
     * Listing of variables
     */
    function index()
    {
        $data['variables'] = $this->Variable_model->get_all_variables();
        
        $data['_view'] = 'variable/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new variable
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'user_created' => $this->session->userdata('user_id'),
				'type' => $this->input->post('type'),
				'condition_var' => $this->input->post('condition_var'),
				'value' => $this->input->post('value'),
                'date_updated' => date('Y-m-d H:i:s')
				//'date_created' => $this->input->post('date_created'),
				//'date_updated' => $this->input->post('date_updated'),
            );
            
            $variable_id = $this->Variable_model->add_variable($params);
            redirect('variable/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'variable/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a variable
     */
    function edit($id)
    {   
        // check if the variable exists before trying to edit it
        $data['variable'] = $this->Variable_model->get_variable($id);
        
        if(isset($data['variable']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'type' => $this->input->post('type'),
					'condition_var' => $this->input->post('condition_var'),
					'value' => $this->input->post('value'),
                    'date_updated' => date('Y-m-d H:i:s')
					//'date_created' => $this->input->post('date_created'),
					//'date_updated' => $this->input->post('date_updated'),
                );

                $this->Variable_model->update_variable($id,$params);            
                redirect('variable/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'variable/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The variable you are trying to edit does not exist.');
    } 

    /*
     * Deleting variable
     */
    function remove($id)
    {
        $variable = $this->Variable_model->get_variable($id);

        // check if the variable exists before trying to delete it
        if(isset($variable['id']))
        {
            $this->Variable_model->delete_variable($id);
            redirect('variable/index');
        }
        else
            show_error('The variable you are trying to delete does not exist.');
    }
    
}
