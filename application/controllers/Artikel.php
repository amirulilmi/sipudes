<?php

class Artikel extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_Artikel');
		no_access();
		levelsuper();
	}
	public function index()
	{
		$data=array(
			"title"=>'Artikel',
			"menu"=>getmenu(),
			"all"=>$this->db->get('artikel')->result(),
			"aktif"=>"artikel",
			"content"=>"user/artikel.php",
		);
		$this->breadcrumb->append_crumb('User', site_url('user'));
		$this->load->view('admin/template',$data);
	}

	public function get()
    {
        $draw = intval($this->input->get("draw"));
        $query = $this->M_Artikel->getArtikelFix();
        $data = [];

        foreach ($query as $key => $r) {
            $data[] = array(
                'no' => $key + 1,
                'gambar' => '<img style="width:100px" src="data:image/jpg;base64, ' . $r['gambar'] . '" class="img-circle2">',
                'kategori' => $r['kategori'],
                'judul' => $r['judul'],
                'isi' => $r['isi'],
                // 'nama_kategori' => $r['nama_kategori'],
                'opsi' => '<a style="margin-bottom:3px;padding:0px;margin:0px" href="#" onclick="byid(' . $r['id'] . ')" class="badge"><img src="' . base_url() . 'assets/images/edit.svg"></a>
                <a href="#"  onclick="deleted(' . $r['id'] . ')" class=" "><img src=" ' . base_url() . 'assets/images/delete.svg"></a>
                '
            );
        }
        $result = array(
            "draw" => $draw,
            "data" => $data
        );

        echo json_encode($result);
    }

	public function add()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => strip_tags($this->upload->display_errors()));
			$message = [
				'status' => 'pict',
				'error' => $error['error'],
			];
		}
		else
		{
				date_default_timezone_set('Asia/jakarta');

				$avatar = $this->upload->data();

                $name = $avatar['file_name'];
                $pathinfo = $avatar['full_path'];
                $filecontent = file_get_contents($pathinfo);
                $base64 = rtrim(base64_encode(($filecontent)));


                // $param['avatar'] = $base64;
                $cek = $this->M_Artikel->add($base64);

                if ($cek > 0) {
                    $message['status'] = 'success';
                } else {
                    $message['status'] = 'failed';
                }

                $fileName = glob("uploads/$name");
                foreach ($fileName as $file) {
                    unlink($file);
                }
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
		
	}

	public function byid($id)
    {
        $data = array(
            "artikel" => $this->M_Artikel->getArtikel($id),
        );
		// print_r($data);exit;
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

	public function edit()
	{
		$id = $this->input->post('id_artikel');
		$this->form_validation->set_rules('judul', 'Judul Artikel', 'required');
		$this->form_validation->set_rules('isi', 'Isi Artikel', 'required');
		if($this->form_validation->run()==FALSE){
			$message['status'] ='failed';
		}else{
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'svg|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile2')) {
				
                $base64 = $this->input->post('userfile_hidden');

                $cek = $this->M_Artikel->proses_edit($base64, $id);
				
                if ($cek > 0) {
                    $message['status'] = 'success';
                } else {
                    $message['status'] = 'failed';
                }
            } else {
				// print_r('hai');exit;
                $gambar = $this->upload->data();

                $name = $gambar['file_name'];
                $pathinfo = $gambar['full_path'];
                $filecontent = file_get_contents($pathinfo);
                $base64 = rtrim(base64_encode(($filecontent)));
				
                $cek = $this->M_Artikel->proses_edit($base64, $id);

                if ($cek > 0) {
                    $message['status'] = 'success';
                } else {
                    $message['status'] = 'failed';
                }

                $fileName = glob("uploads/$name");
                foreach ($fileName as $file) {
                    unlink($file);
                }
            }
			// $data=array(
			// 	"Artikel"=>$_POST['klasifikasi'],
			// );
			// $this->db->where('id', $_POST['id']);
			// $this->db->update('Artikel',$data);
			// $this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			// redirect('klasifikasi');
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}

	public function delete($id)
	{
		if($id==""){
			$message['status'] = 'failed';
		}else{
			$cek = $this->M_Artikel->delete($id);

			if ($cek > 0) {
				$message['status'] = 'success';
			} else {
				$message['status'] = 'failed';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($message));
	}
}
