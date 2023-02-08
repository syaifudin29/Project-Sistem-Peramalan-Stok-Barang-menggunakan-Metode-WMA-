<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
    public function index()
    {
        $data = [
                'menu'      => 'inventory',
                'barang'    => $this->barangModel->join('satuan', 'satuan.id_satuan=barang.id_satuan')->join('jenis', 'jenis.id_jenis=barang.id_jenis')->where('barang.is_delete', '0')->findAll(),
                'barangjml' => count($this->barangModel->findAll()),
                'jenis'     => $this->jenisModel->where('is_delete', '0')->findAll(),
                'satuan'        => $this->satuanModel->where('is_delete', '0')->findAll(),
                ];
        return view('admin/inventory', $data);
    }

    public function tambah(){

        $data = ['id_barang' => $this->request->getVar('id_barang'),
                 'nm_barang' => $this->request->getVar('nama'),
                 'stok' => 0,
                 'harga' => $this->request->getVar('harga'),
                 'id_jenis' => $this->request->getVar('jenis'),
                 'id_satuan' => $this->request->getVar('satuan'),
                 'is_delete' => '0',
                ];

        $cek = $this->barangModel->save($data);
        return $this->umumModel->notif($cek, 'disimpan', 'inventory');

    }

    public function edit(){

        $data = [
         'nm_barang' => $this->request->getVar('nama'),
         'harga' => $this->request->getVar('harga'),
         'id_jenis' => $this->request->getVar('jenis'),
         'id_satuan' => $this->request->getVar('satuan'),
        ];

        $cek = $this->barangModel->update($this->request->getVar('id_barang'), $data);
        return $this->umumModel->notif($cek, 'disimpan', 'inventory');
    }

     public function ubah($id){
        $data = [
         'menu' => 'inventory',
         'barang'   => $this->barangModel->join('satuan', 'satuan.id_satuan=barang.id_satuan')->join('jenis', 'jenis.id_jenis=barang.id_jenis')->where('id_barang', $id)->findAll(),
            'jenis'     => $this->jenisModel->where('is_delete', '0')->findAll(),
            'satuan'        => $this->satuanModel->where('is_delete', '0')->findAll(),
          ];
        return view('admin/inventory_edit', $data);
    }

     public function hapus($id){
        $cek = $this->barangModel->update($id, ['is_delete' => '1']);
        return $this->umumModel->notif($cek, 'dihapus', 'inventory');
    }


        
}
