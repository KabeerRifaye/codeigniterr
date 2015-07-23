<?php
Class Costmodel extends CI_Model
{         
    function createcost()
    {
        $data = array(  
                       'purchaseno' => $this->input->post('purchaseno'),
                       'purchasedate' => date("Y-m-d", strtotime($this->input->post('purchasedate'))),
                       'arrivaldate' => date("Y-m-d", strtotime($this->input->post('arrivaldate'))),
                       'cbmexp' => $this->input->post('cbmexp'),
                       'com' => $this->input->post('com'),            
                       'per1' => $this->input->post('per1'),
                       'per2' => $this->input->post('per2'),
                       'conversion' => $this->input->post('conversion'),                          
                    );
        $this->db->insert('cost', $data);
        return $this->db->insert_id();
    }
    
    function getreferencecombo()
    {
      $this -> db -> select('a.refno,b.modelno,b.description')-> from('refcreation a')
                  -> join('modelcreation b', 'a.id_refcreation = b.id_refcreation' , 'inner');
      $query = $this -> db -> get();
      return $query->result_array();
    }         
}