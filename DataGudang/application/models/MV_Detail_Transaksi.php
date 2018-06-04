<?php 
    class MV_Detail_Transaksi extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
            $q = $this->db->select('*')->from('v_detail_transaksi')->get();
            return $q->result();
        }

        public function count()
        {
            return $this->db->count_all('t_detail_transaksi'); 
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "KODE_TRANSAKSI" || $xparam == "USERNAME")
            {
                $q = $this->db->select('*')->from('v_detail_transaksi')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('v_detail_transaksi')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function getByRange($xparam, $xmin, $xmax)
        {
            $this->db->where($xparam.">=", $xmin);
            $this->db->where($xparam."<=", $xmax);
            $q = $this->db->select('*')->from('v_detail_transaksi')->get();

            return $q->result();
        }

        public function orderBy($xparam, $xargs)
        {
            $this->db->order_by($xparam, $xargs);
            $q = $this->db->select('*')->from('v_detail_transaksi')->get();
            return $q->result();
        }

        public function insertData($data)
        {
            $this->db->insert('t_detail_transaksi', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_detail_transaksi', $xid);
            $this->db->delete('t_detail_transaksi');
        }
    }
?>