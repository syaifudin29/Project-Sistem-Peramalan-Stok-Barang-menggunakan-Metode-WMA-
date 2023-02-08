<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    public function index()
    {
    	$data = [
    			'menu' => 'laporan'
    			];
        return view('admin/laporan', $data);
    }

    public function report(){
        $this->response->setContentType('pdf');

    	$ket = $this->request->getVar('barang');
        $awal = $this->request->getVar('awal');
        $akhir = $this->request->getVar('akhir');
       
       if ($ket == '1') {
    
        $keterangan = "masuk";
        $where = "tgl_msk BETWEEN '".$awal."' AND '".$akhir."'";
        $barang = $this->bmasukModel->select('brg_msk.*, barang.nm_barang,barang.harga, tgl_msk as tgl, jml_msk as jml')->join('barang', 'barang.id_barang=brg_msk.id_barang')->where($where)->findAll();
       }else{
          
        $keterangan = "keluar";
         $where = "tgl_klr BETWEEN '".$awal."' AND '".$akhir."'";
         $barang = $this->bkeluarModel->select('brg_klr.*, barang.nm_barang,barang.harga, tgl_klr as tgl, jml_klr as jml')->join('barang', 'barang.id_barang=brg_klr.id_barang')->where($where)->findAll();
       }

   
        $data = [
    			'menu' => 'laporan',
                'barang' => $barang,
                'tanggal' => date('d M Y', strtotime($awal))." - ".date('d M Y', strtotime($akhir)),
                'ket' => $keterangan
    			];
       
    	view('admin/report', $data);
    	$dompdf = new Dompdf();
    	$html = view('admin/report', $data);
    	$dompdf->loadHtml($html);
    	$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream('data_laporan.pdf', array(
			"Attachment" => false
		));
    }
}
