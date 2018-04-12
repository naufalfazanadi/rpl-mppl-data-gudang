<?php 
    class M_Supplier extends CI_Model
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
            $q = $this->db->select('*')->from('t_supplier')->get();
            return $q->result();

            //Cara 2
            // return $this->db->select('*')->from('t_supplier')->get()->result();
        }

        public function getByKode($xkode)
        {
            $q = $this->db->select('*')->from('t_supplier')->where('kode_supplier', $xkode)->get();
            return $q->result();
        }

        public function getByNama($xnama)
        {
            // $this->db->like('title', 'match');
            $q = $this->db->select('*')->from('t_supplier')->like('nama_supplier', $xnama)->get();
            return $q->result();
        }

        public function getByAlamat($xalamat)
        {
            $q = $this->db->select('*')->from('t_supplier')->like('alamat_supplier', $xalamat)->get();
            return $q->result();
        }

        public function getByEmail($xemail)
        {
            $q = $this->db->select('*')->from('t_supplier')->where('email', $xemail)->get();
            return $q->result();
        }

        public function getByTelp($xtelp)
        {
            $q = $this->db->select('*')->from('t_supplier')->where('telp', $xtelp)->get();
            return $q->result();
        }

        public function insertData($data)
        {
            $data['kode_supplier'] = $this->input->post('kode_supplier');
            $data['nama_supplier'] = $this->input->post('nama_supplier');
            $data['alamat_supplier'] = $this->input->post('alamat_supplier');
            $data['email'] = $this->input->post('email');
            $data['telp'] = $this->input->post('telp');

            $this->db->insert('t_supplier', $data);
        }

        public function updateData($xkode, $data)
        {
            $data['kode_supplier'] = $this->input->post('kode_supplier');
            $data['nama_supplier'] = $this->input->post('nama_supplier');
            $data['alamat_supplier'] = $this->input->post('alamat_supplier');
            $data['email'] = $this->input->post('email');
            $data['telp'] = $this->input->post('telp');

            $this->db->where('kode_supplier', $xkode);
            $this->db->update('t_supplier', $data);
        }

        public function deleteData($xkode)
        {
            $this->db->where('kode_supplier', $xkode);
            $this->db->delete('t_supplier');
        }
    }
?>