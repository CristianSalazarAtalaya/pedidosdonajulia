<?php

 
class Invoice_detail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get invoice_detail by id
     */
    function get_invoice_detail($id)
    {
        return $this->db->get_where('invoice_details',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all invoice_details
     */
    function get_all_invoice_details()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('invoice_details')->result_array();
    }
        
    /*
     * function to add new invoice_detail
     */
    function add_invoice_detail($params)
    {
        $this->db->insert('invoice_details',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update invoice_detail
     */
    function update_invoice_detail($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('invoice_details',$params);
    }
    
    /*
     * function to delete invoice_detail
     */
    function delete_invoice_detail($id)
    {
        return $this->db->delete('invoice_details',array('id'=>$id));
    }
}
