<?php

 
class Person extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('checkSession'));
        check_isvalidated();
        $this->load->model('Person_model');
    } 

    /*
     * Listing of people
     */
    function index()
    {
        $data['people'] = $this->Person_model->get_all_people();
        
        $data['_view'] = 'person/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new person
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('names','Names','max_length[300]');
		$this->form_validation->set_rules('surnames','Surnames','max_length[300]');
		$this->form_validation->set_rules('sex','Sex','max_length[30]');
		$this->form_validation->set_rules('dni','Dni','max_length[20]');
		$this->form_validation->set_rules('ruc','Ruc','max_length[30]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_user' => $this->input->post('id_user'),
				'user_created' => $this->input->post('user_created'),
				'names' => $this->input->post('names'),
				'surnames' => $this->input->post('surnames'),
				'age' => $this->input->post('age'),
				'sex' => $this->input->post('sex'),
				'dni' => $this->input->post('dni'),
				'ruc' => $this->input->post('ruc'),
				//'date_created' => $this->input->post('date_created'),
				//'date_updated' => $this->input->post('date_updated'),
            );
            
            $person_id = $this->Person_model->add_person($params);
            redirect('person/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'person/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a person
     */
    function edit($id)
    {   
        // check if the person exists before trying to edit it
        $data['person'] = $this->Person_model->get_person($id);
        
        if(isset($data['person']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('names','Names','max_length[300]');
			$this->form_validation->set_rules('surnames','Surnames','max_length[300]');
			$this->form_validation->set_rules('sex','Sex','max_length[30]');
			$this->form_validation->set_rules('dni','Dni','max_length[20]');
			$this->form_validation->set_rules('ruc','Ruc','max_length[30]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_user' => $this->input->post('id_user'),
					'user_created' => $this->input->post('user_created'),
					'names' => $this->input->post('names'),
					'surnames' => $this->input->post('surnames'),
					'age' => $this->input->post('age'),
					'sex' => $this->input->post('sex'),
					'dni' => $this->input->post('dni'),
					'ruc' => $this->input->post('ruc'),
					//'date_created' => $this->input->post('date_created'),
					//'date_updated' => $this->input->post('date_updated'),
                );

                $this->Person_model->update_person($id,$params);            
                redirect('person/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();
				$data['all_users'] = $this->User_model->get_all_users();

                $data['_view'] = 'person/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The person you are trying to edit does not exist.');
    } 

    /*
     * Deleting person
     */
    function remove($id)
    {
        $person = $this->Person_model->get_person($id);

        // check if the person exists before trying to delete it
        if(isset($person['id']))
        {
            $this->Person_model->delete_person($id);
            redirect('person/index');
        }
        else
            show_error('The person you are trying to delete does not exist.');
    }
    
}
