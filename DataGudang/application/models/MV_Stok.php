<?php 
    class MV_Stok extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
            $q = $this->db->select('*')->from('v_stok')->get();
            return $q->result();
        }
    }
?>