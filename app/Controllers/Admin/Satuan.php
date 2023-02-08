<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Satuan extends BaseController
{
    public function index()
    {
    	$data = [
    			'menu' => 'satuan',
    			'satuan' => $this->satuanModel->where('is_delete', '0')->findAll()
    			];
        return view('admin/satuan', $data);
    }

    public function tambah(){

    	$data = ['nm_satuan' => $this->request->getVar('satuan')
    			];
    	$cek = $this->satuanModel->save($data);
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
    	$cek = $this->satuanModel->update($id, ['is_delete' => '1']);
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

    	$data = ['nm_satuan' => $this->request->getVar('satuan')
    			];
    	$cek = $this->satuanModel->update($this->request->getVar('id_satuan'), $data);
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
