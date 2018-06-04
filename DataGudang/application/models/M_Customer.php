<?php 
    class M_Customer extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }

        public function count()
        {
            return $this->db->count_all('t_customer'); 
        }

        public function getAll()
        {
            $q = $this->db->select('*')->from('t_customer')->get();
            return $q->result();
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "KODE_CUSTOMER" || $xparam == "EMAIL_CUSTOMER" || $xparam == "TELP_CUSTOMER")
            {
                $q = $this->db->select('*')->from('t_customer')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('t_customer')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function insertData($data)
        {
            $this->db->insert('t_customer', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_customer', $xid);
            $this->db->update('t_customer', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_customer', $xid);
            $this->db->delete('t_customer');
        }
    }
?>