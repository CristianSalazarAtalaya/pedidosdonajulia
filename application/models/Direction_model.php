<?php

 
class Direction_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get direction by id
     */
    function get_direction($id)
    {
        return $this->db->get_where('directions',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all directions
     */
    function get_all_directions()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('directions')->result_array();
    }
        
    /*
     * function to add new direction
     */
    function add_direction($params)
    {
        $this->db->insert('directions',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update direction
     */
    function update_direction($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('directions',$params);
    }
    
    /*
     * function to delete direction
     */
    function delete_direction($id)
    {
        return $this->db->delete('directions',array('id'=>$id));
    }
}
