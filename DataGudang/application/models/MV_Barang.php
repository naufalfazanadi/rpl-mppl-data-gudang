<?php 
    class MV_Barang extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
            // $this->db->order_by('nama_barang', 'ASC');
            $q = $this->db->select('*')->from('v_barang')->get();
            return $q->result();

            //Cara 2
            // return $this->db->select('*')->from('v_barang')->get()->result();
        }

        public function count()
        {
            return $this->db->count_all('t_barang'); 
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "KODE_BARANG")
            {
                $q = $this->db->select('*')->from('v_barang')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('v_barang')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function orderBy($xparam, $xargs)
        {
            $this->db->order_by($xparam, $xargs);
            $q = $this->db->select('*')->from('v_barang')->get();
            return $q->result();
        }

       public function insertData($data)
        {
            $this->db->insert('t_barang', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_barang', $xid);
            $this->db->update('t_barang', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_barang', $xid);
            $this->db->delete('t_barang');
        }
    }
?>