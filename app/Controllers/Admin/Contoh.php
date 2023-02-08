<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Contoh extends BaseController
{

    public function index()
    {
    	//tinggal buat hasil prediksi dengan nilai error yang terendah dan yang ditampilkan wma tersebut.
    	
    	$tahun = 2022;
    	$bulan = 2;
    	$nm = "MFS023";


    	$periode = [3,4,5,6];
    	$pembagi = [6,10,15,21];
    	$tanggal = $tahun."-".$bulan."-01";
    	$tanggal1 = $tahun."-".$bulan."-01";
    	// $no=3;
        $cekdataku = $this->aktualModel->where('bulan <', $tanggal)->findAll();
        if (count($cekdataku) < 6) {
            dd("tidak ada");
        }

    	//menghapus semua data (clear)
		$wma = $this->wmaModel->findAll();
		foreach ($wma as $w ) {
			$this->wmaModel->delete($w['id']);
		}

		//Tabel Aktual
    	//menghapus semua data (clear)
		$aktual = $this->aktualModel->findAll();
			foreach ($aktual as $w ) {
				$this->aktualModel->delete($w['id']);
		}

		//Tabel hasil
    	//menghapus semua data (clear) di tabel hasil 
		$thasil = $this->hasilModel->findAll();
		foreach ($thasil as $w ) {
			$this->hasilModel->delete($w['id']);
		}
		

    	//mengulang data sampai 4 (sesuai periode)
    	foreach ($periode as $key) {
    		$cek = $this->bkeluarModel->select('id_brgklr,jml_klr, tgl_klr as bul')->where('id_barang', $nm)->where('tgl_klr <', $tanggal)->orderBy('tgl_klr', 'desc')->findAll($key);
    		$no=count($cek);
    		
    		//mengecek apakah datanya valid sesuai jumlah periodenya
    		if ($key == count($cek)) {
    			
    			$data = $this->bkeluarModel->select('id_brgklr,jml_klr, tgl_klr as bul')->where('id_barang', $nm)->where('tgl_klr <', $tanggal)->orderBy('tgl_klr', 'desc')->findAll($key);

    			//menambahkan data ke database
    			foreach ($data as $keys) {

    				$ko = [	'bulan' => $keys['bul'],
    						'jumlah' => $keys['jml_klr']*($no--),
    						'periode' => $key
    					  ];
    					  // dd($ko);
    				$this->wmaModel->save($ko);
    			}
    			
    			$dataWma[$key] = $this->wmaModel->where('periode', $key)->findAll();	
    		}else{
    			$nilaiWma = 0;
    		}

    	}

    	//mendapatkan nilai wma
	    	$no=0;
	    	$jumlah = 0;
	    	$total = 3;
			for ($i=0; $i < count($periode); $i++) { 
				$wmaku = $this->wmaModel->where('periode', $total++)->findAll();	
	    		if (!empty($wmaku)) {

	    			foreach ($wmaku as $w) {
	    				$jumlah = $w['jumlah']+$jumlah;
		    		}
		    		
		    		$dataku[$no++] = $jumlah/$pembagi[$i];
		    		$jumlah = 0;
	    		}else{
	    			$dataku[$no++] = 0;
	    		}	
	    	}
	    	$datainput = ['bulan' => $tanggal,
    					'wma3' => $dataku[0],
    	 				'wma4' => $dataku[1],
    					'wma5' => $dataku[2],
    					'wma6' => $dataku[3],
    					'error3' => 0,
    					'error4' => 0,
    					'error5' => 0,
    					'error6' => 0];
    		$cek = $this->hasilModel->save($datainput);

    	

    	//asas
    	$databln = 0;
    	$no=1;
    	$barangklrthn = $this->bkeluarModel->select('DISTINCT YEAR(tgl_klr) as tahun')->where('id_barang', $nm)->findAll();
    	foreach ($barangklrthn as $thn) {
    		$barangklrbln = $this->bkeluarModel->select('DISTINCT MONTH(tgl_klr) as bulan')->where('id_barang', $nm)->where('YEAR(tgl_klr)', $thn['tahun'])->findAll();
    		foreach ($barangklrbln as $bln) {

    			$datakeluar = $this->bkeluarModel->where('id_barang', $nm)->where('MONTH(tgl_klr)', $bln['bulan'])->where('YEAR(tgl_klr)', $thn['tahun'])->findAll();
    			foreach ($datakeluar as $brg) {
    				
    			$databln = $brg['jml_klr']+$databln;
    			}
    		
    			
    			$datanya = ['id_barang' => $nm, 'bulan' => $thn['tahun']."-".$bln['bulan']."-01", 'nilai' => $databln];
    			$this->aktualModel->save($datanya);
    			$databln = 0;
    		}
    	}
    	// dd($datanya);

    	$findperbln = $this->aktualModel->select('id_barang,nilai, bulan as bul')->where('id_barang', $nm)->where('bulan <', $tanggal)->orderBy('bulan', 'desc')->findAll();
	    foreach ($findperbln as $pol) {
	    	$tanggal = $pol['bul'];
	    	// $no=3;

	    	//menghapus semua data (clear)
			$wma = $this->wmaModel->findAll();
			foreach ($wma as $w ) {
				$this->wmaModel->delete($w['id']);
			}

	    	//mengulang data sampai 4 (sesuai periode)
	    	foreach ($periode as $key) {
	    		$cek = $this->aktualModel->select('id_barang,nilai, bulan as bul')->where('id_barang', $nm)->where('bulan <', $tanggal)->orderBy('bulan', 'desc')->findAll($key);
	    		$no=count($cek);
	    		
	    		//mengecek apakah datanya valid sesuai jumlah periodenya
	    		if ($key == $no) {
	    			
	    			$data = $this->aktualModel->select('id_barang,nilai, bulan as bul')->where('id_barang', $nm)->where('bulan <', $tanggal)->orderBy('bulan', 'desc')->findAll($key);

	    			//menambahkan data ke database
	    			foreach ($data as $keys) {

	    				$ko = [	'bulan' => $keys['bul'],
	    						'jumlah' => $keys['nilai']*($no--),
	    						'periode' => $key
	    					  ];
	    					  // dd($ko);
	    				$this->wmaModel->save($ko);
	    			}
	    			
	    			$dataWma[$key] = $this->wmaModel->where('periode', $key)->findAll();	
	    		}else{
	    			$nilaiWma = 0;
	    		}

	    	}

	    	//mendapatkan nilai wma
	    	$no=0;
	    	$jumlah = 0;
	    	$total = 3;
			for ($i=0; $i < count($periode); $i++) { 
				$wmaku = $this->wmaModel->where('periode', $total++)->findAll();	
	    		if (!empty($wmaku)) {

	    			foreach ($wmaku as $w) {
	    				$jumlah = $w['jumlah']+$jumlah;
		    		}
		    		
		    		$dataku[$no++] = $jumlah/$pembagi[$i];
		    		$jumlah = 0;
	    		}else{
	    			$dataku[$no++] = 0;
	    		}	
	    	}
	    	$datainput = ['bulan' => $tanggal,
    					'wma3' => $dataku[0],
    	 				'wma4' => $dataku[1],
    					'wma5' => $dataku[2],
    					'wma6' => $dataku[3],
    					'error3' => 0,
    					'error4' => 0,
    					'error5' => 0,
    					'error6' => 0];
    					$this->hasilModel->save($datainput);
    	}

    	//mencari error 3
    	$nok = 0;
    	$dataaktual = $this->aktualModel->findAll();
    	foreach ($dataaktual as $key) {
    		$datawmas = $this->hasilModel->where('bulan', $key['bulan'])->findAll();
    		foreach ($datawmas as $keys) {
    			$jumlah = abs((($key['nilai']-$keys['wma3'])/$key['nilai'])*100);
    			if ($keys['wma3'] == 0) {
    				# code...
    			}else{
    				$this->hasilModel->update($keys['id'], ['error3' => $jumlah]);
    			}
    		}
    	}
    	
    	//error 4
    	$nok = 0;
    	$dataaktual = $this->aktualModel->findAll();
    	foreach ($dataaktual as $key) {
    		$datawmas = $this->hasilModel->where('bulan', $key['bulan'])->findAll();
    		foreach ($datawmas as $keys) {
    			$jumlah = abs((($key['nilai']-$keys['wma4'])/$key['nilai'])*100);
    			if ($keys['wma4'] == 0) {
    				# code...
    			}else{
    			$this->hasilModel->update($keys['id'], ['error4' => $jumlah]);
    			}
    		}
    	}
    	//error 5
    	$nok = 0;
    	$dataaktual = $this->aktualModel->findAll();
    	foreach ($dataaktual as $key) {
    		$datawmas = $this->hasilModel->where('bulan', $key['bulan'])->findAll();
    		foreach ($datawmas as $keys) {
    			$jumlah = abs((($key['nilai']-$keys['wma5'])/$key['nilai'])*100);
    			if ($keys['wma5'] == 0) {
    				# code...
    			}else{
    			$this->hasilModel->update($keys['id'], ['error5' => $jumlah]);
    			}
    		}
    	}

    	//error 6
    	$nok = 0;
    	$dataaktual = $this->aktualModel->findAll();
    	foreach ($dataaktual as $key) {
    		$datawmas = $this->hasilModel->where('bulan', $key['bulan'])->findAll();
    		foreach ($datawmas as $keys) {
    			$jumlah = abs((($key['nilai']-$keys['wma6'])/$key['nilai'])*100);
    			if ($keys['wma6'] == 0) {
    				# code...
    			}else{
    			$this->hasilModel->update($keys['id'], ['error6' => $jumlah]);
    			}
    		}
    	}


    	//mencari mape
    	$hasil = array();
    	$hasiler[0] = ['wma' => 'wma3', 'error' => $this->hasilModel->select('avg(error3) as error')->where('error3 !=','0')->findAll()[0]['error'], 'nilai' => $this->hasilModel->select('wma3')->where('error3 !=','0')->findAll()[0]['wma3']];
    	$hasiler[1] = ['wma' => 'wma4', 'error' => $this->hasilModel->select('avg(error4) as error')->where('error4 !=','0')->findAll()[0]['error'], 'nilai' => $this->hasilModel->select('wma4')->where('error4 !=','0')->findAll()[0]['wma4']];
    	$hasiler[2] = ['wma' => 'wma5', 'error' => $this->hasilModel->select('avg(error5) as error')->where('error5 !=','0')->findAll()[0]['error'], 'nilai' => $this->hasilModel->select('wma5')->where('error5 !=','0')->findAll()[0]['wma5']];
    	$hasiler[3] = ['wma' => 'wma6', 'error' => $this->hasilModel->select('avg(error6) as error')->where('error6!=','0')->findAll()[0]['error'], 'nilai' => $this->hasilModel->select('wma6')->where('error6 !=','0')->findAll()[0]['wma6']];
    	foreach ($hasiler as $key) {
    		// echo $key['error'];
    		 array_push($hasil, $key['error']);
    	}
    	
    	foreach ($hasiler as $key) {
    		if ($key['error'] == min($hasil)) {
    			$nilaiwma['nilai'] = $key['nilai'];
    			$nilaiwma['error'] = $key['error'];
    		}
    	}

    	// dd($tanggal);
    	$data = ['hasil' => $this->hasilModel->where('bulan <=', $tanggal1)->orderBy('bulan', 'asc')->findAll(),
    			 'wma' => $nilaiwma,
    			 'tanggal' => $tanggal1,
    			 'mape' => $hasil
    			];

        return view('admin/contoh', $data);
    }
}
