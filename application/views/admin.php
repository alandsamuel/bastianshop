<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <h2>Selamat Datang, <?php echo $user; ?></h2>
    </div>
</div>
<br>
<?php switch($is_login) {

    case '1':
    ?>
<!-- menu bawah -->
<div class="row">
    <div class="col-md-8 col-md-offset-2 wow zoomInUp" >
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><img src="<?php echo IMG.'300.gif'; ?>" height="4%" width="4%"/> | Hi Admin!</h3>
          </div>
          <div class="panel-body">
              <h3 style="color:black">Navigation</h3>
            <hr>
              <div class="button-group">
                  <a href="<?php echo URL.'home/page/admin/listuser'; ?>"><button type="button" class="btn btn-default">Penjualan <span class="badge"><?php echo count($this->model_user->ambilPembeli());?></span></button></a>
                  <a href="<?php echo URL.'home/page/admin/histori'; ?>"><button type="button" class="btn btn-default">Histori Jual</button></a>
                  <a href="<?php echo URL.'home/page/admin/barang'; ?>"><button type="button" class="btn btn-default">Barang</button></a>
                  <a href="<?php echo URL.'home/page/admin/tambah'; ?>"><button type="button" class="btn btn-default">Tambah</button></a>
                  <a href="<?php echo URL.'home/page/admin/cari'; ?>"><button type="button" class="btn btn-default">Cari Pelanggan</button></a>
              </div>
              
              <br><hr>
            
              <p style="color:black">
              <?php switch($this->uri->segment(4)){ 
    
        
        case 'tambah' :
            $data['total'] = count($this->model_user->selectSemuaBarang()->result());
            $this->load->view('admin/tambah', $data);
            break;
        
        case 'barang' :
            $page = $this->uri->segment(5);
            
            $config['base_url'] = URL.'home/page/index/barang';
            $config['first_link'] = 'Awal ';
            $config['last_link'] = ' Akhir';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt';
            $config['cur_tag_open'] = '<b><i><u>';
            $config['cur_tag_close'] = '</u></i></b>';
            $config['total_rows'] = count($this->model_user->selectSemuaBarang()->result());
            $config['per_page'] = 10;


            $this->pagination->initialize($config);
            $data['result'] = $this->model_user->pagination($config['per_page'], $page);
            $data['page'] = $this->pagination->create_links();
            $this->load->view('admin/barang', $data);
            break;
        
        case 'edit' :
            $id = $this->uri->segment(5);
            $data['edit'] = $this->model_user->cariBarang($id)->result();
            $this->load->view('admin/edit', $data);
            break;
        
        case 'cari' :
            $this->load->view('admin/cari');
            break;
            
        case 'hapus' :
            $page = $this->uri->segment(4);
            $id= $this->uri->segment(5);
            $this->model_user->hapusBarang($id);
            echo 'Berhasil Di Hapus!';
            echo '<p style="color:black;"><a href="'.URL.'home/page/admin/barang/"><span class="glyphicon glyphicon-arrow-left"></span></a></p>';
            break;
        
        case 'histori' :
            $page = $this->uri->segment(5);
            
            $config['base_url'] = URL.'home/page/admin/histori';
            $config['first_link'] = 'Awal ';
            $config['last_link'] = ' Akhir';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt';
            $config['cur_tag_open'] = '<b><i><u>';
            $config['cur_tag_close'] = '</u></i></b>';
            $config['total_rows'] = count($this->model_user->historiBeli());
            $config['per_page'] = 10;


            $this->pagination->initialize($config);
            $data['result'] = $this->model_user->pageHistori($config['per_page'], $page);
            $data['page'] = $this->pagination->create_links();
            $this->load->view('admin/histori',$data);
            break;
            
        default:
            $page = $this->uri->segment(5);
            
            $config['base_url'] = URL.'home/page/admin/listuser';
            $config['first_link'] = 'Awal ';
            $config['last_link'] = ' Akhir';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt';
            $config['cur_tag_open'] = '<b><i><u>';
            $config['cur_tag_close'] = '</u></i></b>';
            $config['total_rows'] = count($this->model_user->ambilPembeli());
            $config['per_page'] = 10;


            $this->pagination->initialize($config);
            $data['result'] = $this->model_user->pageAmbil($config['per_page'], $page);
            $data['page'] = $this->pagination->create_links();
            $this->load->view('admin/listbeli',$data);
            break;
        }
            ?>
              
              
              </p>
            
          </div>
        </div>
    </div>


    
</div>
<?php break;
        
    default:
    echo 'anda belum login';
}
?>
<hr class="tebal"/>


<?php $this->load->view('modal'); ?>