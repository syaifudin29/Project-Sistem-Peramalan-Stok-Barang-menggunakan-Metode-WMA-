<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class BarangKeluar extends BaseController
{
    public function index()
    {
        if (session()->get('role') == 1) {
            $barangklr = $this->bkeluarModel->join('barang', 'brg_klr.id_barang = barang.id_barang')->join('user', 'brg_klr.id_user = user.id_user')->orderBy('id_brgklr', 'desc')->findAll();
        }else{
            $barangklr = $this->bkeluarModel->join('barang', 'brg_klr.id_barang = barang.id_barang')->join('user', 'brg_klr.id_user = user.id_user')->where('brg_klr.id_user', $this->id_user)->orderBy('id_brgklr', 'desc')->findAll();
        }
        $data = [
                'menu' => 'brgklr',
                'barangkeluar' =>  $barangklr,
                'barang' => $this->barangModel->join('satuan', 'satuan.id_satuan = barang.id_satuan')->where('barang.is_delete', '0')->findAll(),
                'barangjml' => count($this->bkeluarModel->findAll()),
                ];
        return view('admin/brg_klr', $data);
    }

    public function tambah()
    {
        $barang = $this->barangModel->where('id_barang', $this->request->getVar('barang'))->findAll();
        
        if ($barang[0]['stok'] >= $this->request->getVar('jml_klr')) {
            echo "bisa";

            $data = [
                    'id_brgklr' => $this->request->getVar('notransaksi'),
                    'tgl_klr' => $this->request->getVar('tgl'),
                    'lokasi' => $this->request->getVar('lokasi'),
                    'id_barang' => $this->request->getVar('barang'),
                    'jml_klr' => $this->request->getVar('jml_klr'),
                    'id_user' => $this->id_user
                    ];
            $this->bkeluarModel->save($data);
            //update barang stok
            $id_barang = $this->request->getVar('barang');
            $stok = $this->barangModel->where('id_barang', $id_barang )->findAll();
            $jmlstok = $stok[0]['stok']-$this->request->getVar('jml_klr');
            $cek = $this->barangModel->update($id_barang, ['stok' => $jmlstok ] );
            return $this->umumModel->notif($cek, 'disimpan', 'barangkeluar');
        }else{
             $data= ['msg' => 2, 'psn' => 'Stok barang tidak mencukupi'];
             session()->setFlashdata($data);
             return redirect()->to('/barangkeluar');
        }
    }

    public function hapus($id){
        $stok = $this->bkeluarModel->join('barang', 'barang.id_barang=brg_klr.id_barang')->where('id_brgklr', $id)->findAll();
        $jmlstok = $stok[0]['stok']+$stok[0]['jml_klr'];
        $this->barangModel->update($stok[0]['id_barang'], ['stok' => $jmlstok ] );
        $cek = $this->bkeluarModel->delete($id);
        return $this->umumModel->notif($cek, 'disimpan', 'barangkeluar');
    }
}
