<?php 
    class MV_Transaksi extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
            $q = $this->db->select('*')->from('v_transaksi')->get();
            return $q->result();
        }

        public function getAllIn()
        {
            $this->db->where('nama_tipe_transaksi', "Masuk");
            $q = $this->db->select('*')->from('v_transaksi')->get();
            return $q->result();
        }

        public function getByRangeIn($xparam, $xmin, $xmax)
        {
            $this->db->where('nama_tipe_transaksi', "Masuk");
            $this->db->where($xparam.">=", $xmin);
            $this->db->where($xparam."<=", $xmax);
            $q = $this->db->select('*')->from('v_transaksi')->get();

            return $q->result();
        }

        public function getAllOut()
        {
            $this->db->where('nama_tipe_transaksi', "Keluar");
            $q = $this->db->select('*')->from('v_transaksi')->get();
            return $q->result();
        }

        public function getByRangeOut($xparam, $xmin, $xmax)
        {
            $this->db->where('nama_tipe_transaksi', "Keluar");
            $this->db->where($xparam.">=", $xmin);
            $this->db->where($xparam."<=", $xmax);
            $q = $this->db->select('*')->from('v_transaksi')->get();

            return $q->result();
        }

        public function countIn()
        {
            $this->db->where('id_tipe_transaksi', 1);
            return $this->db->count_all_results('t_transaksi'); 
        }

        public function countOut()
        {
            $this->db->where('id_tipe_transaksi', 2);
            return $this->db->count_all_results('t_transaksi'); 
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "KODE_TRANSAKSI" || $xparam == "USERNAME")
            {
                $q = $this->db->select('*')->from('v_transaksi')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('v_transaksi')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function getByIn($xparam, $xargs)
        {
            $this->db->where('nama_tipe_transaksi', "Masuk");

            if ($xparam == "KODE_TRANSAKSI" || $xparam == "USERNAME")
            {
                $this->db->where($xparam, $xargs);
                $q = $this->db->select('*')->from('v_transaksi')->get();
            }
            else
            {
                $this->db->like($xparam, $xargs);
                $q = $this->db->select('*')->from('v_transaksi')->get();
            }

            return $q->result();
        }

        public function getByOut($xparam, $xargs)
        {
            $this->db->where('nama_tipe_transaksi', "Keluar");
            
            if ($xparam == "KODE_TRANSAKSI" || $xparam == "USERNAME")
            {
                $this->db->where($xparam, $xargs);
                $q = $this->db->select('*')->from('v_transaksi')->get();
            }
            else
            {
                $this->db->like($xparam, $xargs);
                $q = $this->db->select('*')->from('v_transaksi')->get();
            }

            return $q->result();
        }

        public function orderBy($xparam, $xargs)
        {
            $this->db->order_by($xparam, $xargs);
            $q = $this->db->select('*')->from('v_transaksi')->get();
            return $q->result();
        }

       public function insertData($data)
        {
            $this->db->insert('t_transaksi', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_transaksi', $xid);
            $this->db->update('t_transaksi', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_transaksi', $xid);
            $this->db->delete('t_transaksi');
        }
    }
?>