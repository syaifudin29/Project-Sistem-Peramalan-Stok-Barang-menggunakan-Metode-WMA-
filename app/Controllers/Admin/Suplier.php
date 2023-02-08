<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Suplier extends BaseController
{
    public function index()
    {

    	$data = [
    			'menu' => 'suplier',
    			'suplier' => $this->suplierModel->where('is_delete', '0')->findAll()
    			];
        return view('admin/suplier', $data);

    }

    public function tambah(){
  	
    	$data = ['suplier' => $this->request->getVar('suplier'),
    			 'nama' => $this->request->getVar('nama'),
    			 'no_telp' => $this->request->getVar('notelp'),
    			 'alamat' => $this->request->getVar('alamat'),
    			];
    	$cek = $this->suplierModel->save($data);
    	if ($cek) {
    		 $data= ['msg' => 1, 'psn' => 'Data berhasil disimpan'];
    		 $this->session->setFlashdata($data);
    		 return redirect()->back();
    	}else{
        $data= ['msg' => 2, 'psn' => 'Data gagal disimpan'];
         $this->session->setFlashdata($data);
      }
    }

    public function hapus($id){
       $cek = $this->suplierModel->update($id, ['is_delete' => '1']);
       if ($cek) {
           $data= ['msg' => 1, 'psn' => 'Data berhasil dihapus'];
           $this->session->setFlashdata($data);
           return redirect()->to('/suplier');
        }else{
          $data= ['msg' => 2, 'psn' => 'Data gagal dihapus'];
           $this->session->setFlashdata($data);
           return redirect()->to('/suplier');
        }
    }

    public function edit($id){
       $data = [
          'menu' => 'suplier',
          'suplier' => $this->suplierModel->where('id_suplier', $id)->findAll()
          ];
        return view('admin/suplier_edit', $data);
    }

    public function editproses(){
      $id = $this->request->getVar('id_suplier');
     
     $data = ['suplier' => $this->request->getVar('suplier'),
              'nama' => $this->request->getVar('nama'),
              'no_telp' => $this->request->getVar('notelp'),
              'alamat' => $this->request->getVar('alamat')
            ];
      $cek = $this->suplierModel->update($id, $data);
      if ($cek) {
         $data= ['msg' => 1, 'psn' => 'Data berhasil disimpan'];
         $this->session->setFlashdata($data);
         return redirect()->to('/suplier');
      }else{
        $data= ['msg' => 2, 'psn' => 'Data gagal disimpan'];
         $this->session->setFlashdata($data);
         return redirect()->to('/suplier');
      }
    }
}
