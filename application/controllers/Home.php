<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['page_name'] = "home";
		$data['terdanai'] = $this->mymodel->selectWithQuery("SELECT COUNT(a.idGalang) as jumlah
		FROM
			(SELECT galang_dana.idGalang, galang_dana.targetDonasi, SUM(donasi.nominalDonasi) as total
			FROM galang_dana
			LEFT JOIN donasi on galang_dana.idGalang = donasi.idGalang
			GROUP BY galang_dana.idGalang ) as a
		WHERE a.total < a.targetDonasi");

		$data['total_desa'] = $this->mymodel->selectWithQuery("SELECT COUNT(idDesa) as jumlah FROM master_desa WHERE status = 'ENABLE' ");

		$data['total_galang'] = $this->mymodel->selectWithQuery("SELECT COUNT(idGalang) as jumlah FROM galang_dana WHERE status = 'ENABLE' ");

		$data['donasion'] = $this->mymodel->selectWithQuery("SELECT SUM(donasi.nominalDonasi) as total
		FROM donasi WHERE status = 'ENABLE' AND statusPembayaran='Terbayar'");

		$data['donasioff'] = $this->mymodel->selectWithQuery("SELECT SUM(donasi_off.nominalDonasi) as total
		FROM donasi_off WHERE status = 'ENABLE'");

		$data['donasi'] = $data['donasion'][0]['total'] + $data['donasioff'][0]['total'];

		// var_dump($data['donasion']);
		$data['donatur'] = $this->mymodel->selectWithQuery("SELECT COUNT(idUser) as jumlah
		FROM tbl_user WHERE status = 'ENABLE'");
		
		$data['donasibygalang'] = $this->mymodel->selectWithQuery("SELECT SUM(donasi.nominalDonasi) as total
		FROM donasi WHERE status = 'ENABLE' AND statusPembayaran='Terbayar'");

		$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT qrya.*, COALESCE(totaldonasion, 0) as donasion, COALESCE(totaldonasioff, 0) as donasioff, COALESCE(totalterpakai, 0) as terpakai 
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
		ORDER BY created_at DESC
		LIMIT 4");

		$data['listberita'] = $this->mymodel->selectWithQuery("SELECT berita.idBerita as id, file.dir, 
		berita.judulberita, SUBSTR(berita.isiBerita, 1, 380) as isiBerita,
		date_format(berita.created_at, '%d %M %Y') as tanggal, user.name, master_desa.value as namadesa, 
		master_kategoriberita.value as kategori, berita.views
		FROM berita
		LEFT JOIN user on berita.idUser = user.id
		LEFT JOIN master_desa on user.idDesa = master_desa.idDesa
		LEFT JOIN master_kategoriberita on berita.idKategori = master_kategoriberita.idKategoriB
		LEFT JOIN file on berita.idBerita = file.table_id
		WHERE berita.status = 'ENABLE' AND file.table = 'berita'");

		$data['listcerita'] = $this->mymodel->selectWithQuery("SELECT cerita.idCerita as id, file.dir, 
		cerita.judulCerita, SUBSTR(cerita.isiCerita, 1, 200) as isiCerita,
		date_format(cerita.created_at, '%d %M %Y') as tanggal, tbl_user.namaUser, 
		master_kategoricreita.value as kategori, cerita.views
		FROM cerita
		LEFT JOIN tbl_user on cerita.idUser = tbl_user.idUser
		LEFT JOIN master_kategoricreita on cerita.idKategori = master_kategoricreita.idKategoriC
		LEFT JOIN file on cerita.idCerita = file.table_id
		WHERE cerita.status = 'ENABLE' AND file.table = 'cerita'");

		
		$data['admin_url'] = $this->admin_url;

        $this->template->load('template/template','index',$data); 
	}

	public function lupapassword()
	{
		$data['page_name'] = "Lupa Password";
        $this->template->load('template/template','lupapassword',$data);
	}

	public function profil($id)
	{
		
		$data['admin_url'] = $this->admin_url;

		$data['biodata'] = $this->mymodel->selectWithQuery("SELECT tbl_user.*, 
		file.dir, file.table, date_format(tbl_user.created_at, '%d %M %Y') as tanggal
		FROM tbl_user
		LEFT JOIN file on tbl_user.idUser = file.table_id
		WHERE tbl_user.idUser = '$id' AND file.table = 'tbl_user'");

		$data['jumlahgalang'] = $this->mymodel->selectWithQuery("SELECT idGalang, 
		COUNT(idDonasi) as jumlahdonasi
		FROM donasi
		WHERE idUser = '$id' AND statusPembayaran = 'Terbayar' AND status = 'ENABLE'
		GROUP BY idGalang");

		$data['jumlahdonasi'] = $this->mymodel->selectWithQuery("SELECT count(idDonasi) as jumlah
		FROM donasi
		WHERE statusPembayaran = 'Terbayar' AND status = 'ENABLE' AND idUser = '$id'");

		$data['totaldonasi'] = $this->mymodel->selectWithQuery("SELECT SUM(nominalDonasi) as total
		FROM donasi
		WHERE statusPembayaran = 'Terbayar' AND status = 'ENABLE' AND idUser = '$id'");

		$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT qryall.*
			FROM
			(SELECT qrya.*, COALESCE(totaldonasion, 0) as donasion, COALESCE(totaldonasioff, 0) as donasioff, COALESCE(totalterpakai, 0) as terpakai 
			FROM
			(SELECT a.idGalang, a.idUser,
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
			ORDER BY created_at DESC ) qryall
			LEFT OUTER JOIN donasi
			ON qryall.idGalang = donasi.idGalang
			WHERE donasi.idUser = '$id'
			GROUP BY donasi.idGalang");

		$data['listcerita'] = $this->mymodel->selectWithQuery("SELECT cerita.idCerita as id, file.dir, 
			cerita.judulCerita, SUBSTR(cerita.isiCerita, 1, 380) as isiCerita,
			date_format(cerita.created_at, '%d %M %Y') as tanggal, tbl_user.namaUser, 
			master_kategoricreita.value as kategori, cerita.views
			FROM cerita
			LEFT JOIN tbl_user on cerita.idUser = tbl_user.idUser
			LEFT JOIN master_kategoricreita on cerita.idKategori = master_kategoricreita.idKategoriC
			LEFT JOIN file on cerita.idCerita = file.table_id
			WHERE cerita.status = 'ENABLE' AND file.table = 'cerita' AND cerita.idUser = '$id'");
		
				
		// var_dump($data['listcerita']);
		// die();

		$data['page_name'] = "profl";
        $this->template->load('template/template','profil/profil',$data);
	}

	public function profildesa($id)
	{
		$data['biodata'] = $this->mymodel->selectWithQuery("SELECT user.*, master_desa.value as namaDesa, 
		file.dir, file.table, date_format(user.created_at, '%d %M %Y') as tanggal
		FROM user
		LEFT JOIN file on user.id = file.table_id
		LEFT JOIN master_desa on user.idDesa = master_desa.idDesa
		WHERE user.id = '$id' AND file.table = 'user'");

		$data['jumlahgalang'] = $this->mymodel->selectWithQuery("SELECT count(idGalang) as jumlah
		FROM galang_dana
		WHERE idUser = '$id'");

		$data['jumlahdonasi'] = $this->mymodel->selectWithQuery("SELECT qrya.idUser, COALESCE(SUM(jumlahdonasion)) as jumlahdonasion , COALESCE(SUM(jumlahdonasioff)) as jumlahdonasioff
		FROM galang_dana qrya
		LEFT OUTER JOIN
				(
					SELECT idGalang, COALESCE(COUNT(donasi.idDonasi), 0) as jumlahdonasion
							FROM donasi WHERE status = 'ENABLE' AND statusPembayaran='Terbayar'
							GROUP BY idGalang
					) qryb
					ON qrya.idGalang = qryb.idGalang
					LEFT OUTER JOIN
					(
					SELECT idGalang, COALESCE(COUNT(donasi_off.idDonasioff), 0) as jumlahdonasioff
							FROM donasi_off WHERE status = 'ENABLE'
							GROUP BY idGalang
					) qryc
					ON qrya.idGalang = qryc.idGalang
					WHERE qrya.idUser = '$id'");

		$data['totaldonasi'] = $this->mymodel->selectWithQuery("SELECT qrya.idUser, SUM(COALESCE(totaldonasion, 0)) as donasion, SUM(COALESCE(totaldonasioff, 0)) as donasioff
		FROM galang_dana qrya
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
			WHERE qrya.idUser = '$id'");

		$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT qrya.*, COALESCE(totaldonasion, 0) as donasion, COALESCE(totaldonasioff, 0) as donasioff, COALESCE(totalterpakai, 0) as terpakai 
			FROM
			(SELECT a.idGalang, a.idUser,
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
			WHERE qrya.idUser = '$id'
			ORDER BY created_at DESC");
		
		$data['listberita'] = $this->mymodel->selectWithQuery("SELECT berita.idBerita as id, file.dir, 
			berita.judulberita, SUBSTR(berita.isiBerita, 1, 380) as isiBerita,
			date_format(berita.created_at, '%d %M %Y') as tanggal, user.name, master_desa.value as namadesa, 
			master_kategoriberita.value as kategori, berita.views
			FROM berita
			LEFT JOIN user on berita.idUser = user.id
			LEFT JOIN master_desa on user.idDesa = master_desa.idDesa
			LEFT JOIN master_kategoriberita on berita.idKategori = master_kategoriberita.idKategoriB
			LEFT JOIN file on berita.idBerita = file.table_id
			WHERE berita.status = 'ENABLE' AND file.table = 'berita' AND berita.idUser = '$id'");

		$data['admin_url'] = $this->admin_url;
		$data['page_name'] = "profl";
        $this->template->load('template/template','profil/profiladmin',$data);
	}
	
}