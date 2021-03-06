<?php

 
class Person_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get person by id
     */
    function get_person($id)
    {
        return $this->db->get_where('people',array('id'=>$id))->row_array();
    }

    function get_person_by_userid($id)
    {
        return $this->db->get_where('people',array('id_user'=>$id))->row_array();
    }
        
    /*
     * Get all people
     */
    function get_all_people()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('people')->result_array();
    }
        
    /*
     * function to add new person
     */
    function add_person($params)
    {
        $this->db->insert('people',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update person
     */
    function update_person($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('people',$params);
    }
    
    /*
     * function to delete person
     */
    function delete_person($id)
    {
        return $this->db->delete('people',array('id'=>$id));
    }
}
