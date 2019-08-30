<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Snap extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $params = array(
            'server_key' => 'SB-Mid-server-sbVLZhZJsLJeg4yXMbZNJM35',
            'production' => false
        );
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
        date_default_timezone_set("Asia/Jakarta");
        $this->dateToday = date("Y-m-d H:i:s");
    }
    public function token() {
        $code               = $this->input->get('code');
        // $this->data['memberData']        = $this->MemberModel->memberDataById($this->idMember)->result();
        // $this->data['price']             = $this->CartModel->invoiceMetaByCode($this->bookingCode)->result();
        // $this->data['invoiceDetailData'] = $this->CartModel->invoiceDetailByCode($this->bookingCode)->result();
        
        $data = $this->db->query("SELECT *
        FROM donasi a
        LEFT OUTER JOIN galang_dana b
        ON a.idGalang = b.idGalang
        LEFT OUTER JOIN tbl_user c
        ON a.idUser = c.idUser
        WHERE md5(a.idDonasi)='$code'")->result();


        foreach ($data as $i) {};

        $transaction_details = array(
            'order_id' => md5($i->idDonasi),
            'gross_amount' => $i->nominalDonasi
        );
        // $item_details[]      = array(
        //     'id' => 'product',
        //     'price' => 0,
        //     'quantity' => 1,
        //     'name' => $i->tittleGalang
        // );
        foreach ($data as $p) {
            $item_details[] = array(
                'id' => $p->idDonasi,
                'price' => $p->nominalDonasi,
                'quantity' => 1,
                'name' => 'Biaya Donasi '. $p->tittleGalang
            );
        }
        $item_details[] = array(
            'id' => 'biaya_admin',
            'price' => 0,
            'quantity' => 1,
            'name' => 'Biaya Admin'
        );
        $price_total=0;
        foreach ($item_details as $d) {
            $price_total = $price_total + $d['price'];
        }
        $customer_details      = array(
            'first_name' => $i->namaUser,
            'last_name' => "",
            'email' => $i->emailUser,
            'phone' => $i->teleponUser,
            'billing_address' => $i->alamatUser,
            'shipping_address' => ""
        );
        $credit_card['secure'] = true;
        $time                  = time();
        $custom_expiry         = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute',
            'duration' => 1440
        );
        $transaction_data      = array(
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'credit_card' => $credit_card,
            'expiry' => $custom_expiry
        );
        $invCode               = $code;
        $data                  = array(
            'i_date_send' => $this->dateToday
        );
        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }
    public function finish() {
        $result = json_decode($this->input->post('result_data'));
        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';


       
        $statusCode  = $result->status_code;
        $code = $result->order_id;

        $data = $this->db->query("SELECT *
        FROM donasi a
        LEFT OUTER JOIN galang_dana b
        ON a.idGalang = b.idGalang
        LEFT OUTER JOIN tbl_user c
        ON a.idUser = c.idUser
        WHERE md5(a.idDonasi)='$code'")->result();
// print_r($data);
        foreach ($data as $d) {};
       
        if ($statusCode == "200") {
            $data = array(
                'idTransaksiMidtrans' => $result->transaction_id,
                'updated_at' => $this->dateToday,
                'tanggalPembayaran' => $this->dateToday,
                'metodePembayaran' => $result->payment_type,
                'statusPembayaran' => 'Terbayar'
            );
            $this->db->where('md5(idDonasi)', $code);
            $this->db->update('donasi', $data);
        } else if ($statusCode == "201") {
            if ($result->payment_type == "bank_transfer") {
                $data = array(
                        'idTransaksiMidtrans' => $result->transaction_id,
                        'updated_at' => $this->dateToday,
                        'metodePembayaran' => $result->payment_type,
                        'urlPembayaran' => $result->pdf_url,
                        'statusPembayaran' => 'Menunggu Pembayaran'
                );
                $this->db->where('md5(idDonasi)', $code);
                $this->db->update('donasi', $data);
            } else if ($result->payment_type == "echannel") {
                $data = array(
                        'idTransaksiMidtrans' => $result->transaction_id,
                        'updated_at' => $this->dateToday,
                        'metodePembayaran' => $result->payment_type,
                        'urlPembayaran' => $result->pdf_url,
                        'statusPembayaran' => 'Menunggu Pembayaran'
                );
                $this->db->where('md5(idDonasi)', $code);
                $this->db->update('donasi', $data);
            } else if ($result->payment_type == 'gopay') {
                        $data = array(
                                'idTransaksiMidtrans' => $result->transaction_id,
                                'updated_at' => $this->dateToday,
                                'metodePembayaran' => $result->payment_type,
                                'urlPembayaran' => $result->pdf_url,
                                'statusPembayaran' => 'Menunggu Pembayaran'
                        );
                        $this->db->where('md5(idDonasi)', $code);
                        $this->db->update('donasi', $data);
            } else {
                $data = array(
                        'idTransaksiMidtrans' => $result->transaction_id,
                        'updated_at' => $this->dateToday,
                        'metodePembayaran' => $result->payment_type,
                        'urlPembayaran' => $result->pdf_url,
                        'statusPembayaran' => 'Menunggu Pembayaran'
                );
                $this->db->where('md5(idDonasi)', $code);
                $this->db->update('donasi', $data);
            }
        }else{
                $data = array(
                        'idTransaksiMidtrans' => $result->transaction_id,
                        'updated_at' => $this->dateToday,
                        'tanggalKadaluarsa' => $this->dateToday,
                        'metodePembayaran' => $result->payment_type,
                        'urlPembayaran' => $result->pdf_url,
                        'statusPembayaran' => 'Kadaluarsa'
                );
                $this->db->where('md5(idDonasi)', $code);
                $this->db->update('donasi', $data); 
        }
        // die;
        redirect(base_url() . "invoice/$code/");
    }
}
?>