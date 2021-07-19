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
        
        $this->load->model('User_model');
        $this->load->library(['session']);
        $this->load->helper(array('checkSession'));
        //check_isvalidated($this->session->userdata('type'));;
        
    }

    function index()
    {
        $data['categories'] = $this->Product_model->get_all_categories();
        $data['products'] = $this->Product_model->get_all_products_with_oferts();
        $data['_view'] = 'client/index';
        $this->load->view('layouts/main_client',$data);
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
            echo "mrd!!";
        }
        
    }


}
