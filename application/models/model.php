<?php
Class Model extends CI_Model
{     
    function getmodel()
    {
        $this -> db -> select('m.*,r.refno')-> from('modelcreation m')
                -> join('refcreation r', 'm.id_refcreation = r.id_refcreation' , 'inner');
        $query = $this -> db -> get();
        return $query->result_array();
    }
        
    function updatemodel()
    {
        $data = array(
                       'id_refcreation' => $this->input->post('refno'),            
                       'modelno' => $this->input->post('modelno'),
                       'description' => $this->input->post('description'),
                       'purchaseprice' => $this->input->post('purchaseprice'),
                       'cbm' => $this->input->post('cbm'),
                       'weight' => $this->input->post('weight'),
                       'sellingprice' => $this->input->post('sellingprice'),
                       'imagename' => $this->input->post('imagename')
                    );

        $this->db->where('id_modelcreation', $this->input->post('id_modelcreation'));
        $this->db->update('modelcreation', $data);
    }
    
    function createmodel()
    {
        $data = array(
                       'id_refcreation' => $this->input->post('refno'),            
                       'modelno' => $this->input->post('modelno'),
                       'description' => $this->input->post('description'),
                       'purchaseprice' => $this->input->post('purchaseprice'),
                       'cbm' => $this->input->post('cbm'),
                       'weight' => $this->input->post('weight'),
                       'sellingprice' => $this->input->post('sellingprice'),
                       'imagename' => $this->input->post('imagename')
                    );
        $this->db->insert('modelcreation', $data);
    }     
}