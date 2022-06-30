<?php
class Mahasiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		$this->load->model('m_prodi');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_fakultas');
	}

	function index(){
		$data['title'] = "Mahasiswa";
		$data['data']=$this->m_mahasiswa->get_all_mhs();
		$data['fakultas']=$this->m_fakultas->get_all_fakultas();
		$this->template->display('v_mahasiswa', $data);
	}

	
	function add(){
		$data['title'] = "Tambah Mahasiswa";
		$data['fakultas'] = $this->m_fakultas->view();
		$this->template->display('v_mahasiswa_add', $data);
	}

	function edit($id){
		$where = array('id_mahasiswa' => $id);
		$data['mahasiswa'] = $this->m_mahasiswa->edit_mahasiswa($where,'mahasiswa')->row_array();
		// $data['fakultas']=$this->m_fakultas->get_all_fakultas();
		$data['fakultas'] = $this->m_fakultas->view();
		$mhs =  $this->m_mahasiswa->getMahasiswa($where,'mahasiswa')->row_array();
		$prodi = $this->db->get_where('prodi', array('kode_prodi' =>  $mhs['kode_prodi']))->row_array();
		$data['prodi'] = $prodi;
		$data['getFak'] = $this->db->get_where('fakultas', array('kode_fakultas' =>  $prodi['kode_fakultas']))->row_array();
	
		$this->template->display('v_mahasiswa_edit', $data);

	}

	function detail($id){
		$data['title'] = 'Detail Mahasiswa';
		$where = array('id_mahasiswa' => $id);
		$data['mahasiswa'] = $this->m_mahasiswa->getMahasiswa($where,'mahasiswa')->row_array();
		$mhs =  $this->m_mahasiswa->getMahasiswa($where,'mahasiswa')->row_array();
		$prodi = $this->db->get_where('prodi', array('kode_prodi' =>  $mhs['kode_prodi']))->row_array();
		$data['prodi'] = $prodi;
		$data['fakultas'] = $this->db->get_where('fakultas', array('kode_fakultas' =>  $prodi['kode_fakultas']))->row_array();
		$this->template->display('v_mahasiswa_detail', $data);
	}
 
    function get_prodi(){
        $kode_fakultas=$this->input->post('kode_fakultas');
        $data=$this->m_prodi->get_prodiByKodeFakultas($kode_fakultas);
        echo json_encode($data);
    }

	public function listProdi(){
		// Ambil data ID Provinsi yang dikirim via ajax post
		$kode_fakultas = $this->input->post('kode_fakultas');
		$prodi = $this->m_prodi->viewByKodeFakultas($kode_fakultas);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih</option>";
		
		foreach($prodi as $data){
		  $lists .= "<option value='".$data->kode_prodi."'>".$data->nama_prodi."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_prodi'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	  }

	function create(){

		{
			$config['upload_path']          = './images/mahasiswa/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('upload', $error);
			}else{
				$_data = array('upload_data' => $this->upload->data());
				$nama_mahasiswa=$this->input->post('nama_mahasiswa');
				$nim_mahasiswa=$this->input->post('nim_mahasiswa');	
				$kode_prodi=$this->input->post('kode_prodi');
				$tanggal_lahir = $this->input->post('tanggal_lahir');
				$no_hp = $this->input->post('no_hp');
				$alamat = $this->input->post('alamat');
				 $data = array(
					'nama_mahasiswa'=> $nama_mahasiswa,
					'nim_mahasiswa' => $nim_mahasiswa,
					'kode_prodi' => $kode_prodi,
					'tanggal_lahir' => $tanggal_lahir,
					'no_hp' => $no_hp,
					'alamat' => $alamat,
					'foto' => $_data['upload_data']['file_name']
					);
				$query = $this->db->insert('mahasiswa',$data);
				if($query){
					$this->session->set_flashdata('msgsuccess', 'Data Berhasil disimpan');
					redirect('mahasiswa');
				}else{
					$this->session->set_flashdata('msgerror', 'Gagal upload gambar');
					redirect('mahasiswa');
				}
			}
		}

		// $this->m_mahasiswa->saveMahasiswa($nama_mahasiswa,$nim_mahasiswa,$kode_prodi, $tanggal_lahir, $no_hp, $alamat, $foto);
		// $this->session->set_flashdata('msgsuccess', 'Data Berhasil disimpan');
		// redirect('mahasiswa');
	}

	function update(){
		$config['upload_path']          = './images/mahasiswa/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')){
				$nama_mahasiswa=$this->input->post('nama_mahasiswa');
				$nim_mahasiswa=$this->input->post('nim_mahasiswa');	
				$kode_prodi=$this->input->post('kode_prodi');
				$tanggal_lahir = $this->input->post('tanggal_lahir');
				$no_hp = $this->input->post('no_hp');
				$alamat = $this->input->post('alamat');
				// $data = array(
				// 	// 'id_mahasiswa'=> $this->input->post('id'),
				// 	'nama_mahasiswa'=> $nama_mahasiswa,
				// 	'nim_mahasiswa' => $nim_mahasiswa,
				// 	'kode_prodi' => $kode_prodi,
				// 	'tanggal_lahir' => $tanggal_lahir,
				// 	'no_hp' => $no_hp,
				// 	'alamat' => $alamat,
				// 	);
				// $query = $this->db->update('mahasiswa',$data);

				$this->m_mahasiswa->update(array(
					'nama_mahasiswa'=> $nama_mahasiswa,
					'nim_mahasiswa' => $nim_mahasiswa,
					'kode_prodi' => $kode_prodi,
					'tanggal_lahir' => $tanggal_lahir,
					'no_hp' => $no_hp,
					'alamat' => $alamat,
                    ), array('id_mahasiswa' => $this->input->post('id')
                        )
                );
				$this->session->set_flashdata('msgsuccess', 'Data Berhasil diUpdate');
				redirect('mahasiswa'); 
				
			}else{
				$_data = array('upload_data' => $this->upload->data());
				$id = $this->input->post('id');
				$nama_mahasiswa=$this->input->post('nama_mahasiswa');
				$nim_mahasiswa=$this->input->post('nim_mahasiswa');	
				$kode_prodi=$this->input->post('kode_prodi');
				$tanggal_lahir = $this->input->post('tanggal_lahir');
				$no_hp = $this->input->post('no_hp');
				$alamat = $this->input->post('alamat');
					
				$_id = $this->db->get_where('mahasiswa',['id_mahasiswa' => $id])->row_array();
				unlink("images/mahasiswa/".$_id['foto']);
				$this->m_mahasiswa->update(array(
					'nama_mahasiswa'=> $nama_mahasiswa,
					'nim_mahasiswa' => $nim_mahasiswa,
					'kode_prodi' => $kode_prodi,
					'tanggal_lahir' => $tanggal_lahir,
					'no_hp' => $no_hp,
					'alamat' => $alamat,
					'foto' => $_data['upload_data']['file_name']
                    ), array('id_mahasiswa' => $id
                        )
                );
					$this->session->set_flashdata('msgsuccess', 'Foto dan Data Berhasil diUpdate');
					redirect('mahasiswa');
			}
		// $this->m_prodi->update($id,$kode_prodi,$nama_prodi, $kode_fakultas);
		echo $this->session->set_flashdata('msgsuccess','Data Berhasil diupdate!');
		redirect('prodi');
	
	}

	function delete(){
		$id=$this->input->post('id');
		$_id = $this->db->get_where('mahasiswa',['id_mahasiswa' => $id])->row_array();
		$query = $this->db->delete('mahasiswa',['id_mahasiswa'=>$id]);
		if($query){
			unlink("images/mahasiswa/".$_id['foto']);
		}
		$data = $this->m_mahasiswa->deleteMhs($id);
		echo json_encode($data);
	}



	 
}
