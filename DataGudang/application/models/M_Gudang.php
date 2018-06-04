<?php 
	class M_Gudang extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

        public function count()
        {
            return $this->db->count_all('t_gudang'); 
        }

		public function getAll()
        {
            $q = $this->db->select('*')->from('t_gudang')->get();
            return $q->result();
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "KODE_GUDANG")
            {
                $q = $this->db->select('*')->from('t_gudang')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('t_gudang')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function insertData($data)
        {
            $this->db->insert('t_gudang', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_gudang', $xid);
            $this->db->update('t_gudang', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_gudang', $xid);
            $this->db->delete('t_gudang');
        }
	}
 ?>