<?php 
	class M_User extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function login($xusername, $xpassword)
		{
			$this->db->select('*');
			$this->db->where('username', $xusername);
			$this->db->where('password', $xpassword);

			$user = $this->db->get('t_user');

			if ($user->num_rows() > 0)
			{
				return $user;
			}

			else
			{
				return FALSE;
			}
		}

        public function count()
        {
            return $this->db->count_all('t_user'); 
        }

		public function getAll()
        {
            $q = $this->db->select('*')->from('t_user')->get();
            return $q->result();
        }

        public function getAllType()
        {
            $q = $this->db->select('*')->from('t_tipe_user')->get();
            return $q->result();
        }

        public function getBy($xparam, $xargs)
        {
            if ($xparam == "ID_TIPE_USER" || $xparam == "USERNAME" || $xparam == "EMAIL_SUPPLIER"  || $xparam == "TELP_SUPPLIER")
            {
                $q = $this->db->select('*')->from('t_user')->where($xparam, $xargs)->get();
            }
            else
            {
                $q = $this->db->select('*')->from('t_user')->like($xparam, $xargs)->get();
            }

            return $q->result();
        }

        public function insertData($data)
        {
            $this->db->insert('t_user', $data);
        }

        public function updateData($xid, $data)
        {
            $this->db->where('id_akun', $xid);
            $this->db->update('t_user', $data);
        }

        public function deleteData($xid)
        {
            $this->db->where('id_akun', $xid);
            $this->db->delete('t_user');
        }
	}
 ?>