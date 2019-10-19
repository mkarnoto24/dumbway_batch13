<?php

Class Produk extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Main_model','main');
    }
    
    function index(){
        $query = "SELECT p.id,p.name as nm_produk,p.stok,p.deskripsi,c.name as kategori FROM products as p join categories as c ON
                  p.category_id=c.id";
        $data['produk'] = $this->main->show_by_query($query)->result_array();
        $this->load->view('produk/tampil_produk',$data);
    }
    
    function tampil_kategori_produk()
    {
        $this->main->set_table('categories');
        $this->main->get_table();
        
        return $this->main->show_data();
    }
    
    function tambah_data(){
        $data['kategori'] = $this->tampil_kategori_produk()->result_array();
        $this->load->view('produk/tambah_produk',$data);
    }
    
    function simpan_produk()
    {
        $this->main->set_table('products');
        $this->main->get_table();
        $nm_produk = $this->input->post('nm_produk');
        $stok = $this->input->post('stok');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $data = array(
            'name'=>$nm_produk,
            'stok'=>$stok,
            'deskripsi'=>$deskripsi,
            'category_id'=>$kategori
        );
        
        
        $this->main->insert_data($data);
        redirect('produk');
    }
    
    function edit()
    {
        $query = "SELECT p.id,p.name as nm_produk,p.stok,p.deskripsi,c.name as kategori FROM products as p join categories as c ON
                  p.category_id=c.id WHERE p.id=".$this->uri->segment(3);
        $data['produk']= $this->main->show_by_query($query)->row_array();
        $data['kategori'] = $this->tampil_kategori_produk()->result_array();
        $this->load->view('produk/update_produk',$data);
    }
    
    function update_produk()
    {
        $this->main->set_table('products');
        $this->main->get_table();
        $this->main->set_pk('id');
        $this->main->get_pk();
        $nm_produk = $this->input->post('nm_produk');
        $stok = $this->input->post('stok');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $id = $this->input->post('id_produk');
        $data = array(
            'name'=>$nm_produk,
            'stok'=>$stok,
            'deskripsi'=>$deskripsi,
            'category_id'=>$kategori
        );
        
        
        $this->main->update_data($data,$id);
        redirect('produk');
    }
    
    function hapus()
    {
        $this->main->set_table('products');
        $this->main->get_table();
        $this->main->set_pk('id');
        $this->main->get_pk();
        $id = $this->uri->segment(3);
        $this->main->delete_data($id);
        redirect('produk');
    }
    
}
