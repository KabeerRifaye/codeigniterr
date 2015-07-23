<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Cost extends CI_Controller {

function __construct()
{
  parent::__construct();
}
 
function index()
{
        if($this->session->userdata('logged_in'))
        {                 
            $this->load->model('cbmmodel','',TRUE);
            $this->load->model('costmodel','',TRUE);
            $session_data = $this->session->userdata('logged_in');
            $data['login_userid'] = $session_data['username'];
            $data['current_menu'] = 'cost';

            $data['base']        = $this->config->item('base_url');
            $data['purchase_combo'] = $this->cbmmodel->getcbm(); 
            $data['reference_combo'] = $this->costmodel->getreferencecombo(); 
            $this->load->view('cost_view',$data);
        }
        else
        {
            redirect('login' , 'refresh');
        }
}
 
function createcostdata()
{
    $this->load->model('costmodel','',TRUE);
    $id = $this->costmodel->createcost();    
    echo $id;
}

function getpurchasedetails()
{
    $this->load->model('cbmmodel','',TRUE);
    $purchaseno = $this->input->post('purchaseno');
    $value = $this->cbmmodel->getpurchase($purchaseno);
    if(is_array($value)){
            echo json_encode($value);
    }
}
 
}

?>
