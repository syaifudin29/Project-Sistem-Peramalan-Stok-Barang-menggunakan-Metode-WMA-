<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
    	$data = [
    			'menu' => 'profile',
    			'user' => $this->userModel->find($this->id_user)
    			];
        return view('admin/profile', $data);
    }

    public function editpass(){
    	$cekpass = $this->userModel->find($this->id_user);
    	if ($cekpass['password'] == $this->request->getVar('lama')) {
    		$data = [
    			'password' => $this->request->getVar('baru'),
    			];

			$cek = $this->userModel->update($this->id_user, $data);
        return $this->umumModel->notif($cek, 'disimpan', 'profile');
    	}else{
	    	 $data= ['msg' => 2, 'psn' => 'Maaf, Password yang lama salah'];
	         session()->setFlashdata($data);
	         return redirect()->to('/profile');
    	}
    	
    }

    public function edit(){
    	
    	if (empty($_FILES['foto']['name'])) {
    		$data = [
				'nama' => $this->request->getVar('nama'),
				'email' => $this->request->getVar('email'),
				'no_telp' => $this->request->getVar('no_telp'),
				'username' => $this->request->getVar('username'),
			];
			session()->set('nama', $this->request->getVar('nama'));
    	}else{
    		$dataBerkas = $this->request->getFile('foto');
    		$randomName = $dataBerkas->getRandomName();
    		$dataBerkas->move('dist/img/photo', $randomName);
    		$data = [
				'nama' => $this->request->getVar('nama'),
				'email' => $this->request->getVar('email'),
				'no_telp' => $this->request->getVar('no_telp'),
				'username' => $this->request->getVar('username'),
				'gambar' => $randomName,
			];
			session()->set('nama', $this->request->getVar('nama'));
			session()->set('gambar', $randomName);

    	}

		$cek = $this->userModel->update($this->id_user, $data);
        return $this->umumModel->notif($cek, 'disimpan', 'profile');
    }
}
