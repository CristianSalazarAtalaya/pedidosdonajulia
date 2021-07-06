<?php

class Direction extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('checkSession'));
        check_isvalidated($this->session->userdata('type'));;
        $this->load->model('Direction_model');
    } 

    /*
     * Listing of directions
     */
    function index()
    {
        $data['directions'] = $this->Direction_model->get_all_directions();
        
        $data['_view'] = 'direction/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new direction
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id_user' => $this->session->userdata('user_id'),
				'user_created' => $this->session->userdata('user_id'),
				'department' => $this->input->post('department'),
				'province' => $this->input->post('province'),
				'district' => $this->input->post('district'),
				'direction' => $this->input->post('direction'),
				'reference_dir' => $this->input->post('reference_dir'),
				//'date_created' => $this->input->post('date_created'),
				//'date_updated' => $this->input->post('date_updated'),
            );
            
            $direction_id = $this->Direction_model->add_direction($params);
            redirect('direction/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'direction/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a direction
     */
    function edit($id)
    {   
        // check if the direction exists before trying to edit it
        $data['direction'] = $this->Direction_model->get_direction($id);
        
        if(isset($data['direction']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_user' => $this->input->post('id_user'),
					'department' => $this->input->post('department'),
					'province' => $this->input->post('province'),
					'district' => $this->input->post('district'),
					'direction' => $this->input->post('direction'),
					'reference_dir' => $this->input->post('reference_dir'),
					//'date_created' => $this->input->post('date_created'),
					//'date_updated' => $this->input->post('date_updated'),
                );

                $this->Direction_model->update_direction($id,$params);            
                redirect('direction/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'direction/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The direction you are trying to edit does not exist.');
    } 

    /*
     * Deleting direction
     */
    function remove($id)
    {
        $direction = $this->Direction_model->get_direction($id);

        // check if the direction exists before trying to delete it
        if(isset($direction['id']))
        {
            $this->Direction_model->delete_direction($id);
            redirect('direction/index');
        }
        else
            show_error('The direction you are trying to delete does not exist.');
    }
    
}
