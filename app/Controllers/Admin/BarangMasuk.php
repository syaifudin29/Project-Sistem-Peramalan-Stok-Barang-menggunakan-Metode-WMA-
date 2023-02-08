<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class BarangMasuk extends BaseController
{
    public function index()
    {
        $data = [
                'menu' => 'brgmsk',
                'barangmasuk' => $this->bmasukModel->select('barang.*, brg_msk.*, suplier.*, user.nama as user')->join('barang', 'brg_msk.id_barang = barang.id_barang')->join('suplier', 'brg_msk.id_suplier = suplier.id_suplier')->join('user', 'brg_msk.id_user = user.id_user')->orderBy('id_brgmsk', 'desc')->findAll(),
                'barang' => $this->barangModel->join('satuan', 'satuan.id_satuan = barang.id_satuan')->where('barang.is_delete', '0')->findAll(),
                'barangjml' => count($this->bmasukModel->findAll()),
                'stok' => $this->barangModel->where('is_delete', '0')->findAll(),
                'suplier' => $this->suplierModel->where('is_delete', '0')->findAll()
                ];
        return view('admin/brg_msk', $data);
    }

    public function tambah()
    {
        $data = [
                'id_brgmsk' => $this->request->getVar('notransaksi'),
                'tgl_msk' => $this->request->getVar('tgl'),
                'id_suplier' => $this->request->getVar('suplier'),
                'id_barang' => $this->request->getVar('barang'),
                'jml_msk' => $this->request->getVar('jml_msk'),
                'id_user' => 1,
                ];
        $this->bmasukModel->save($data);

        //update barang stok
        $id_barang = $this->request->getVar('barang');
        $stok = $this->barangModel->where('id_barang', $id_barang )->findAll();
        $jmlstok = $stok[0]['stok']+$this->request->getVar('jml_msk');
        $cek = $this->barangModel->update($id_barang, ['stok' => $jmlstok ] );
        return $this->umumModel->notif($cek, 'disimpan', 'barangmasuk');
    }

    public function hapus($id){
        $stok = $this->bmasukModel->join('barang', 'barang.id_barang=brg_msk.id_barang')->where('id_brgmsk', $id)->findAll();
        $jmlstok = $stok[0]['stok']-$stok[0]['jml_msk'];
        $this->barangModel->update($stok[0]['id_barang'], ['stok' => $jmlstok ] );
        $cek = $this->bmasukModel->delete($id);
        return $this->umumModel->notif($cek, 'disimpan', 'barangmasuk');
    }
}
