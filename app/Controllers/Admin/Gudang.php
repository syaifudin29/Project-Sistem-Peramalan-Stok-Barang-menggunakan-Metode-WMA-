<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Gudang extends BaseController
{
    public function index()
    {
    	$data = [
    			'menu' => 'gudang',
    			'gudang' => $this->gudangModel->findAll()
    			];
        return view('admin/gudang', $data);
    }

    public function tambah(){

    	$data = ['nm_gudang' => $this->request->getVar('gudang')
    			];
    	$cek = $this->gudangModel->save($data);
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
    	$cek = $this->gudangModel->delete($id);
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

    	$data = ['nm_gudang' => $this->request->getVar('gudang')
    			];
    	$cek = $this->gudangModel->update($this->request->getVar('id_gudang'), $data);
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
