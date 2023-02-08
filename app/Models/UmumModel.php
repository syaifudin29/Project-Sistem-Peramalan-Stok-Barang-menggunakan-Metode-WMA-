<?php

namespace App\Models;

use CodeIgniter\Model;

class UmumModel extends Model
{

   public function notif($cek, $psn1, $to){
   	if ($cek) {
		 $data= ['msg' => 1, 'psn' => 'Data berhasil '.$psn1];
		 session()->setFlashdata($data);
		 return redirect()->to('/'.$to);
	}else{
       	 $data= ['msg' => 2, 'psn' => 'Data gagal '.$psn1];
         session()->setFlashdata($data);
         return redirect()->to('/'.$to);
    }
   }
}