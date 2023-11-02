<?php
class regmodel extends CI_Model
{
   public function updatedata($id,$name,$Email,$Mobile) 
   {
      $this->load->database();
      $data=[
         'Name'=>$name,
         'Email'=>$Email,
         'Mobile'=>$Mobile
      ];

      $this->db->where('id',$id);
      return $this->db->update('studentreg',$data);
   }
    public function  Editdata($id) 
    {
      $this->load->database();
      $this->db->where('id',$id);
      return $this->db->get('studentreg')->result();
    }

    public function insertdata($data) {
       $this->load->database();
       return $this->db->insert('studentreg',$data);

    }

    public function receivesegment($data) {
       foreach ($data as $p) {
        echo $p.'<br>';
       }
       
    }
    public function getrecord() 
    {
      $this->load->database();
      return $this->db->get('studentreg')->result();
    }
}
?>