<?php

 
class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get product by id
     */
    function get_product($id)
    {
        return $this->db->get_where('products',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all products
     */
    function get_all_products()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('products')->result_array();
    }
        
    /*
     * function to add new product
     */
    function add_product($params)
    {
        $this->db->insert('products',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update product
     */
    function update_product($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('products',$params);
    }
    
    /*
     * function to delete product
     */
    function delete_product($id)
    {
        return $this->db->delete('products',array('id'=>$id));
    }
}
