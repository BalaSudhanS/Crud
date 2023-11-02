<?php
class Email extends CI_Controller{

    public function send_email() {
        $seg1=$this->uri->segment(1);
        $seg2=$this->uri->segment(2);
        $seg3=$this->uri->segment(3);
        $seg4=$this->uri->segment(4);
    
        $para=array($seg1,$seg2,$seg3,$seg4);
        $this->load->model('regmodel');
        $this->regmodel->receivesegment($para);    

    }
}
?>