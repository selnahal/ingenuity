<?php


class Event extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function createEvent($params)
    {
    	$query = $this->db->insert_string('events', $params);
     	$query = $this->db->query($query);

      	if($this->db->affected_rows() != 1){
          	return false;
        }
        return true;
    }

    public function retrieveEvents()
    {
    	$this->db->select('*');
    	$this->db->from('events');
    	$query = $this->db->get();
           if($query->num_rows() >0){
              return $query->result();
           } 

           return false; 
    }

    function updateEvent($params)
    {
    	$q = $this
              ->db
              ->where('title',$params['title'])
              ->update('events',$params);

       if($this->db->affected_rows() != 1){
          return false;
        }

        return true;
    }
}