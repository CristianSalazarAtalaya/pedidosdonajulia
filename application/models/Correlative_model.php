<?php

 
class Correlative_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get correlative by user_created
     */
    function get_correlative($id)
    {
        return $this->db->get_where('correlatives',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all correlatives
     */
    function get_all_correlatives()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('correlatives')->result_array();
    }
        
    /*
     * function to add new correlative
     */
    function add_correlative($params)
    {
        $this->db->insert('correlatives',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update correlative
     */
    function update_correlative($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('correlatives',$params);
    }
    
    /*
     * function to delete correlative
     */
    function delete_correlative($id)
    {
        return $this->db->delete('correlatives',array('id'=>$id));
    }
}
