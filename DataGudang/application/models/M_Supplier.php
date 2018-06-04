<?php 
    class M_Supplier extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }

        public function count()
        {
            return $this->db->count_all('t_supplier'); 
        }

        public function getAll()
        {
            $q = $this->db->select('*')->from('t_supplier')->get();
            return $q->result();
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "KODE_SUPPLIER" || $xparam == "EMAIL_SUPPLIER" || $xparam == "TELP_SUPPLIER")
            {
                $q = $this->db->select('*')->from('t_supplier')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('t_supplier')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function insertData($data)
        {
            $this->db->insert('t_supplier', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_supplier', $xid);
            $this->db->update('t_supplier', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_supplier', $xid);
            $this->db->delete('t_supplier');
        }
    }
?>