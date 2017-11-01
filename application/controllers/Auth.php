<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index() {
        $data['is_login'] = '0';
		$this->load->view('header',$data);
		$this->load->view('login');
        
	}
    
    public function daftar() {
        $data['is_login'] = '0';    
		$this->load->view('header',$data);
		$this->load->view('daftar');
	}

	public function cek_login() {
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => $this->input->post('password', TRUE)
			);

		$this->load->model('model_user'); // load model_user
		
		$hasil = $this->model_user->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = '1';
				$sess_data['uid'] = $sess->uid;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
                $sess_data['email'] = $sess->email;
                $sess_data['nohp'] = $sess->nohp;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='Admin') {
				redirect('home/page');
			}
			elseif ($this->session->userdata('level')=='User') {
				redirect('home/page');
			}

		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
    
    public function daftar_baru(){
        $data = array('username' => $this->input->post('username', TRUE),
						'password' => $this->input->post('password', TRUE),
                            'level' => 'User',
                                'email' => $this->input->post('email', TRUE),
                                    'nohp' => $this->input->post('nohp', TRUE)
			);
        
        $this->load->model('model_user'); // load model_user
		
		$hasil = $this->model_user->daftar($data);
        
        if ($hasil == TRUE) {
            echo "<script>alert('Pendaftaran Berhasil !');</script>";
            redirect('auth/index');    
        } else 
        {
            echo "<script>alert('Gagal daftar');history.go(-1);</script>";
        }
        
    }



}

?>
