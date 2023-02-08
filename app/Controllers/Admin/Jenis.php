<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Jenis extends BaseController
{
    public function index()
    {
    	$data = [
    			'menu' => 'jenis',
    			'jenis' => $this->jenisModel->where('is_delete', '0')->findAll()
    			];
        return view('admin/jenis', $data);
    }

    public function tambah(){

    	$data = ['nm_jenis' => $this->request->getVar('jenis')
    			];
    	$cek = $this->jenisModel->save($data);
    	if ($cek) {
    		 $data= ['msg' => 1, 'psn' => 'Data berhasil disimpan'];
    		 $this->session->setFlashdata($data);
    		 return redirect()->back();
    	}else{
        $data= ['msg' => 2, 'psn' => 'Data gagal disimpan'];
         $this->session->setFlashdata($data);
         return redirect()->back();
      }
  	}

  	public function hapus($id){
    	$cek = $this->jenisModel->update($id, ['is_delete' => '1']);
    	if ($cek) {
    		 $data= ['msg' => 1, 'psn' => 'Data berhasil dihapus'];
    		 $this->session->setFlashdata($data);
    		 return redirect()->back();
    	}else{
        $data= ['msg' => 2, 'psn' => 'Data gagal dihapus'];
         $this->session->setFlashdata($data);
         return redirect()->back();
      }
  	}

  	public function edit(){

    	$data = ['nm_jenis' => $this->request->getVar('jenis')
    			];
    	$cek = $this->jenisModel->update($this->request->getVar('id_jenis'), $data);
    	if ($cek) {
    		 $data= ['msg' => 1, 'psn' => 'Data berhasil disimpan'];
    		 $this->session->setFlashdata($data);
    		 return redirect()->back();
    	}else{
        $data= ['msg' => 2, 'psn' => 'Data gagal disimpan'];
         $this->session->setFlashdata($data);
         return redirect()->back();
      }
  	}
}
