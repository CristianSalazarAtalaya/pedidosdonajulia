<?php

class Invoice_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get invoice by id
     */
    function get_invoice($id)
    {
        return $this->db->get_where('invoice',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all invoice count
     */
    function get_all_invoice_count()
    {
        $this->db->from('invoice');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all invoice
     */
    function get_all_invoice($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('invoice')->result_array();
    }
        
    /*
     * function to add new invoice
     */
    function add_invoice($params)
    {
        $this->db->insert('invoice',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update invoice
     */
    function update_invoice($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('invoice',$params);
    }
    
    /*
     * function to delete invoice
     */
    function delete_invoice($id)
    {
        return $this->db->delete('invoice',array('id'=>$id));
    }
}
