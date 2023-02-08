<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Dashboard extends BaseController
{

    public function index()
    {
        $stok = 0;
        $jumlah = 0;
        $barang = $this->barangModel->findAll();
        foreach ($barang as $key) {
            $stok = $stok+$key['stok'];
            $jumlah = $jumlah+($key['stok']*$key['harga']);
        }
        $data = [
                'menu' => 'dashboard',
                'bmasuk' => $this->bmasukModel->select('sum(jml_msk) as jumlah')->findAll(),
                'bkeluar' => $this->bkeluarModel->select('sum(jml_klr) as jumlah')->findAll(),
                'stok' => $stok,
                'suplier' => count($this->suplierModel->where('is_delete', '0')->findAll())
                ];
        return view('admin/dashboard', $data);
    }
}
