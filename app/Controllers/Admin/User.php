<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
    	$data = [
    			'menu' => 'user',
    			'user' => $this->userModel->where('is_delete', '0')->findAll()
    			];
        return view('admin/user', $data);
    }

     public function tambah()
    {
    	$dataBerkas = $this->request->getFile('foto');
    	$randomName = $dataBerkas->getRandomName();
    	$dataBerkas->move('dist/img/photo', $randomName);

    	$data = [
    			'nama' => $this->request->getVar('nama'),
    			'email' => $this->request->getVar('email'),
    			'no_telp' => $this->request->getVar('no_telp'),
    			'username' => $this->request->getVar('username'),
    			'password' => $this->request->getVar('password'),
    			'gambar' => $randomName,
    			'role' => $this->request->getVar('role')
    			];

		$cek = $this->userModel->save($data);
        return $this->umumModel->notif($cek, 'disimpan', 'usermanagement');
    }

    public function hapus($id){
    	$cek = $this->userModel->update($id, ['is_delete' => '1']);
    	return $this->umumModel->notif($cek, 'disimpan', 'usermanagement');
    }
}
