<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<h3>INVOICE PEMBAYARAN</h3>

<h4 class="text-red" id="countDownKadarluasa"></h4>
<?php
$id = $this->uri->segment(2);
$data = $this->db->query("SELECT *, a.created_at as tanggal_donasi_dibuat
  FROM donasi a
  LEFT OUTER JOIN galang_dana b
  ON a.idGalang = b.idGalang
  LEFT OUTER JOIN tbl_user c
  ON a.idUser = c.idUser
  WHERE md5(a.idDonasi)='$id'")->result();
print_r($data);
echo '<br><br>';
?>


<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-BwKVZAEn_uaPXdIe"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
  <input type="hidden" name="result_type" id="result-type" value=""></div>
  <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>

<a class="btn btn-success green" id="pay-button">Bayar Sekarang</a>


<script type="text/javascript">
  
  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?=base_url()?>Snap/token?code=<?=$this->uri->segment(2)?>',
      cache: false,

      success: function(data) {
      //location = data;

      console.log('token = '+data);
      
      var resultType = document.getElementById('result-type');
      var resultData = document.getElementById('result-data');

      function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(JSON.stringify(data));
        //resultType.innerHTML = type;
        //resultData.innerHTML = JSON.stringify(data);
      }

      snap.pay(data, {
        
        onSuccess: function(result){
          changeResult('success', result);
          console.log(result.status_message);
          console.log(result);
          $("#payment-form").submit();
        },
        onPending: function(result){
          changeResult('pending', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        },
        onError: function(result){
          changeResult('error', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        }
      });
    }
  });
  });

</script>

<?php


$date = new DateTime($data[0]->tanggal_donasi_dibuat);
$date->add(new DateInterval('P1D'));
echo $expiredDate = strval($date->format('Y-m-d H:i:s'));
?>

<script>
	// Set the date we're counting down to
	var countDownDate = new Date("<?=$expiredDate?>").getTime();
	//alert(countDownDate);2018-09-07 16:29:17
	//alert("2018-09-07 16:29:17");
	// Update the count down every 1 second
	var x = setInterval(function () {

		// Get todays date and time
		var now = new Date().getTime();

		// Find the distance between now an the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		// Output the result in an element with id="demo"
		document.getElementById("countDownKadarluasa").innerHTML = hours + " : " +minutes + " : " + seconds;

		// If the count down is over, write some text
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("countDownKadarluasa").innerHTML = "Kadaluarsa";
		}
	}, 1000);
</script>