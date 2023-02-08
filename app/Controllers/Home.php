<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function proses()
    {
        $user = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $cek1 = $this->userModel->where('username', $user)->where('is_delete', '0')->findAll();
        if (empty($cek1)) {
        	$data= ['msg' => 2, 'psn' => 'Maaf, Username salah'];
	         session()->setFlashdata($data);
	         return redirect()->to('/');
        }else{
        	$cek2 = $this->userModel->where('username', $user)->where('password', $password)->where('is_delete', '0')->find();
        	if (empty($cek2)) {
        		$data= ['msg' => 2, 'psn' => 'Maaf, Password salah'];
		        session()->setFlashdata($data);
		        return redirect()->to('/');
        	}else{
        		$newdata = [
				    'id_user'  => $cek2[0]['id_user'],
				    'nama'  => $cek2[0]['nama'],
				    'gambar'  => $cek2[0]['gambar'],
				    'role'  => $cek2[0]['role'],
				];

				session()->set($newdata);
		
        		return redirect()->to('/dashboard');
        	}
        }
     	
    }

    public function logout(){
    	session()->destroy();
    	return redirect()->to('/');
    }
}
