<?php 
    class M_Customer extends CI_Model
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

        public function getAll()
        {
            $q = $this->db->select('*')->from('t_customer')->get();
            return $q->result();

            //Cara 2
            // return $this->db->select('*')->from('t_customer')->get()->result();
        }

        public function getByKode($xkode)
        {
            $q = $this->db->select('*')->from('t_customer')->where('kode_customer', $xkode)->get();
            return $q->result();
        }

        public function getByNama($xnama)
        {
            // $this->db->like('title', 'match');
            $q = $this->db->select('*')->from('t_customer')->like('nama_customer', $xnama)->get();
            return $q->result();
        }

        public function getByAlamat($xalamat)
        {
            $q = $this->db->select('*')->from('t_customer')->like('alamat_customer', $xalamat)->get();
            return $q->result();
        }

        public function getByEmail($xemail)
        {
            str_replace("%40", "@", $xemail);
            $q = $this->db->select('*')->from('t_customer')->where('email', $xemail)->get();
            return $q->result();
        }

        public function getByTelp($xtelp)
        {
            $q = $this->db->select('*')->from('t_customer')->where('telp', $xtelp)->get();
            return $q->result();
        }

        public function insertData($data)
        {
            $data['kode_customer'] = $this->input->post('kode_customer');
            $data['nama_customer'] = $this->input->post('nama_customer');
            $data['alamat_customer'] = $this->input->post('alamat_customer');
            $data['email'] = $this->input->post('email');
            $data['telp'] = $this->input->post('telp');

            $this->db->insert('t_customer', $data);
        }

        public function updateData($xkode, $data)
        {
            $data['kode_customer'] = $this->input->post('kode_customer');
            $data['nama_customer'] = $this->input->post('nama_customer');
            $data['alamat_customer'] = $this->input->post('alamat_customer');
            $data['email'] = $this->input->post('email');
            $data['telp'] = $this->input->post('telp');

            $this->db->where('kode_customer', $xkode);
            $this->db->update('t_customer', $data);
        }

        public function deleteData($xkode)
        {
            $this->db->where('kode_customer', $xkode);
            $this->db->delete('t_customer');
        }
    }
?>