<?php 
	class M_Kategori extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

        public function count()
        {
            return $this->db->count_all('t_kategori'); 
        }

		public function getAll()
        {
            $q = $this->db->select('*')->from('t_kategori')->get();
            return $q->result();
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "KODE_KATEGORI")
            {
                $q = $this->db->select('*')->from('t_kategori')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('t_kategori')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function insertData($data)
        {
            $this->db->insert('t_kategori', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_kategori', $xid);
            $this->db->update('t_kategori', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_kategori', $xid);
            $this->db->delete('t_kategori');
        }
	}
 ?>