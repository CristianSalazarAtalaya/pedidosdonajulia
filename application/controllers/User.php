<?php



class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        
        $this->load->library(['session']);
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
        check_isvalidated($this->session->userdata('type'));;
        $data['users'] = $this->User_model->get_all_users();
        
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new user
     */
    function add()
    {   
        check_isvalidated($this->session->userdata('type'));

        if(isset($_POST) && count($_POST) > 0)     
        {   
            $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $params = array(
				//'user_created' => $this->session->userdata('user_id'),
                'user_created' => $this->session->userdata('user_id'),
				'password' => $hash,
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'type' => $this->input->post('type'),
                'date_updated' => date('Y-m-d H:i:s')
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
        check_isvalidated($this->session->userdata('type'));;
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);
        
        if(isset($data['user']['id']))
        {
            $hash=$this->input->post('password');
            if(strlen($hash)<20)
            {
                $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            }

            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					//'user_created' => $this->session->userdata('user_id'),
					'password' => $hash,
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'type' => $this->input->post('type'),
                    'date_updated' => date('Y-m-d H:i:s')
					//'date_created' => $this->input->post('date_created'),
					//'date_updated' => $this->input->post('date_updated'),
                );

                $this->User_model->update_user($id,$params);            
                redirect('user/index');
            }
            else
            {	
                $data['all_users'] =$this->User_model->get_user($data['user']['user_created']);
                // $this->User_model->get_all_users();
                //$data['password']
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 
    /*
     * Update last login
     */
    private function updateLastlogin($id)
    {   
        
        $params = array(
            //'last_login_date' => date('Y-m-d H:i:s'),
            'las_login_host' => getenv("REMOTE_ADDR")
        );

        $this->User_model->update_user($id,$params);
    } 

    /*
     * Deleting user
     */
    function remove($id)
    {
        check_isvalidated($this->session->userdata('type'));;
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
                
                

                //if($password !== $user['password']) 
                if(!password_verify($password, $user['password']))
                {
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
                
                $params = array(
                    
                    'last_login_date' => date('Y-m-d H:i:s'),
                    'last_login_host' =>  getenv("REMOTE_ADDR")
                );

                $this->User_model->update_user($user['id'],$params);
                //$_SESSION['username'] = $user['username'];
                $this->session->set_userdata($data);

                if($user['type']==3)
                {
                    redirect('user/index');
                }
                else{
                    redirect('client');
                }

            }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('user/login');
    }
    
}
