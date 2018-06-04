<?php 
	class M_Merek extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

        public function count()
        {
            return $this->db->count_all('t_merek'); 
        }

		public function getAll()
        {
            $q = $this->db->select('*')->from('t_merek')->get();
            return $q->result();
        }

        public function getBy($xparam, $xargs)
        {
            $q = $this->db->select('*')->from('t_merek')->like($xparam, $xargs)->get();
            return $q->result();
        }

        public function insertData($data)
        {
            $this->db->insert('t_merek', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_merek', $xid);
            $this->db->update('t_merek', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_merek', $xid);
            $this->db->delete('t_merek');
        }
	}
 ?>