<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_backend');
		$this->load->library('aunt_login');
		// $this->load->library('pdf');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'username','required',
				array('required' => '%s Harus Diisi'));
		$this->form_validation->set_rules('password', 'password','required',
				array('required' => '%s Harus Diisi'));

		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->aunt_login->login($username,$password);
		}

		$this->load->view('backend/login');
	}

	public function dashboard()
	{				
			$individu = $this->db->count_all('individu');
			$rombongan = $this->db->count_all('rombongan');

			$data = array('title' => 'Dashboard' ,
						  'individu' => $individu,
						  'rombongan' => $rombongan,
						  'isi'	  => 'backend/dashboard' );

			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	public function hapus_user($id_user)
	{
			$user = $this->model_backend->detail_user($id_user);
			$data = array('id_user' => $id_user);
			$this->model_backend->hapus_user($data);
			$this->session->set_flashdata('success', 'Data berhasil Dihapus');
			redirect(base_url('backend/pengaturan'),'refresh');	
	}

	public function laporan()
	{

		$lokasi = $this->model_frontend->index_lokasi();

		$data = array('title' => 'Laporan' ,
					  'lokasi' => $lokasi,
					  'isi'	  => 'backend/laporan/index'
					   );
		$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	public function list_rombongan()
	{
		$list_rombongan = $this->model_backend->list_rombongan();

		$data = array('title' => 'List Rombongan' ,
					  'rombongan'  => $list_rombongan,		  
					  'isi'	  => 'backend/rombongan/index' );

		$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	public function hapus_rombongan($id_rombongan)
	{
			$rombongan = $this->model_backend->detail_rombongan($id_rombongan);
			$data = array('id_rombongan' => $id_rombongan);
			$this->model_backend->hapus_rombongan($data);
			$this->session->set_flashdata('success', 'Data berhasil Dihapus');
			redirect(base_url('backend/list_rombongan'),'refresh');	
	}

	public function list_individu()
	{
		$list_individu = $this->model_backend->list_individu();

		$data = array('title' => 'List Individu' ,
					  'individu'  => $list_individu,
					  'isi'	  => 'backend/individu/index' );



		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function hapus_individu($id_individu)
	{
			$individu = $this->model_backend->detail_individu($id_individu);
			$data = array('id_individu' => $id_individu);
			$this->model_backend->hapus_individu($data);
			$this->session->set_flashdata('success', 'Data berhasil Dihapus');
			redirect(base_url('backend/list_individu'),'refresh');	
	}

	public function kawasan($id_wilayah)
	{
		$kawasan = $this->model_backend->wilayah($id_wilayah);
		$data = array('title' => 'Kawasan',
					  'kawasan' => $kawasan, 
					  'isi' => 'backend/individu/wilayah' );
		$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_bandung()
	{
			$wilayah = $this->model_backend->lok_bandung();
			$data = array('title' => 'Kawasan Bandung' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_jakarta()
	{
			$wilayah = $this->model_backend->lok_jakarta();
			$data = array('title' => 'Kawasan jakarta' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_bogor()
	{
			$wilayah = $this->model_backend->lok_bogor();
			$data = array('title' => 'Kawasan bogor' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_cibinong()
	{
			$wilayah = $this->model_backend->lok_cibinong();
			$data = array('title' => 'Kawasan cibinong' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	function kawasan_cibinong_zoologi()
	{
			$wilayah = $this->model_backend->lok_cibinong_zoologi();
			$data = array('title' => 'Kawasan cibinong zoologi' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	function kawasan_cibinong_bootani()
	{
			$wilayah = $this->model_backend->lok_cibinong_bootani();
			$data = array('title' => 'Kawasan cibinong bootani' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	function kawasan_cibinong_bioteknologi()
	{
			$wilayah = $this->model_backend->lok_cibinong_bioteknologi();
			$data = array('title' => 'Kawasan cibinong bioteknologi' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	function kawasan_cibinong_limnologi()
	{
			$wilayah = $this->model_backend->lok_cibinong_limnologi();
			$data = array('title' => 'Kawasan cibinong limnologi' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_cibinong_biomaterial()
	{
			$wilayah = $this->model_backend->lok_cibinong_biomaterial();
			$data = array('title' => 'Kawasan cibinong biomaterial' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_serpong()
	{
			$wilayah = $this->model_backend->lok_serpong();
			$data = array('title' => 'Kawasan serpong' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/individu/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_rombongan_bandung()
	{
			$wilayah = $this->model_backend->lok_rombongan_bandung();
			$data = array('title' => 'Kawasan Bandung' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_rombongan_jakarta()
	{
			$wilayah = $this->model_backend->lok_rombongan_jakarta();
			$data = array('title' => 'Kawasan jakarta' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_rombongan_bogor()
	{
			$wilayah = $this->model_backend->lok_rombongan_bogor();
			$data = array('title' => 'Kawasan bogor' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_rombongan_cibinong()
	{
			$wilayah = $this->model_backend->lok_rombongan_cibinong();
			$data = array('title' => 'Kawasan cibinong' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	function kawasan_rombongan_cibinong_zoologi()
	{
			$wilayah = $this->model_backend->lok_rombongan_cibinong_zoologi();
			$data = array('title' => 'Kawasan cibinong zoologi' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	function kawasan_rombongan_cibinong_bootani()
	{
			$wilayah = $this->model_backend->lok_rombongan_cibinong_bootani();
			$data = array('title' => 'Kawasan cibinong bootani' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	function kawasan_rombongan_cibinong_bioteknologi()
	{
			$wilayah = $this->model_backend->lok_rombongan_cibinong_bioteknologi();
			$data = array('title' => 'Kawasan cibinong bioteknologi' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	function kawasan_rombongan_cibinong_limnologi()
	{
			$wilayah = $this->model_backend->lok_rombongan_cibinong_limnologi();
			$data = array('title' => 'Kawasan cibinong limnologi' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_rombongan_cibinong_biomaterial()
	{
			$wilayah = $this->model_backend->lok_rombongan_cibinong_biomaterial();
			$data = array('title' => 'Kawasan cibinong biomaterial' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function kawasan_rombongan_serpong()
	{
			$wilayah = $this->model_backend->lok_rombongan_serpong();
			$data = array('title' => 'Kawasan serpong' ,
						  'wilayah' => $wilayah,
						  'isi'	=> 'backend/rombongan/wilayah');
			$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	function keluar()
	{
		$this->aunt_login->logout();
	}

	public function laporan_pdf(){

    $data = array(
       		"dataku" => array(
            "nama" => "Petani Kode",
            "url" => "http://petanikode.com"
        )
    );

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporan-petanikode.pdf";
    $this->pdf->load_view('laporan_pdf', $data);

	}

	
	public function cari_kawasan_seluruh()
	{
		$cari = $this->model_backend->cari_data_seluruh();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_bandung()
	{
		$cari = $this->model_backend->cari_data_bandung();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_jakarta()
	{
		$cari = $this->model_backend->cari_data_jakarta();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_bogor()
	{
		$cari = $this->model_backend->cari_data_bogor();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_cibinong()
	{
		$cari = $this->model_backend->cari_data_cibinong();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_cibinong_zoologi()
	{
		$cari = $this->model_backend->cari_data_zoologi();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_cibinong_bootani()
	{
		$cari = $this->model_backend->cari_data_bootani();
		$data = array('title'=> 'Hasil Pencarian Seluruh Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_cibinong_bioteknologi()
	{
		$cari = $this->model_backend->cari_data_bioteknologi();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_cibinong_limnologi()
	{
		$cari = $this->model_backend->cari_data_limnologi();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);
	}


	public function cari_kawasan_cibinong_biomaterial()
	{
		$cari = $this->model_backend->cari_data_limnologi();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

		public function cari_kawasan_serpong()
	{
		$cari = $this->model_backend->cari_data_serpong();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/individu/hasil' ,
					  'individu' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	public function cari_kawasan_rombongan_seluruh()
	{
		$cari = $this->model_backend->cari_data_rombongan_seluruh();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_bandung()
	{
		$cari = $this->model_backend->cari_data_rombongan_bandung();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_jakarta()
	{
		$cari = $this->model_backend->cari_data_rombongan_jakarta();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_bogor()
	{
		$cari = $this->model_backend->cari_data_rombongan_bogor();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_cibinong()
	{
		$cari = $this->model_backend->cari_data_rombongan_cibinong();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_cibinong_zoologi()
	{
		$cari = $this->model_backend->cari_data_rombongan_zoologi();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_cibinong_bootani()
	{
		$cari = $this->model_backend->cari_data_rombongan_bootani();
		$data = array('title'=> 'Hasil Pencarian Seluruh Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_cibinong_bioteknologi()
	{
		$cari = $this->model_backend->cari_data_rombongan_bioteknologi();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_cibinong_limnologi()
	{
		$cari = $this->model_backend->cari_data_rombongan_limnologi();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

	public function cari_kawasan_rombongan_cibinong_biomaterial()
	{
		$cari = $this->model_backend->cari_data_rombongan_limnologi();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}

		public function cari_kawasan_rombongan_serpong()
	{
		$cari = $this->model_backend->cari_data_rombongan_serpong();
		$data = array('title'=> 'Hasil Pencarian Data',
					  'isi' => 'backend/rombongan/hasil' ,
					  'rombongan' => $cari );

		$this->load->view('backend/templates/wrapper', $data, FALSE);

	}


	public function report_filter()
	{
		$filterdata = $this->model_backend->report_filter();
		$lokasi = $this->model_frontend->index_lokasi();
		$data = array('title' =>  'Laporan', 
					  'filter' => $filterdata,
					  'lokasi' => $lokasi,
					  'isi'	  => 'backend/laporan/laporan_filter',
					   );
		$this->load->view('backend/templates/wrapper', $data, FALSE);	
	}

	public function pengaturan($id_user)
	{
		$setting = $this->model_backend->akun();


		$data = array(	'title' => 'Pengaturan',
						'akun' => $setting,
						'isi' => 'backend/pengaturan/index' , );

		$this->load->view('backend/templates/wrapper', $data, FALSE);
	}

	public function simpan_pengaturan($id_user)
	{
		
		$user = $this->model_backend->detail_user($id_user);
		$i = $this->input;
			$data = array(	
				'id_user'			=> $id_user,
				'nama_user'			=> $i->post('nama_user'),
				'username'			=> $i->post('username'),
		);
			$this->model_backend->edit_user($data);
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
			$this->session->set_userdata('nama_user',$i->post('nama_user'));
			$this->session->set_userdata('username',$i->post('username'));
			redirect(base_url('Backend/pengaturan/'.$this->session->userdata('id_user')),'refresh');	
	}

}

/* End of file backend.php */
/* Location: ./application/controllers/backend.php */