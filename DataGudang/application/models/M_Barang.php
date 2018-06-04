<?php 
    class M_Barang extends CI_Model
    {

        function __construct()
        {
            parent::__construct();
        }

        public function getAll()
        {
            $q = $this->db->select('*')->from('t_barang')->get();
            return $q->result();

            //Cara 2
            // return $this->db->select('*')->from('t_barang')->get()->result();
        }

        public function getByKode($xkode)
        {
            $q = $this->db->select('*')->from('t_barang')->where('kode_barang', $xkode)->get();
            return $q->result();
        }

        public function getByNama($xnama)
        {
            // $this->db->like('title', 'match');
            $q = $this->db->select('*')->from('t_barang')->like('nama_barang', $xnama)->get();
            return $q->result();
        }

        public function getByKategori($xkategori)
        {
            $q = $this->db->select('*')->from('t_barang')->where('kategori', $xkategori)->get();
            return $q->result();
        }

        public function getByMerek($xmerek)
        {
            $q = $this->db->select('*')->from('t_barang')->where('merek', $xmerek)->get();
            return $q->result();
        }

        public function getByLetak($xletak)
        {
            $q = $this->db->select('*')->from('t_barang')->where('letak_barang', $xletak)->get();
            return $q->result();
        }

        public function insertData($data)
        {
            $data['kode_barang'] = $this->input->post('kode_barang');
            $data['nama_barang'] = $this->input->post('nama_barang');
            $data['kategori'] = $this->input->post('kategori');
            $data['merek'] = $this->input->post('merek');
            $data['stok'] = $this->input->post('stok');
            $data['letak_barang'] = $this->input->post('letak_barang');
            $this->db->insert('t_barang', $data);
        }

        public function updateData($xkode, $data)
        {
            $data['kode_barang'] = $this->input->post('kode_barang');
            $data['nama_barang'] = $this->input->post('nama_barang');
            $data['kategori'] = $this->input->post('kategori');
            $data['merek'] = $this->input->post('merek');
            $data['stok'] = $this->input->post('stok');
            $data['letak_barang'] = $this->input->post('letak_barang');

            $this->db->where('kode_barang', $xkode);
            $this->db->update('t_barang', $data);
        }

        public function deleteData($xkode)
        {
            $this->db->where('kode_barang', $xkode);
            $this->db->delete('t_barang');
        }
    }
?>