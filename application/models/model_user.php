<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_user extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('login_session', $data);
			return $query;
		}
        
        public function daftar($data) {
            $query = $this->db->insert('login_session', $data);
            return $query;
        }
        
        public function cariHistory($uid){
            $this->db->select('*');
            $this->db->from('pembelian');
            $this->db->where('uid', $uid);
            $query = $this->db->get();
            
            return $query->result();
        }
        
        public function pageHistory($uid,$limit,$row){
            $this->db->select('*');
            $this->db->where('uid', $uid);
            $query = $this->db->get('pembelian',$limit,$row);
            
            return $query->result();
        }
        
        public function cariDetail($uid, $tgl){
            $this->db->select('*');
            $this->db->from('detail');
            $this->db->where('uid', $uid);
            $this->db->where('tanggal', $tgl);
            $query = $this->db->get();
            
            return $query->result();
        }
		
        public function cariBarang($id)
        {
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->where('idbarang', $id);
            $query = $this->db->get();
            
            return $query;
        }
        
        public function cariKategori($kategori)
        {
            $this->db->select('nama,harga,idbarang,gambar');
            $this->db->from('barang');
            $this->db->where('kategori', $kategori);
            $query = $this->db->get()->result();
            
            return $query;
        }
        
        public function detail($uid, $tgl)
        {
            $this->db->select('detail.qty, barang.nama, barang.harga');
            $this->db->from('detail');
            $this->db->join('barang', 'detail.idbarang = barang.idbarang', 'inner');
            $this->db->where('detail.uid', $uid);
            $this->db->where('detail.tanggal', $tgl);
            
            $query = $this->db->get();
            
            return $query->result();
        }
        
        public function selectBarang()
        {
            return $this->db->get('barang',1,1)->result();
        }
        
        public function selectBarangKecil()
        {
            return $this->db->get('barang',6,3)->result();
        }
        
        public function masukkanDetail($data)
        {
            $this->db->insert('detail',$data);
        }
        
        public function masukkanPembeli($user)
        {
            $this->db->insert('pembelian', $user);
        }
        
        public function ambilPembeli()
        {
            $this->db->select('login_session.username,pembelian.tanggalPanjang,pembelian.iddetail, pembelian.uid,pembelian.tanggal,login_session.nama');
            $this->db->from('login_session');
            $this->db->join('pembelian', 'login_session.uid = pembelian.uid', 'inner');
            $this->db->where('pembelian.status', 'FALSE');
            return $this->db->get()->result();
        }
        
        public function pageAmbil($limit, $row)
        {
            $this->db->select('login_session.username,pembelian.tanggalPanjang,pembelian.iddetail, pembelian.uid,pembelian.tanggal,login_session.nama');
            $this->db->join('pembelian', 'login_session.uid = pembelian.uid', 'inner');
            $this->db->where('pembelian.status', 'FALSE');
            return $this->db->get('login_session', $limit, $row)->result();
        }
        
        public function historiBeli()
        {
            $this->db->select('login_session.username,pembelian.tanggalPanjang,pembelian.iddetail, pembelian.uid,pembelian.tanggal,login_session.nama');
            $this->db->join('pembelian', 'login_session.uid = pembelian.uid', 'inner');
            $this->db->where('pembelian.status', 'TRUE');
            return $this->db->get('login_session')->result();
        }
        
        public function pageHistori($limit, $row)
        {
            $this->db->select('login_session.username,pembelian.tanggalPanjang,pembelian.iddetail, pembelian.uid,pembelian.tanggal,login_session.nama');
            $this->db->join('pembelian', 'login_session.uid = pembelian.uid', 'inner');
            $this->db->where('pembelian.status', 'TRUE');
            return $this->db->get('login_session', $limit, $row)->result();
        }
        
        public function status($id)
        {
            $this->db->set('status','TRUE');
            $this->db->where('iddetail',$id);
            $this->db->update('pembelian');
        }
        
        public function hapus($id)
        {
            $this->db->where('iddetail',$id);
            $this->db->delete('pembelian');
        }
        
        public function cariUser($nama){
            $this->db->like('nama', $nama, 'after');  
            return $this->db->get('login_session')->result();
        }
        
         public function selectSemuaBarang()
        {
            return $this->db->get('barang');
        }
        
        public function editBarang()
        {
            $data = array('idbarang' => $this->input->post('idbarang'),
                        'nama' => $this->input->post('nama'),
                            'kategori' => $this->input->post('kategori'),
                                'harga' => $this->input->post('harga'));
            
            $this->db->where('idbarang', $this->input->post('idbarang'));
            $this->db->update('barang', $data);
            
            redirect('home/page/admin/barang');
        }
        
        public function pagination($limit, $row)
        {
        return $this->db->get('barang', $limit, $row)->result();
        }
        
        public function tambahBarang($data)
        {
            $this->db->insert('barang',$data);
        }
        
        public function hapusBarang($id)
        {
            $this->db->where('idbarang', $id);
            $this->db->delete('barang');
        }
	}

?>