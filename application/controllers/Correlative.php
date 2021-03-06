<?php

 
class Correlative extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library(['session']);
        $this->load->helper(array('checkSession'));
        check_isvalidated($this->session->userdata('type'));;
        $this->load->model('Correlative_model');

    } 

    /*
     * Listing of correlatives
     */
    function index()
    {
        $data['correlatives'] = $this->Correlative_model->get_all_correlatives();
        
        $data['_view'] = 'correlative/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new correlative
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
                'user_created' => $this->session->userdata('user_id'),
				'type' => $this->input->post('type'),
				'code' => $this->input->post('code'),
				'number' => $this->input->post('number'),
                'date_updated' => date('Y-m-d H:i:s')
				//'date_created' => $this->input->post('date_created'),
				//'date_updated' => $this->input->post('date_updated'),
            );
            
            $correlative_id = $this->Correlative_model->add_correlative($params);
            redirect('correlative/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'correlative/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a correlative
     */
    function edit($id)
    {   
        // check if the correlative exists before trying to edit it
        //$data['correlative'] = $this->Correlative_model->get_correlative($user_created);
        $data['correlative'] = $this->Correlative_model->get_correlative($id);
        
        if(isset($data['correlative']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'type' => $this->input->post('type'),
					'code' => $this->input->post('code'),
					'number' => $this->input->post('number'),
                    'date_updated' => date('Y-m-d H:i:s')
					//'date_created' => $this->input->post('date_created'),
					//'date_updated' => $this->input->post('date_updated'),
                );

                $this->Correlative_model->update_correlative($id,$params);            
                redirect('correlative/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'correlative/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The correlative you are trying to edit does not exist.');
    } 

    /*
     * Deleting correlative
     */
    function remove($id)
    {
        $correlative = $this->Correlative_model->get_correlative($id);

        // check if the correlative exists before trying to delete it
        if(isset($correlative['id']))
        {
            $this->Correlative_model->delete_correlative($id);
            redirect('correlative/index');
        }
        else
            show_error('The correlative you are trying to delete does not exist.');
    }
    
}
