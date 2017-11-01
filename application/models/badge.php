<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class badge extends CI_Model {
    
    public function badge_pulsa()   {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('kategori', 'pulsa');
        
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    public function badge_paket()   {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('kategori', 'pd');
        
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    
    
    
}