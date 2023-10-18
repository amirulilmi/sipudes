<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Artikel extends CI_Model {

    public function getArtikelFix()
    {
        return $this->db->get('artikel')->result_array();
    }

	public function add($base64)
	{
		$data = [
            'kategori' =>$this->input->post('kategori'), 
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'gambar' => $base64,
            'created_at' =>date('Y-m-d H:i:s'),    
			'created_by' => $this->session->userdata('id_penduduk'), 
        ];
        $this->db->insert('artikel', $data);
        return 1;
	}

    public function getArtikel($id){
        return $this->db->get_where('artikel', ['id' => $id])->row_array();
    }

    public function proses_edit($base64, $id){     
            $data=array(
                'kategori' =>$this->input->post('kategori'), 
				"judul"=>$this->input->post('judul'),
                "isi"=>$this->input->post('isi'),
                "gambar"=>$base64,
                'created_at' =>date('Y-m-d H:i:s'),    
                'created_by' => $this->session->userdata('id_penduduk'), 
			);
			$this->db->where('id', $id);
			$this->db->update('artikel',$data);
            return 1;
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('artikel');
        return 1;
    }

}

/* End of file M_klasifikasi.php */
/* Location: ./application/models/M_klasifikasi.php */