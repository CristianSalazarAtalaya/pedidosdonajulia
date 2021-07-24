<?php
 
class Client extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Direction_model');
        $this->load->model('Person_model');
        $this->load->model('Invoice_model');
        $this->load->model('Invoice_detail_model');
        $this->load->model('Variable_model');
        
        $this->load->model('User_model');
        $this->load->library(['session']);
        $this->load->helper(array('checkSession'));
        //check_isvalidated($this->session->userdata('type'));;
        
    }

    function index()
    {
        //check_isvalidated($this->session->userdata('type'));;
        $data['categories'] = $this->Product_model->get_all_categories();
        $data['products'] = $this->Product_model->get_all_products_with_oferts();
        $data['_view'] = 'client/index';
        $this->load->view('layouts/main_client',$data);
    }

    function register()
    {
        if(isset($_POST) && count($_POST) > 0)   
        {

            $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $params = array(
				'user_created' => 1,
				'password' => $hash,
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'type' => 1,
                'date_updated' => date('Y-m-d H:i:s')
            );
            
            $user_id = $this->User_model->add_user($params);

            $params = array(
				'id_user' => $user_id,
				'user_created' => $user_id,
				'names' => $this->input->post('names'),
				'surnames' => $this->input->post('surnames'),
				'age' => $this->input->post('age'),
				'sex' => $this->input->post('sex'),
				'dni' => $this->input->post('dni'),
				'ruc' => $this->input->post('ruc'),
                'date_updated' => date('Y-m-d H:i:s')
            );
            $person_id = $this->Person_model->add_person($params);

            $params = array(
				'id_user' => $user_id,
				'department' => $this->input->post('department'),
				'province' => $this->input->post('province'),
				'district' => $this->input->post('district'),
				'direction' => $this->input->post('direction'),
				'reference_dir' => $this->input->post('reference_dir'),
                'date_updated' => date('Y-m-d H:i:s')
            );
            
            $direction_id = $this->Direction_model->add_direction($params);


            $this->session->set_flashdata('registeruser', 'Se registro!!', 300);
            
            $data = array(
                    'user_id' => $user_id,
                    'username' => $this->input->post('username'),
                    'type' => 1,
            );
            
            $this->session->set_userdata($data);
                    

            $session_id_get = $this->session->session_id;
            $params = array(
                'last_login_date' => date('Y-m-d H:i:s'),
                'last_login_host' =>  getenv("REMOTE_ADDR"),
                'last_login_sessionid' => $session_id_get
            );
                    
                    
            $this->User_model->update_user($user['id'],$params);
            
            redirect('client');
        }  
        else
        {   
            // $data['categories'] = $this->Product_model->get_all_categories();
            $data['all_variables'] = $this->Variable_model->get_all_variables();
            $data['_view'] = 'client/register';
            $this->load->view('layouts/main_client',$data);
        }
    }

    function doBuyFromCar()
    {
       //check_isvalidated($this->session->userdata('type'));;

        if($_POST["data"]>0)
        {

            $user_id = $this->session->userdata('user_id');

            $direction_fromuser =  $this->Direction_model->get_directions_by_userid($user_id);
            $person_fromuser =  $this->Person_model->get_person_by_userid($user_id);

            //echo $user_id;
            //echo implode("|",$direction);
            $direction =   $direction_fromuser["department"]."-".$direction_fromuser["province"]."-".$direction_fromuser["district"]."-".$direction_fromuser["direction"];
            $direction_ref =   $direction_fromuser["reference_dir"];
             
            $numDocType = 1;
            $numDocPerson = $person_fromuser["dni"];
            //$numDocType = gettype($person_fromuser);
            if (strlen($person_fromuser["ruc"])==20){
                $numDocType = 2; 
                $numDocPerson = $person_fromuser["ruc"];
            }

            //echo "numtypo_asdasd:".$numDocType;
            $params = array(
				'id_user' => 15,
				'direction' => $direction,
				'reference_dir' =>  $direction_ref,
				'total_price' => 0,
				'date_order' =>  date('Y-m-d H:i:s'),
				'type_pay' => 1,
				'type_doc' => $numDocType,
				'num_doc' => $numDocPerson,
				//'cod_fac' => $this->input->post('cod_fac'),
				//'num_fac' => $this->input->post('num_fac'),
                'date_updated' => date('Y-m-d H:i:s')
            );
            

            $invoice_id = $this->Invoice_model->add_invoice($params);

            

            $totalPrice = 0;
            for ($i = 0; $i < count($_POST["data"]); $i++) {


                $thisIdProd = $_POST["data"][$i]["productId"];
                $thisQuantity = $_POST["data"][$i]["cantidad"];
                $thisProduct = $this->Product_model->get_product($thisIdProd);
                
                $thisProductName =  $thisProduct["names"];
                $thisPrice =  $thisProduct["price"];
                $thisDiscont =  $thisProduct["discount"];

                $totalPrice += $thisQuantity*($thisPrice-$thisDiscont);
                $params = array(
                    'id_invoice' => $invoice_id,
                    'id_product' => $thisIdProd,
                    'name_product' => $thisProductName,
                    'amount' => $thisQuantity,
                    'price' => $thisPrice,
                    'discount' => $thisDiscont,
                    'final_price' => ($thisPrice - $thisDiscont),
                    'date_updated' => date('Y-m-d H:i:s')
                );
                
                $invoice_detail_id = $this->Invoice_detail_model->add_invoice_detail($params);
            }
            $params = array(
				'total_price' => $totalPrice
            );
            $this->Invoice_model->update_invoice($invoice_id,$params);
            //echo $totalPrice;

            echo $invoice_id;

        }
        else{
            echo "NOT TODAY";
        }
        
    }


}
