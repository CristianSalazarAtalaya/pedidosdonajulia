<?php

 
class Variable_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get variable by id
     */
    function get_variable($id)
    {
        return $this->db->get_where('variables',array('id'=>$id))->row_array();
    }
    
    function get_variable_by_typeandcond($type, $cond="")
    {
        //return $this->db->get_where('variables',array('id'=>$id))->row_array();
        //$this->db->order_by('id', 'desc');
        return $this->db->get_where('variables',array('type'=>$type, 'condition_var'=>$cond ))->result_array();
    }

    /*
     * Get all variables
     */
    function get_all_variables()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('variables')->result_array();
    }
        
    /*
     * function to add new variable
     */
    function add_variable($params)
    {
        $this->db->insert('variables',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update variable
     */
    function update_variable($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('variables',$params);
    }
    
    /*
     * function to delete variable
     */
    function delete_variable($id)
    {
        return $this->db->delete('variables',array('id'=>$id));
    }
}
