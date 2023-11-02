<?php
class Register extends CI_Controller
{
    public function index()
    {
      $this->load->view('login');
    }
    public function student () 
    {
      $mes['msg']='Your Registration Form';
      $this->load->view('Registration_form',$mes);  
    }
    public function update() 
    {  
      $id=$this->input->post('stid');
      $stname=$this->input->post('stname');
      $stEmail=$this->input->post('stEmail');
      $stMobile=$this->input->post('stMobile');
     
      $this->load->model('regmodel');
      $result=$this->regmodel->updatedata($id,$stname,$stEmail,$stMobile);

      if ($result) {
        $this->fetchdata();
      }
    }

    public function Edit($id) 
    {
      $this->load->model('regmodel');
      $result['data']=$this->regmodel->Editdata($id);
      $this->load->view('Display records',$result);
    }

    public function savedata() {

      extract($_POST);
      $data= [
        'Name'=>$stname,
        'Email'=>$stEmail,
        'Mobile'=>$stMobile
      ];

      $this->load->model('regmodel');
      $result=$this->regmodel->insertdata($data);
     
      if($result) {
        $res['status']='Successfully inserted';
        $this->load->view('Registration_form',$res);
      }
       else{
        $res['status']= 'error while inserting data';
      }
    }
   
    public function fetchdata() 
    {
      $this->load->model('regmodel');
      $result['table']=$this->regmodel->getrecord();
      $this->load->view('Display records',$result);
      
    }   
}
?>
