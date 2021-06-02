<?php

 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('checkSession'));
        
        $this->load->model('User_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation','session']);
        $this->load->database();
    } 

    /*
     * Listing of users
     */
    function index()
    {
        check_isvalidated();
        $data['users'] = $this->User_model->get_all_users();
        
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new user
     */
    function add()
    {   
        check_isvalidated();
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'user_created' => $this->input->post('user_created'),
				'password' => $this->input->post('password'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'type' => $this->input->post('type'),
				//'date_created' => $this->input->post('date_created'),
				//'date_updated' => $this->input->post('date_updated'),
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('user/index');
        }
        else
        {			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a user
     */
    function edit($id)
    {   
        check_isvalidated();
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);
        
        if(isset($data['user']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'user_created' => $this->input->post('user_created'),
					'password' => $this->input->post('password'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'type' => $this->input->post('type'),
					//'date_created' => $this->input->post('date_created'),
					//'date_updated' => $this->input->post('date_updated'),
                );

                $this->User_model->update_user($id,$params);            
                redirect('user/index');
            }
            else
            {	
                $data['all_users'] = $this->User_model->get_all_users();
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    /*
     * Deleting user
     */
    function remove($id)
    {
        check_isvalidated();
        $user = $this->User_model->get_user($id);

        // check if the user exists before trying to delete it
        if(isset($user['id']))
        {
            $this->User_model->delete_user($id);
            redirect('user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }

    /*
     * Login
     */
    public function login() {
            

        // if(isset($_POST) && count($_POST) > 0)     
        // {  
            $this->form_validation->set_rules('username', 'Username', 'required');


            if ($this->form_validation->run() == FALSE) {
                
                $this->load->view('login_form');

            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $user = $this->User_model->get_user_by_username($username);
                
                // $this->session->set_flashdata('login_succ', 'apssoooooooooooo'.$password.'='.$user['password'], 300);
                // redirect(uri_string());

                if($password !== $user['password']) {
                    $this->session->set_flashdata('login_error', 'Please check your password .', 300);
                    redirect(uri_string());
                }

                if(!$user) {
                    $this->session->set_flashdata('login_error', 'Please check your user', 300);
                    redirect(uri_string());
                }

                $data = array(
                'user_id' => $user['id'],
                'username' => $user['username'],
                'type' => $user['type'],
                );
                $_SESSION['username'] = $user['username'];
                $this->session->set_userdata($data);

                if($user['type']==3)
                {
                    redirect('user/index');
                }
                else{
                    echo 'Login success!'; exit;
                }

            }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('user/login');
    }
    
}
