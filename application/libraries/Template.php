<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {


		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}

		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{
			$this->CI =& get_instance();
						$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			return $this->CI->load->view($template, $this->template_data, $return);
		}
	// function pagination($page){
		
			// 	$config['full_tag_open']	= "<ul  class='pagination'>";
			// 	$config['full_tag_close']	= "</ul>";
				// 	$config['num_tag_open']		= '<li class="page-item">';
			// 	$config['num_tag_close']	= '</li>';
			// 	$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link">';
			// 	$config['cur_tag_close']	= '</a></li>';
				// 	$config['prev_link'] 		= '<span class="la la-caret-left"></span>';
			// 	$config['prev_tag_open'] 	= '<li class="page-item">';
			// 	$config['prev_tag_close'] 	= '</li>';
			// 	$config['next_tag_open'] 	= '<li class="page-item">';
			// 	$config['next_tag_close'] 	= '</li>';
				// 	$config['next_link'] 		= '<span class="la la-caret-right"></span>';
			// 	$config['first_tag_open'] 	= '<li class="page-item">';
			// 	$config['first_tag_close']	= '</li>';
				// 	$config['first_link'] 		= '<span class="la la-backward"></span> First';
			// 	$config['last_tag_open'] 	= '<li class="page-item">';
			// 	$config['last_tag_close'] 	= '</li>';
				// 	$config['last_link'] 		= 'Last <span class="la la-forward"></span>';
		// 	$config['attributes'] = array('class' => 'page-link');
		// 	return $config;
	// }
	function pagination($page){
		
			$config['full_tag_open']	= "<ul  class='pagination'>";
			$config['full_tag_close']	= "</ul>";
				$config['num_tag_open']		= '<li class="page-item">';
			$config['num_tag_close']	= '</li>';
			$config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link">';
			$config['cur_tag_close']	= '</a></li>';
				$config['prev_link'] 		= '<span class="fa fa-caret-left"></span>';
			$config['prev_tag_open'] 	= '<li class="page-item">';
			$config['prev_tag_close'] 	= '</li>';
			$config['next_tag_open'] 	= '<li class="page-item">';
			$config['next_tag_close'] 	= '</li>';
				$config['next_link'] 		= '<span class="fa fa-caret-right"></span>';
			$config['first_tag_open'] 	= '<li class="page-item">';
			$config['first_tag_close']	= '</li>';
				$config['first_link'] 		= '<span class="fa fa-backward"></span> First';
			$config['last_tag_open'] 	= '<li class="page-item">';
			$config['last_tag_close'] 	= '</li>';
				$config['last_link'] 		= 'Last <span class="fa fa-forward"></span>';
		$config['attributes'] = array('class' => 'page-link');
		return $config;
	}
	function getNameFromNumber($num) {
	$numeric = $num % 26;
	$letter = chr(65 + $numeric);
	$num2 = intval($num / 26);
	if ($num2 > 0) {
	return $this->getNameFromNumber($num2 - 1) . $letter;
	} else {
	return $letter;
	}
	}
	function createFile($string, $path)
	{
	$create = fopen($path, "w") or die("Change your permision folder for application and harviacode folder to 777");
	fwrite($create, $string);
	fclose($create);
	
	return $path;
	}
	function label($str)
	{
	$label = str_replace('_', ' ', $str);
	$label = ucwords($label);
	return $label;
	}
	
	function chart($id,$type,$label,$data)
	{
		if ($type == 'bar' || $type == 'line') {
			$html = '<div id="container">
					<canvas id="'.$id.'" width="600" height="300"></canvas>
				</div>
				<br><br>
				<div style="overflow: auto;">
						<div class="box-group" id="accordion'.$id.'">
		<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
		<div class="panel box box-default">
			<div class="box-header with-border bg-info">
				<h4 class="box-title">
				<a data-toggle="collapse" data-parent="#accordion'.$id.'" href="#collapseOne'.$id.'" style="font-family:Montserrat;">
					Lihat Detail Grafik <i class="fa fa-arrow-down"></i>
				</a>
				</h4>
			</div>
			<div id="collapseOne'.$id.'" class="panel-collapse collapse">
				<div class="box-body">
					
					
					<table class="table table-condensed table-hover table-bordered table-responsive mytable">
						<thead>
							<tr class="bg-info">
								<th>Label</th>
								';
								foreach ($label as $labeltable) {
								$html.='<th>'.$labeltable.'</th>';
								}
							$html.='		</tr>
						</thead>
						<tbody>
							';
							foreach ($data as $datatable) {
							$datatableku[] = json_decode($datatable['data']);
							$labelku[] = $datatable['labeldata'];
							$warnaku[] = $datatable['background'];
							
							}
							for ($i=0; $i < count($datatableku) ; $i++) {
							$html.=' <tr >';
								$html.=' 	<td style="background:'.$warnaku[$i].'">'.$labelku[$i].'</td>';
								for ($a=0; $a < count($datatableku[0]) ; $a++) {
								$html.='<td>'.$datatableku[$i][$a].'</td>';
								}
							$html.='</tr>';
							}
						$html.='	</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var canvas = document.getElementById("'.$id.'");
var ctx = canvas.getContext("2d");
var '.$id.'Data = {
labels : '.json_encode($label).',
datasets : [';
foreach ($data as $record) {
$html.= '{
			label: "'.$record['labeldata'].'",
			backgroundColor: "'.$record['background'].'",
			borderColor: "'.$record['border'].'",
			borderWidth: 1,
			fillColor: "rgba(220,103,20,0.9)",
			strokeColor: "rgba(220,103,20,0.8)",
			pointColor: "#73b45a",
			pointStrokeColor: "#fff",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "rgba(220,103,20,1)",
			data : '.$record['data'].'
},';
}
$html.='        ]

}
var myNewChart = new Chart(ctx , {
type: "'.$type.'",
data: '.$id.'Data,
});

</script>';
return $html;
}elseif($type == 'pie' || $type == 'doughnut'){
$html = '<div id="container">
	<canvas id="'.$id.'"></canvas>
</div>
<script>
var canvas = document.getElementById("'.$id.'");
var ctx = canvas.getContext("2d");
var '.$id.'Data = {
labels : '.$label.',
datasets : [';
foreach ($data as $record) {
$html.= '{
			label: "'.$record['labeldata'].'",
			backgroundColor: '.$record['background'].',
			borderColor: '.$record['border'].',
			borderWidth: 1,
			fillColor: "rgba(220,103,20,0.9)",
			strokeColor: "rgba(220,103,20,0.8)",
			pointColor: "#73b45a",
			pointStrokeColor: "#fff",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "rgba(220,103,20,1)",
			data : '.$record['data'].'
},';
}
$html.='        ]

}
var myNewChart = new Chart(ctx , {
type: "'.$type.'",
data: '.$id.'Data,

});

</script>';
return $html;
}
}


public function sonKey()
    {
        return "sonsonz";
    }
	   public function sonEncode($str)
    {
        // $key = $this->sonKey();
        // return strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $str, MCRYPT_MODE_CBC, md5(md5($key)))), '+/=', '-_~');

        return $str;        
    }
    public function sonDecode($encoded)
    {
	    // $this->CI =& get_instance();

     //    $key = $this->sonKey();
     //    $random = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(strtr($encoded, '-_~', '+/=')), MCRYPT_MODE_CBC, md5(md5($key))), "");
    	// $result = str_replace("\\", "/", $this->CI->db->escape($random));
    	// $result = str_replace("/0", "", $result);
    	// $result = str_replace("'", "", $result);


   		// return $result;

   		return $encoded;
    }

}