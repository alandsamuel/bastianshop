<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct()
        {
                parent::__construct();
                
                $this->data = array('title' => 'BastianShop', 'logo' => IMG.'logo.png', 'author' => '4KA05', 'user' => $this->session->userdata('username'), 'is_login' => $this->session->userdata('logged_in'));
                $this->load->model('badge');
                $this->load->model('model_user');
                $this->loginData = array('username' => $this->session->userdata('username'), 
                                         'level' => $this->session->userdata('level'), 
                                         'email' => $this->session->userdata('email'), 
                                         'nohp' => $this->session->userdata('nohp'),
                                        'uid' => $this->session->userdata('uid'));
                $tahun = date("Y"); 
                $bulan = date("m");
                $tgl   = date("d");
                $this->tanggal = $tahun.'-'.$bulan.'-'.$tgl;
        }
    
    public function profile(){
        $data = $this->data;
    }
    
    public function header(){
        $data = $this->data;
        $data['badge']=count($this->cart->contents());
        $this->load->view('header',$data);
    }
    
    public function footer(){
        $data = $this->data;
        $this->load->view('footer');
    }
    
    public function addCart($id, $asal){
        $data = $this->data;
        $b = $this->model_user->cariBarang($id)->row();     
        
        $data = array(
        'id'      => $b->idbarang,
        'qty'     => 1,
        'price'   => $b->harga,
        'name'    => $b->nama
        );

        $this->cart->insert($data);
        
        if($asal == 'katalog'){
            redirect('home/page/katalog/pulsa');
        } else {
            redirect('home/page/index');
        }
            
    }
    
    public function selesai()
    {   
        if(count($this->cart->contents())>0){
        $this->selesaiPembeli();
        
        foreach($this->cart->contents() as $d){
            $data = array('uid'=> $this->session->userdata('uid'),
                            'tanggal' => $this->tanggal,
                                'idbarang'=> $d['id'],
                                    'qty' => $d['qty']);
                $this->model_user->masukkanDetail($data);
        }
        $this->clear();
        redirect('home/page/index');
        }else
        {
        $this->clear();
        redirect('home/page/index');
        }
    }
    
    public function selesaiPembeli()
    {
        $data = array('uid' => $this->session->userdata('uid'),
                        'tanggal' => $this->tanggal,
                            'status' => 'FALSE');
        
        $this->model_user->masukkanPembeli($data);
    }
    
    public function cartDelete($rowid){
        $this->cart->update(array('rowid'=>$rowid, 'qty'=>0));
        redirect('home/page/cart');
    }
    
    public function qtyPlus($rowid,$qty){
        $newqty = $qty+1;
        $this->cart->update(array('rowid'=>$rowid, 'qty'=>$newqty));
        redirect('home/page/cart');
    }
    
    public function qtyMin($rowid,$qty){
        $newqty = $qty-1;
        $this->cart->update(array('rowid'=>$rowid, 'qty'=>$newqty));
        redirect('home/page/cart');
    }
    
    public function cartUpdate(){
        
        $i = 1;
        foreach ($this->cart->content as $items){
            $this->cart->update(array('rowid'=>$items['rowid'],'qty' => $_POST['qty'.$i]));
            $i++;
        }
        redirect('home/page/cart');
    }
    
    public function clear()
    {
        $this->cart->destroy();
        redirect('home/page/cart');
    }
    
    public function about()
    {
        $this->load->view('about');
    }
    
    public function kontak()
    {
        $this->load->view('kontak');
    }
    
    public function home()
    {
        
        $data = $this->data;
        $data = $this->loginData;
        $uid = $this->session->userdata('uid');
        $data['bxl']=$this->model_user->selectBarang();
        $data['bm']=$this->model_user->selectBarangKecil();
        
            $page = $this->uri->segment(5);
            
            $config['base_url'] = URL.'index.php/home/page/admin/histori/'.$uid;
            $config['first_link'] = 'Awal ';
            $config['last_link'] = ' Akhir';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt';
            $config['cur_tag_open'] = '<b><i><u>';
            $config['cur_tag_close'] = '</u></i></b>';
            $config['total_rows'] = count($this->model_user->cariHistory($uid));
            $config['per_page'] = 5;


            $this->pagination->initialize($config);
            $data['result'] = $this->model_user->pageHistory($uid,$config['per_page'], $page);
            $data['page'] = $this->pagination->create_links();
        
        
        
        $data['pulsa'] = $this->badge->badge_pulsa();
        $data['pd'] = $this->badge->badge_paket();
        if($this->session->userdata('level')!='Admin'){
            $this->load->view('index',$data);
        } else
        {
            $this->load->view('admin');
        }
    }
    
    public function gantiStatus($id)
    {
        $this->model_user->status($id);
        redirect('home/page/index');
    }
    
    public function hapusPembeli($id)
    {
        $this->model_user->hapus($id);
        redirect('home/page/index');
    }
    
    public function lihatKatalog(){
        $data = $this->data;
        $data = $this->loginData;
        $uid = $this->session->userdata('uid');
        $data['bxl']=$this->model_user->selectBarang();
        $data['bm']=$this->model_user->selectBarangKecil();
        $kategori = $this->uri->segment(4);
        
        switch($kategori){
                case'paket':
                    $data['barang']=$this->model_user->cariKategori($kategori='pd');
                    break;
                
                default:
                    $data['barang']=$this->model_user->cariKategori($kategori='pulsa');
        }
        
        
        $data['pulsa'] = $this->badge->badge_pulsa();
        $data['pd'] = $this->badge->badge_paket();
        $this->load->view('katalog', $data);
    }
    
    public function cart(){
        $data = $this->data;
        $data = $this->loginData;
        
        $this->load->view('cart', $data);
        
    }
    
	public function page()
	{
        $data = $this->data;
        $page = $this->uri->segment(3);
        
        $this->header();
		switch ($page){
            case 'katalog':
                $this->lihatKatalog();
                break;
                
            case 'detail':
                $this->detail();
                break;
            
            case 'cart':
                $this->cart();
                break;
            
            case 'contact':
                $this->kontak();
                break;
            
            case 'about':
                $this->about();
                break;
                
            default:
                $this->home();
        }
        //$this->footer();
	}
    
    public function logout()
    {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
        session_unset();
		redirect('auth');
    }
    
    public function detail()
    {
        $data = $this->data;
        $data = $this->loginData;
        $uid = $this->session->userdata('uid');
        $data['bxl']=$this->model_user->selectBarang();
        $data['bm']=$this->model_user->selectBarangKecil();
        $tgl = $this->uri->segment(5);
        
        $data['tanggal'] = $tgl;
        $data['uid'] = $uid;
        $data['detail'] = $this->model_user->detail($uid,$tgl);
        $data['pulsa'] = $this->badge->badge_pulsa();
        $data['pd'] = $this->badge->badge_paket();
        $this->load->view('detail',$data);
    }
    
    public function selesaiEdit()
    {   
        $masuk = $this->model_user->editBarang();
    }
    
    public function terimaTambah()
    {
        $data['input'] = array('idbarang' => $this->input->post('idbarang'),
                                    'nama' => $this->input->post('nama'),
                                        'kategori' => $this->input->post('kategori'),
                                            'harga' => $this->input->post('harga'),
                                                'gambar' => $this->input->post('gambar'),);
        
        $masuk = $this->model_user->tambahBarang($data['input']);
        echo "<script>alert('Data Ditambahkan!')</script>";
        redirect('home/page/admin/barang');
    }
    
    
}
