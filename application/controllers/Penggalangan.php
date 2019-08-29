<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penggalangan extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	
		$arr = array(
			'idKategori' => $this->input->post('idKategori'),
		  );
		  
		$this->session->set_userdata($arr);

		$kategori = $this->session->userdata('idKategori');

		// var_dump($kategori);
		// die();
		$data['kategori'] = $this->mymodel->selectWithQuery("SELECT * FROM master_kategori WHERE status = 'ENABLE'");

		if($kategori == ''){
			$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT qrya.*, 
			COALESCE(totaldonasion, 0) as donasion, COALESCE(totaldonasioff, 0) as donasioff, 
			COALESCE(totalterpakai, 0) as terpakai 
			FROM
			(SELECT a.idGalang, 
			a.tittleGalang as tittleGalang, desa.value as desa_value, a.targetDonasi as targetDonasi, 
			file.dir as file_dir, a.status as status, kate.value as kategori, 
			a.deskripsiGalang as deskripsi, a.created_at, a.publish
			FROM galang_dana a
			LEFT JOIN file on a.idGalang = file.table_id 
			LEFT JOIN user u on a.idUser = u.id 
			LEFT JOIN master_desa desa on u.idDesa = desa.idDesa 
			LEFT JOIN master_kategori kate on a.idKategori = kate.idKategori
			where file.table = 'galang_dana' AND a.status = 'ENABLE'
			GROUP BY a.idGalang
			) qrya
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(donasi.nominalDonasi), 0) as totaldonasion
					FROM donasi WHERE status = 'ENABLE' AND statusPembayaran='Terbayar'
					GROUP BY idGalang
			) qryb
			ON qrya.idGalang = qryb.idGalang
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(donasi_off.nominalDonasi), 0) as totaldonasioff
					FROM donasi_off WHERE status = 'ENABLE'
					GROUP BY idGalang
			) qryc
			ON qrya.idGalang = qryc.idGalang
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(update_galang_dana.nominalterpakai), 0) as totalterpakai
				FROM update_galang_dana WHERE status = 'ENABLE'
				GROUP BY idGalang
			) qryd
			ON qrya.idGalang = qryd.idGalang
			ORDER BY created_at DESC");
		}else{
			$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT qrya.*, 
			COALESCE(totaldonasion, 0) as donasion, COALESCE(totaldonasioff, 0) as donasioff, 
			COALESCE(totalterpakai, 0) as terpakai 
			FROM
			(SELECT a.idGalang, 
			a.tittleGalang as tittleGalang, desa.value as desa_value, a.targetDonasi as targetDonasi, 
			file.dir as file_dir, a.status as status, kate.value as kategori, 
			a.deskripsiGalang as deskripsi, a.created_at, a.publish
			FROM galang_dana a
			LEFT JOIN file on a.idGalang = file.table_id 
			LEFT JOIN user u on a.idUser = u.id 
			LEFT JOIN master_desa desa on u.idDesa = desa.idDesa 
			LEFT JOIN master_kategori kate on a.idKategori = kate.idKategori
			where file.table = 'galang_dana' AND a.status = 'ENABLE'
			GROUP BY a.idGalang
			) qrya
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(donasi.nominalDonasi), 0) as totaldonasion
					FROM donasi WHERE status = 'ENABLE' AND statusPembayaran='Terbayar'
					GROUP BY idGalang
			) qryb
			ON qrya.idGalang = qryb.idGalang
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(donasi_off.nominalDonasi), 0) as totaldonasioff
					FROM donasi_off WHERE status = 'ENABLE'
					GROUP BY idGalang
			) qryc
			ON qrya.idGalang = qryc.idGalang
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(update_galang_dana.nominalterpakai), 0) as totalterpakai
				FROM update_galang_dana WHERE status = 'ENABLE'
				GROUP BY idGalang
			) qryd
			ON qrya.idGalang = qryd.idGalang
			WHERE qrya.idKategori = '$kategori'
			ORDER BY created_at DESC");
		}
		$data['admin_url'] = $this->admin_url;
        $data['page_name'] = "Penggalangan";
        $this->template->load('template/template','penggalangan/index',$data);
	}

	public function view($id)
	{
		$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT qryall.*, file.dir as foto, 
		file.table FROM
			(SELECT qrya.*, 
			COALESCE(totaldonasion, 0) as donasion, COALESCE(totaldonasioff, 0) as donasioff, 
			COALESCE(totalterpakai, 0) as terpakai 
			FROM
			(SELECT a.idGalang, 
			a.tittleGalang as tittleGalang, desa.value as desa_value, a.targetDonasi as targetDonasi, 
			file.dir as file_dir, a.status as status, kate.value as kategori, 
			a.deskripsiGalang as deskripsiGalang, date_format(a.created_at, '%d %M %Y') as dibuat, a.publish, u.name as namaPenggalang,
			date_format(u.created_at, '%d %M %Y') as userdibuat, a.detailGalang, a.idUser
			FROM galang_dana a
			LEFT JOIN file on a.idGalang = file.table_id 
			LEFT JOIN user u on a.idUser = u.id 
			LEFT JOIN master_desa desa on u.idDesa = desa.idDesa 
			LEFT JOIN master_kategori kate on a.idKategori = kate.idKategori
			where file.table = 'galang_dana' AND a.status = 'ENABLE'
			GROUP BY a.idGalang
			) qrya
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(donasi.nominalDonasi), 0) as totaldonasion
					FROM donasi WHERE status = 'ENABLE' AND statusPembayaran='Terbayar'
					GROUP BY idGalang
			) qryb
			ON qrya.idGalang = qryb.idGalang
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(donasi_off.nominalDonasi), 0) as totaldonasioff
					FROM donasi_off WHERE status = 'ENABLE'
					GROUP BY idGalang
			) qryc
			ON qrya.idGalang = qryc.idGalang
			LEFT OUTER JOIN
			(
			SELECT idGalang, COALESCE(SUM(update_galang_dana.nominalterpakai), 0) as totalterpakai
				FROM update_galang_dana WHERE status = 'ENABLE'
				GROUP BY idGalang
			) qryd
			ON qrya.idGalang = qryd.idGalang
			WHERE qrya.idGalang = '$id'
			ORDER BY dibuat DESC) qryall
			LEFT JOIN file on qryall.idUser = file.table_id
			WHERE file.table = 'user'");

			$data['updategalang'] = $this->mymodel->selectWithQuery("SELECT update_galang_dana.deskripsiUpdate, 
			update_galang_dana.nominalterpakai, user.name, date_format(update_galang_dana.created_at, '%d %M %Y') as tglupdate
			FROM update_galang_dana
			LEFT JOIN galang_dana on update_galang_dana.idGalang = galang_dana.idGalang
			LEFT join user on update_galang_dana.idUser = user.id
			WHERE update_galang_dana.idGalang = '$id' AND update_galang_dana.status = 'ENABLE'");
			
			$data['donaturwaktu'] = $this->mymodel->selectWithQuery("SELECT donasi.idUser as id, tbl_user.namaUser, 
			donasi.nominalDonasi, donasi.statusDonatur, donasi.tanggalPembayaran, file.dir, file.table
			FROM donasi
			LEFT JOIN tbl_user on donasi.idUser = tbl_user.idUser
			LEFT JOIN file on tbl_user.idUser = file.table_id
			WHERE donasi.status = 'ENABLE' AND donasi.statusPembayaran = 'Terbayar'
			AND donasi.idGalang = '$id' AND file.table = 'tbl_user'
			ORDER BY donasi.tanggalPembayaran desc");

			$data['donaturoff'] = $this->mymodel->selectWithQuery("SELECT donasi_off.*, user.name FROM donasi_off 
			LEFT JOIN user on donasi_off.idUser = user.id
			WHERE donasi_off.status='ENABLE' AND donasi_off.idGalang = '$id' ORDER BY donasi_off.created_at desc");

		$data['admin_url'] = $this->admin_url;
        $data['page_name'] = "Penggalangan";
        $this->template->load('template/template','penggalangan/view',$data);
	}

	public function adddonasi()
	{

		$dt = $_POST['dt'];

		$dt['nominalDonasi'] = str_replace( ',', '', $dt['nominalDonasi'] );
		
		if($dt['statusDonatur']){
			$dt['statusDonatur'] = '1';
		}else{
			$dt['statusDonatur'] = '0';
		}

		$dt['statusPembayaran'] = "Belum Terbayar";
		
		$dt['created_at'] = date('Y-m-d H:i:s');

		$dt['status'] = "ENABLE";
// var_dump($dt);
// 		die();
		

		$str = $this->db->insert('donasi', $dt);

		header("Location:".base_url('penggalangan/view/'.$dt['idGalang']));
	}
	
}