<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('convertDateFormat')) {
	function convertDateFormat($date,$format)
	{
		$Newdate = date_create($date);
		return date_format($Newdate,$format);

	    
	}
}
#**** update ledger start
function update_ledger()
{
	$CI =& get_instance();
	$last_month = date('M-Y', strtotime("-1 month"));
	
	$CI->db->select('month');
	$CI->db->from('ledger');  
	$CI->db->where('month',$last_month);
	$query = $CI->db->get();        
	$res =  $query->result_array();
	if(empty($res)){
		get_last_month_ledger();
		echo "Successfully  Updated";
	}else{
		echo "No records found to update";
	}
}

function get_last_month_ledger()
{
	$CI =& get_instance();
	$last_month2 = date('M-Y', strtotime("-2 month"));
	
	$CI->db->select('*');
	$CI->db->from('ledger');  
	$CI->db->where('month',$last_month2);
	$query = $CI->db->get();        
	$res =  $query->result();
	if(!empty($res)){
		foreach($res as $val){
			$last_month_data[$val->product_id][$val->variant_id]= $val->final_stock;
		}
			
	}
	update_last_month_ledger($last_month_data);
	
}

function update_last_month_ledger($last_month_data)
{
	$CI =& get_instance();
	$startDate = strtotime(date('Y-m-01',strtotime('last month')));
	$endDate   = strtotime(date('Y-m-01'));
	$CI->db->select('product_id,variant_id,type,COUNT(type) as cnt');
	$CI->db->from('qty_logs'); 
	$CI->db->where("created BETWEEN $startDate AND $endDate"); 
    $CI->db->group_by('type,variant_id,product_id');
	$CI->db->order_by('product_id');
	$query = $CI->db->get();  
	$res =  $query->result();
	if(!empty($res)){
		update_last_month_ledger_data($last_month_data,$res);
	}
}

function update_last_month_ledger_data($last_month_data,$res)
{
	$CI =& get_instance();
	$last_month = date('M-Y', strtotime("-1 month"));
	$curr_stock =  get_current_stock();
	foreach($res as $val){
		$Data[$val->product_id][$val->variant_id][$val->type] = $val->cnt;
	}
	foreach($Data as $key=> $val1){
		foreach($val1 as $key1=> $val2){
			$purchased_qty = (!empty($Data[$key][$key1]['purchased']))?$Data[$key][$key1]['purchased']:0;
			$sold_qty = (!empty($Data[$key][$key1]['order_complete']))?$Data[$key][$key1]['order_complete']:0;
			$waste_qty = (!empty($Data[$key][$key1]['waste']))?$Data[$key][$key1]['waste']:0;
			$opening_stock = (!empty($last_month_data[$key][$key1]))?$last_month_data[$key][$key1]:0;
			$final_stock = (!empty($curr_stock[$key][$key1]))?$curr_stock[$key][$key1]:0;

			$insData[] = ['month'=> $last_month,'opening_stock'=> $opening_stock,'product_id'=> $key,
						'variant_id'=> $key1,'purchased_qty'=> $purchased_qty,
						'sold_qty'=> $sold_qty,'waste_qty'=> $waste_qty,'final_stock'=> $final_stock];
		}
	}
	if(!empty($insData)){
		$CI->db->insert_batch('ledger', $insData);
	}		
}

function get_current_stock()
{
	$CI =& get_instance();
	$stock = [];
	$CI->db->select('*');
	$CI->db->from('qty_stock');  
	$query = $CI->db->get();        
	$res =  $query->result();
	if(!empty($res)){
		foreach($res as $val){
			$stock[$val->product_id][$val->variant_id]= $val->stock_qty;
		}
			
	}
	return $stock;
	
}
#**** update ledger end

if (!function_exists('browser_info')) {
	function browser_info($agent=null) {
			$u_agent = $_SERVER['HTTP_USER_AGENT']; 
			$bname = 'Unknown';
			$platform = 'Unknown';
			$version= "";

			//First get the platform?
			if (preg_match('/linux/i', $u_agent)) {
			    $platform = 'linux';
			}
			elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			    $platform = 'mac';
			}
			elseif (preg_match('/windows|win32/i', $u_agent)) {
			    $platform = 'windows';
			}

			// Next get the name of the useragent yes seperately and for good reason
			if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
			{ 
			    $bname = 'Internet Explorer'; 
			    $ub = "MSIE"; 
			} 
			elseif(preg_match('/Firefox/i',$u_agent)) 
			{ 
			    $bname = 'Mozilla Firefox'; 
			    $ub = "Firefox"; 
			} 
			elseif(preg_match('/Chrome/i',$u_agent)) 
			{ 
			    $bname = 'Google Chrome'; 
			    $ub = "Chrome"; 
			} 
			elseif(preg_match('/Safari/i',$u_agent)) 
			{ 
			    $bname = 'Apple Safari'; 
			    $ub = "Safari"; 
			} 
			elseif(preg_match('/Opera/i',$u_agent)) 
			{ 
			    $bname = 'Opera'; 
			    $ub = "Opera"; 
			} 
			elseif(preg_match('/Netscape/i',$u_agent)) 
			{ 
			    $bname = 'Netscape'; 
			    $ub = "Netscape"; 
			} 

			// finally get the correct version number
			$known = array('Version', $ub, 'other');
			$pattern = '#(?<browser>' . join('|', $known) .
			')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
			if (!preg_match_all($pattern, $u_agent, $matches)) {
			    // we have no matching number just continue
			}

			// see how many we have
			$i = count($matches['browser']);
			if ($i != 1) {
			    //we will have two since we are not using 'other' argument yet
			    //see if version is before or after the name
			    if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
			        $version= $matches['version'][0];
			    }
			    else {
			        $version= $matches['version'][1];
			    }
			}
			else {
			    $version= $matches['version'][0];
			}

			// check if we have a number
			if ($version==null || $version=="") {$version="?";}

			return array(
			    'userAgent' => $u_agent,
			    'name'      => $bname,
			    'version'   => $version,
			    'platform'  => $platform,
			    'pattern'    => $pattern
			);
			 
		}

	}
	
	
//money format
 if (!function_exists('AmountFormat')) {
	function AmountFormat($amount = '0', $symbal = '') {
		$amount = round($amount,2);
		$sign = '';
		if ( substr($amount, 0, 1) == '-'){
			$sign = '-';
			$amount = substr($amount, 1);
		}
		if($symbal == " ") {		// If you want the format without any symbol then pass space, ie: " "
			$amount = $sign . number_format($amount, 2,'.','');
		} else {
			$amount = $sign . $symbal . number_format($amount, 2);
		}
		return $amount;
		} 
	}

		

/***********datediff**********/
/*if (!function_exists('date_difference')) {
		function date_difference($earlierDate, $laterDate) {
			//returns an array of numeric values representing days, hours, minutes & seconds respectively
			$ret = array('days'=>0, 'hours'=>0, 'minutes'=>0, 'seconds'=>0);
			$totalsec = strtotime($laterDate) - strtotime($earlierDate);

			if ($totalsec >= 86400) {
				$ret['days'] = floor($totalsec/86400);
				$totalsec = $totalsec % 86400;
			}
			if ($totalsec >= 3600) {
				$ret['hours'] = floor($totalsec/3600);
				$totalsec = $totalsec % 3600;
			}
			if ($totalsec >= 60) {
				$ret['minutes'] = floor($totalsec/60);
			}
			$ret['seconds'] = $totalsec % 60;
			return $ret;
		}
	}*/
	
if (!function_exists('func_date_conversion')) {
		function func_date_conversion($date_format_source, $date_format_destiny, $date_str){
/*
		$df_src = 'Y-m-d';
		$df_des = 'd-m-Y';
		$final_Date=func_date_conversion($df_src, $df_des,date('Y-m-d'));
		echo $final_Date;
*/
		$base_format     = split('[:/.\ \-]', $date_format_source);
		$date_str_parts = split('[:/.\ \-]', $date_str );
		
		$date_elements = array();
		
		$p_keys = array_keys( $base_format );
		foreach ( $p_keys as $p_key )
		{
			if ( !empty( $date_str_parts[$p_key] ))
			{
				$date_elements[$base_format[$p_key]] = $date_str_parts[$p_key];
			}
			else
				return false;
		}
		
		if (array_key_exists('M', $date_elements)) {
			$Mtom = array(
				"Jan" => "01",
				"Feb" => "02",
				"Mar" => "03",
				"Apr" => "04",
				"May" => "05",
				"Jun" => "06",
				"Jul" => "07",
				"Aug" => "08",
				"Sep" => "09",
				"Oct" => "10",
				"Nov" => "11",
				"Dec" => "12",
			);
			$date_elements['m']=$Mtom[$date_elements['M']];
		}
		
		$dummy_ts = mktime($date_elements['H'], $date_elements['i'], $date_elements['s'], $date_elements['m'], $date_elements['d'], $date_elements['Y'] );
		
		return date( $date_format_destiny, $dummy_ts );
		}

	}
	
/**

	For encrypt of Selected String
 */

if (!function_exists('encryptor')) {

    function encryptor($string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'e@c@l@i@c@k';
        $secret_iv = 'S3cur3';

        // hash
        $key = hash('sha512', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha512', $secret_iv), 0, 16);

        //do the encyption given text/string/number

        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);

        return $output;
    }

}
/**
	For Decrypt of encrypted value
 */
if (!function_exists('decryptor')) {

    function decryptor($string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'e@c@l@i@c@k';
        $secret_iv = 'S3cur3';

        // hash
        $key = hash('sha512', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha512', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);


        return $output;
    }

}



if (!function_exists('strip_html_tags')) {

    function strip_html_tags($text)
    {
        $text = preg_replace(
        array(
          // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
          // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
          ),
          array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
          ),
           $text );
        return strip_tags( $text );
    }
}

if (!function_exists('getLoginUserDetails')) {

    function getLoginUserDetails() {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
			$session_data=($CI->session->userdata("session_info"));
			$loginId=$session_data['user_id'];
			// $Companyid=$session_data['CreatedBy'];
			$data=array();
			$data['loginUserData']=$CI->Commonmodel->getRow("users","id='$loginId'");
			
			return $data; 
    }
}
//---------------------------For Check Duplicate Value Details------------------on

if (!function_exists('checkDuplicateValue')) {

    function checkDuplicateValue($table,$condition) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		$CI->load->model('Commonmodel');
		$CI->db->select("*")->from($table)->where($condition);
		$query = $CI->db->get();	
			if ($query->num_rows() > 0) {
				return $query->num_rows();;
			} else {
				return 0;
			} 
    
	}
}

//---------------------------For Check Duplicate Value Details------------------on

if (!function_exists('getValues')) {

    function getValues($table,$condition) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		$CI->load->model('Adminmodel');
		$CI->db->select("*")->from($table)->where($condition);
		$query = $CI->db->get();	
			if ($query->num_rows() > 0) {
				//echo $CI->db->last_query();
				return $query->result_array();
			} else {
				return 0;
			} 
    
	}
}

/**
	To gernerate random number
 */
if (!function_exists('random_number')) {

    function random_number($length) {
	    $chars = "0123456789";
	    $password = substr( str_shuffle( $chars ), 0, $length );
	    return $password;
	}
}

/**
	To Generate random po number 
 */
 
if (!function_exists('random_po_number')) {

    function random_po_number($length) {
	    $chars = "ASDFGHJKLMNBVCXZQWERTYUIOP0123456789asdfghjklqwertyuiopzxcvbnm";
	    $password = substr( str_shuffle( $chars ), 0, $length );
	    return $password;
	}
}



if (!function_exists('charNo')) {

    function charNo($length) {
	    $chars = "ASDFGHJKLMNBVCXZQWERTYUIOP";
	    $password = substr( str_shuffle( $chars ), 0, $length );
	    return $password;
	}
}
//------------------For Dynamic Breadcumb------------------------

if(!function_exists('generateBreadcrumb')){
	
	function generateBreadcrumb(){
		  $ci = &get_instance();
		  $i=1;
		  $uri = $ci->uri->segment($i);
		  $link = '
		  <ul class="breadcrumb">';

		  while($uri != ''){
			$prep_link = '';
		  for($j=1; $j<=$i;$j++){
			$prep_link .= $ci->uri->segment($j).'/';
		  }

		  if($ci->uri->segment($i+1) == ''){

			$link.='<li class="active"><a href="'.site_url($prep_link).'">';
			$link.=strtoupper(str_replace(array('_','-'),array(' ',' '),$ci->uri->segment($i))).'</a></li> ';
		  }else{
			$link.='<li><a href="'.site_url($prep_link).'">';
			$link.=strtoupper($ci->uri->segment($i)).'</a></li> <span class="mdi mdi-chevron-right"></span>';
		  }

		  $i++;
		  $uri = $ci->uri->segment($i);
		  }
			$link .= '</ul>';
			return $link;
		}
	}

	if(!function_exists('check_exist_image')){
		function check_exist_image($file_url){
			if (file_exists($file_url)) {
			   return $file_url;
			} else {
			    return base_url().'assets/no_image.png';
			}
		}
	}

	/**
	For custom pagination 
 */
if(!function_exists('get_pagination')){
	
	function get_pagination(){
            $config['base_url'] = base_url().'itemlist/index/';
            $config['total_rows'] = $this->db->get('item')->num_rows();
            $config['per_page'] = 4;
            $config['num_links'] = 5;

            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul><!--pagination-->';

            $config['first_link'] = '&laquo;';
            $config['first_tag_open'] = '<li class="prev page">';
            $config['first_tag_close'] = '</li>';
//
            $config['last_link'] = '&raquo;';
            $config['last_tag_open'] = '<li class="next page">';
            $config['last_tag_close'] = '</li>';
//
            $config['next_link'] = '&rarr;';
            $config['next_tag_open'] = '<li class="next page">';
            $config['next_tag_close'] = '</li>';
//
            $config['prev_link'] = '&larr;';
            $config['prev_tag_open'] = '<li class="prev page">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page">';
            $config['num_tag_close'] = '</li>';
 
            $this->pagination->initialize($config);
		}
	}
/**
	For csrf prtection 
 */	
	//------------------For Dynamic Breadcumb------------------------

if (!function_exists('printArray')) {
    function printArray($array){
       echo"<pre>";
       print_r($array);
        echo"</pre>";
    }
}

// get hour and minutes
if (!function_exists('get_hr_min')) {
    function get_hr_min($t){
	    $h = floor($t/60) ? floor($t/60) .' hours' : '';
	    $m = $t%60 ? $t%60 .' minutes' : '';
	    return $h && $m ? $h.' and '.$m : $h.$m;
    }
}


// get hour and minutes
if (!function_exists('year_list')) {
	function year_list($startYear, $endYear, $id="year"){ 
    //start the select tag 
	        for ($i=$endYear;$i>=$startYear;$i--){ 
	        echo "<option value=".$i.">".$i."</option>";     
	        } 
		}
	}

	//---------------------------Notification Details------------------

if (!function_exists('saveNotification')) {

    function saveActionPerform($data) {
    	//print_r(browser_info()['name']);

		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		$CI->load->model('Commonmodel');

	 	$data['system_ip']  = $_SERVER['REMOTE_ADDR'];
	 	$data['browser_name']  = browser_info()['name'];
		$result=$CI->Commonmodel->savedata("action",$data);
		return $result; 
    }

}



// get hour
if (!function_exists('hour_list')) {
	function hour_list(){ 
//start the select tag 
        for ($i='00';$i<='23';$i++){ 
        echo "<option value=".$i.">".$i."</option>";     
        } 
	}
}


// get minutes
if (!function_exists('min_list')) {
	function min_list(){ 
//start the select tag 
        for ($j='00';$j<='59';$j++){ 
        echo "<option value=".$j.">".$j."</option>";     
        } 
	}
}



if (!function_exists('get_string_between')) {

   function get_string_between($string, $start, $end){
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
		}

	}
	
if (!function_exists('refreshAfterSomeTime')) {

   function refreshAfterSomeTime($time, $location){
	   		header("Refresh: 1; url=".base_url().'team-member/dashboard');
		}

	}



if (!function_exists('getGenderUsingName')) {

    function getGenderUsingName($name='') {
		$response = json_decode(file_get_contents("https://genderapi.io/api/?name=".$name));
		if($response->gender == 'null'){
			return "M";
		}else if($response->gender == "male"){
				return "M";
		}else{
			return "F";
		}
			
		exit;
   	}
}

if (!function_exists('aes128Encrypt')) {

    function aes128Encrypt($str,$key='') {
		$block = mcrypt_get_block_size('rijndael_128', 'ecb');
		$pad = $block - (strlen($str) % $block);
		$str .= str_repeat(chr($pad), $pad);
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $str, MCRYPT_MODE_ECB));
   	}
}

if (!function_exists('getpropertyImage')) {

     function getpropertyImage($condtion) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
		
			$data=array();
			$data['imageLists']=$CI->Commonmodel->getRow("property_image",$condtion);
			return $data; 
    }
}
	
	// for get login User Access (for SubAdmin)
if (!function_exists('userAccess')) {

     function userAccess($userId) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
		$data=array();
		$accessLists=$CI->Commonmodel->getRow("access","user_id='$userId'");
		$userPermission=$accessLists;

		$data['userAdd']=(!empty($userPermission[0]['add_yn'])?$userPermission[0]['add_yn']:'0');
		$data['userView']=(!empty($userPermission[0]['view_yn'])?$userPermission[0]['view_yn']:'0');
		$data['userEdit']=(!empty($userPermission[0]['edit_yn'])?$userPermission[0]['edit_yn']:'0');
		$data['userDelete']=(!empty($userPermission[0]['delete_yn'])?$userPermission[0]['delete_yn']:'0');

    	// for access property permission
		$data['propertyAdd']=(!empty($userPermission[1]['add_yn'])?$userPermission[1]['add_yn']:'0');
		$data['propertyView']=(!empty($userPermission[1]['view_yn'])?$userPermission[1]['view_yn']:'0');
		$data['propertyEdit']=(!empty($userPermission[1]['edit_yn'])?$userPermission[1]['edit_yn']:'0');
		$data['propertyDelete']=(!empty($userPermission[1]['delete_yn'])?$userPermission[1]['delete_yn']:'0');

   		// for access property permission
		$data['rentingAdd']=(!empty($userPermission[2]['add_yn'])?$userPermission[2]['add_yn']:'0');
		$data['rentingView']=(!empty($userPermission[2]['view_yn'])?$userPermission[2]['view_yn']:'0');
		$data['rentingEdit']=(!empty($userPermission[2]['edit_yn'])?$userPermission[2]['edit_yn']:'0');
		$data['rentingDelete']=(!empty($userPermission[2]['delete_yn'])?$userPermission[2]['delete_yn']:'0');

		return $data; 
    }
}




if (!function_exists('countRow')) {
    function countRow($table,$condtion) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
		$sql="SELECT count(*) as total FROM $table where $condtion";
		$query=$CI->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result_array()[0]['total'];
		} else {
			return false;
		}	
    }
}

if (!function_exists('calculateRoomSize')) {
    function calculateRoomSize($condtion) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
		$sql="SELECT sum(room_size) as totalSize FROM property where $condtion";
		//return $sql; exit;
		$query=$CI->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
    }
}

if (!function_exists('date_difference')) {
    function date_difference($date) {
 
// Declare and define two dates 
    	
/*$date1 = strtotime("2016-06-01 22:45:00");  
$date2 = strtotime(date('Y-m-d H:i:s')); */
	//$date1 = strtotime("2019-07-01 22:45:00");
	$date1 = strtotime($date);  
	$date2 = strtotime(date('Y-m-d H:i:s'));  

	$diff = abs($date2 - $date1);  

	$years = floor($diff / (365*60*60*24));  

	$months = floor(($diff - $years * 365*60*60*24) 

                               / (30*60*60*24));  

	$days = floor(($diff - $years * 365*60*60*24 -  

             $months*30*60*60*24)/ (60*60*24)); 

	$hours = floor(($diff - $years * 365*60*60*24  

       - $months*30*60*60*24 - $days*60*60*24) 

                                   / (60*60));  

	$minutes = floor(($diff - $years * 365*60*60*24  

         - $months*30*60*60*24 - $days*60*60*24  

                          - $hours*60*60)/ 60);  

	$seconds = floor(($diff - $years * 365*60*60*24  

         - $months*30*60*60*24 - $days*60*60*24 

                - $hours*60*60 - $minutes*60));  

	$data='';
	if(!empty($years))
	{
		$data.=$years." Year Ago.";
	}else if(!empty($months)){
		$data.=$months." Month Ago.";
	}else if(!empty($days)){
		$data.=$days." Days Ago.";
	}else if(!empty($hours)){
		$data.=$hours." Hour Ago.";
	}else if(!empty($minutes)){
		$data.=$minutes." Minutes Ago.";
	}else if(!empty($minutes)){
		$data.=$seconds." Seconds Ago.";
	}
	return $data;
	//printf("%d years, %d months, %d days, %d hours, ". "%d minutes, %d seconds", $years, $months, $days, $hours, $minutes, $seconds);

	}
}

if (!function_exists('ageCalculator')) {
	function ageCalculator($dob){

		$dateOfBirth = $dob;
		/*$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$year = $diff->format('%y');
		$month = $diff->format('%m');*/


		$bday = new DateTime($dob); // Your date of birth
		$today = new Datetime(date('Y-m-d'));
		$diff = $today->diff($bday);
		$year = $diff->y." Year";
		$month = $diff->m." Month";
		$day = $diff->d." Day";
		if(!empty($year)){
			$age = $year;
		}else if(!empty($month))
		{
			$age = $month;
		}else{
			$age = $day;
		}
 		return $age;
	    /*if(!empty($dob)){
	        $diff = (date('Y-m-d') - date('Y',strtotime($dob)));
	        return $diff;
	    }else{
	        return 0;
	    }*/
	}
}


if (!function_exists('find_roommets')) {
	function find_roommets($university){

		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];


		$sql="SELECT * FROM ((SELECT farourite_property_id, room_or_apartment,room_property_id,user_id FROM favourite_property where university_id='$university')UNION(SELECT farourite_property_id, room_or_apartment,room_property_id,user_id FROM favourite_property where university_id='$university')) AS result12 WHERE user_id!='$userId' Group by user_id ORDER BY room_or_apartment asc";

		$query=$this->db->query($sql);
			if ($query->num_rows() > 0) {
				$roomMetsId = $query->result_array();
			} else {
				$roomMetsId= false;
			}
		$userId = implode(',',array_column($roomMetsId, 'user_id'));
		$roommetsInfo=$this->Landingmodel->userList("users.id IN($userId)");

	    if(!empty($dob)){
	        $diff = (date('Y-m-d') - date('Y',strtotime($dob)));
	        return $diff;
	    }else{
	        return 0;
	    }
	}
}


if (!function_exists('getSingleColumn')) {
    function getSingleColumn($columnname,$table,$condition) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
		$sql="SELECT $columnname FROM $table where $condition";
		//return $sql; exit;
		$query=$CI->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result_array()[0][$columnname];
		} else {
			return false;
		}	
    }
}
if (!function_exists('loginWithLinkedIng')) {
    function loginWithLinkedIng() {
			
	$config['callback_url'] ='http://localhost/linkedin/index.php'; //Your callback URL

	$config['Client_ID'] = '8138ms7l5wiimh'; //Your LinkedIn Application Client ID
	$config['Client_Secret'] = 'MmK0G1xfB0wLebty';//Your LinkedIn Application Client Secret 

	echo '<a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='.$config['Client_ID'].'&redirect_uri='.$config['callback_url'].'&state=98765EeFWf45A53sdfKef4233&scope=r_liteprofile r_emailaddress w_member_social"><img src="./images/linkedin_connect_button.png" alt="Sign in with LinkedIn"/></a>';


	if(isset($_GET['code'])) // get code after authorization
	{

	    $url = 'https://www.linkedin.com/uas/oauth2/accessToken'; 
	    $param = 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$config['callback_url'].'&client_id='.$config['Client_ID'].'&client_secret='.$config['Client_Secret'];
	    //$return = (json_decode(post_curl($url,$param),true)); // Request for access token


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url); //Remote Location URL
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); //Timeout after 7 seconds
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//We add these 2 lines to create POST request
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param); //parameters data
		$result = curl_exec($ch);
		curl_close($ch);
		$return = (json_decode($result,true));

	//print_r($return);

		    if($return['error']) // if invalid output error
		    {
		       $content = 'Some error occured<br><br>'.$return['error_description'].'<br><br>Please Try again.';
		    }
		    else // token received successfully
		    {
		       
		        $url = "https://api.linkedin.com/v2/me?projection=(id,firstName,lastName,profilePicture(displayImage~:playableStreams))&oauth2_access_token=".$return['access_token'];
				//step1
		        $cSession = curl_init();
		        //step2
		        curl_setopt($cSession, CURLOPT_URL, $url);
		        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($cSession, CURLOPT_HEADER, false);
		        //step3
		        $result = curl_exec($cSession);
		        //step4
		        curl_close($cSession);
				$return = (json_decode($result,true));
		        print_r($return);
		      
		    }
		}
    }
}


/*if (!function_exists('findRoommet')) {
function findRoommet(){
	$nlocation=trim(get_string_between($location,'[',']'));
		// login user favourites room

		$sql="select * from favourite_property where user_id='$userId' ";
		

		$query=$this->db->query($sql);
			if ($query->num_rows() > 0) {
				$roommetDatas = $query->result_array();
			} else {
				$roomMetsId= 0;
			}
		

		$room_or_apartment = array_column($roommetDatas, 'room_or_apartment','room_property_id');
		$fUserId=array();
		foreach($room_or_apartment as $k=>$val){
			$room_or_apartment ="room_or_apartment='$val'";
			$room_property_id ="room_property_id='$k'";

			$condition = $room_or_apartment." and ".$room_property_id." and user_id!='$userId'";
		echo $condition;
			$node['ids'] = getSingleColumn('user_id','favourite_property',$condition);
			array_push($fUserId,$node);
		}

		//print_r($fUserId);
		 exit;
		$roommetsInfo=$this->Landingmodel->userList("users.id IN($userId)");
}	}*/



if (!function_exists('calculatePriceLevel')) {
    function calculatePriceLevel($condtion) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data = ($CI->session->userdata("session_info"));
		$loginId = $session_data['user_id'];
		$sql = "SELECT sum(price) as total FROM price_level where $condtion";
		//return $sql; exit;
		$query=$CI->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}	
    }
}

if (!function_exists('group_by')) {
	function group_by($key, $data) {
		$keyName = $key;
	    $result = array();
	    foreach($data as $val) {
	        if(array_key_exists($key, $val)){
	            $result[$val[$key]][] = $val;
	        }else{
	            $result[""][] = $val;
	        }
	    }
	    return $result;
	}
}

if (!function_exists('group_by_field')) {
	function group_by_field($key, $data) {
		$keyName = $key;
	    $result = array();
	    if(count($data[0])>0){
	    	foreach($data as $val) {
		        if(array_key_exists($key, $val)){
		            $result[$key."#".$val[$key]][] = $val;
		        }else{
		            $result[""][] = $val;
		        }
		 	}
		   return $result;
	    } 
	}
}

	/*public function sendmailregistration()
	{
		
	$email='randhir@yopmail.com';
	$cc='randhir.muz11@yopmail.com';
		
	$body = "this is a test mail";

	$subject ="Program Registration Youreka";
	//$body =$data['body'];
	//echo $cc;die;
	$this->load->library('email');
	 $result = $this->email
   		->set_newline("\r\n")
	    ->from('info@lgbtweddings.com','Test')
	    ->reply_to('info@lgbtweddings.com','Test')
	    ->to($email)
	    ->cc($cc)
	    ->subject($subject)
	    ->message($body)->set_mailtype("html")
	    ->send();
		//var_dump($result);
	}*/

if (!function_exists('getBookedroom')) {
    function getBookedroom($condition) {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
		$sql="SELECT GROUP_CONCAT(apartment_name SEPARATOR '<br> &nbsp;&nbsp;&nbsp;&nbsp;')as roomName FROM apartment_room where $condition";
		//return $sql; exit;
		$query=$CI->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result_array()[0]['roomName'];
		} else {
			return false;
		}	
    }
}
if (!function_exists('sendmail')) {
	function sendmail($to,$subject,$message,$sharedEmail=''){
		$CI = get_instance();
		$CI->load->library("PhpMailerLib");
        $mail = $CI->phpmailerlib->load();

        // get set from and reply to dynamic
		$setting = getSetting();
		$setFrom = ($setting['getSettingData'][0]['emailFrom']);
		$addReplyTo = ($setting['getSettingData'][0]['emailTo']);
		$BCCEmail = ($setting['getSettingData'][0]['bcc_email']);


	    $mail->isSMTP();                                           
	    $mail->Host       = 'email-smtp.us-east-1.amazonaws.com'; 
	    $mail->SMTPAuth   = true;                                   
	    $mail->Username   = 'AKIAUDTIRMPCMJ6Y2GPP';
	    $mail->Password   = 'BGF8az2h/yJk9iik2mcuET5sHq0DDKifIX7mjLxQVNPT'; 
	    $mail->SMTPSecure = 'tls';                                  
	    $mail->Port       = 587;                                    
	    //Recipients
	    //$mail->setFrom('info@lgbtweddings.com', 'LGBTWeddings');
	    $mail->setFrom($setFrom, 'Mani-budapest');
	    $mail->addAddress($to);
	    $mail->addReplyTo($addReplyTo, 'Mani-budapest');
	    if(!empty($sharedEmail)){
			$mail->addCC($sharedEmail);
	    }
	   // $mail->addReplyTo('info@lgbtweddings.com', 'LGBTWeddings');
		//$mail->addCC($cc[$i]);
	    $mail->addBCC($BCCEmail);
	    // Attachments
	   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $message;
	    $mail->send();
	    /*if($mail->send()){
	    	echo"1";
	    }else{
	    	echo"0";
	    }*/
	}
}
if (!function_exists('checkAndUpdateProperty')) {
	function checkAndUpdateProperty(){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];

		// update booking complete//
		$yearMonth = date('Y-m-00');
		//$last_day_this_month  = date('Y-'.$month.'-t');
		$sql2 = "SELECT MAX(monthly_payment_id)as monthId,monthly_payment.order_id,max(str_to_date(monthly_payment.month_year,'%m-%Y')) lastMonthYear FROM monthly_payment GROUP by order_id order by monthly_payment_id desc";
		$query2=$CI->db->query($sql2);
		if ($query2->num_rows() > 0) {
			$allBookings = $query2->result_array();
		}else{
			$allBookings = '';
		}

		if(!empty($allBookings)){
			foreach($allBookings as $allBooking){
				$bookingForLastMonth = $allBooking['lastMonthYear'];
				$currentMonthyear = date('Y-m-00');

				if($bookingForLastMonth<$currentMonthyear){
					$orderId = $allBooking['order_id'];
					//echo ($allBooking['lastMonthYear'])."<br>";
					$query = "SELECT count(*)as total FROM monthly_payment WHERE order_id='$orderId' and payment_status='0'";
					 $queryResult = $CI->db->query($query);
					 if ($CI->db->affected_rows() > 0) {
					  	if($queryResult->row_array()['total']==0){
					  		$query1 = "update monthly_payment set booking_status='1' WHERE order_id='$orderId'";
					  		$CI->db->query($query1);	
					  	}
					 }

				}else{
					continue;
				}	
			}
		}
		 // update completed booking end here //

		// update room after 24 hour//
		$condition="booking_order_yn ='1' and order_date_time < DATE_SUB(NOW(), INTERVAL 24 HOUR)";
		$sql = "update apartment_room set booking_order_yn='0' WHERE $condition";

		$query=$CI->db->query($sql);
		if ($CI->db->affected_rows() > 0) {
           return 1;
        } else {
           return 0;
        } 
	}
}

function countMonthPosition($duration,$daterange=''){

	$short = array(
		'01'=>'Jan', 
		'02'=>'Feb', 
		'03'=>'Mar', 
		'04'=>'Apr', 
		'05'=>'May', 
		'06'=>'June', 
		'07'=>'Jul', 
		'08'=>'Aug', 
		'09'=>'Sept', 
		'10'=>'Oct', 
		'11'=>'Nov', 
		'12'=>'Dec'
	);

	$customStartDate ='';
	$customEndDate = '';

		if($duration==1){

			$start = array_search("Sept",$short);
			
			if($start>=date('m')){
				$customStartDate .= date('Y')."-".$start;
			}else{
				$customStartDate .= date('Y',strtotime('+1 years'))."-".$start;
			}

			$end = array_search("Jan",$short);

			if($end>=date('m')){
				$customEndDate .= date('Y')."-".$end;
			}else{
				$customEndDate .= date('Y',strtotime('+2 years'))."-".$end;
			}
		}


		if($duration==2){
			$start = array_search("Sept",$short);
			
			if($start>=date('m')){
				$customStartDate .= date('Y')."-".$start;
			}else{
				$customStartDate .= date('Y',strtotime('+1 years'))."-".$start;
			}

			$end = array_search("June",$short);

			if($end>=date('m')){
				$customEndDate .= date('Y')."-".$end;
			}else{
				$customEndDate .= date('Y',strtotime('+2 years'))."-".$end;
			}
		}
		if($duration==3){
			$start = array_search("Feb",$short);
			
			if($start>=date('m')){
				$customStartDate .= date('Y')."-".$start;
			}else{
				$customStartDate .= date('Y',strtotime('+1 years'))."-".$start;
			}

			$end = array_search("June",$short);

			if($end>=date('m')){
				$customEndDate .= date('Y')."-".$end;
			}else{
				$customEndDate .= date('Y',strtotime('+1 years'))."-".$end;
			}
		}
		if($duration==4){
			$start = explode(' - ',$daterange)[0];
			$starttime=strtotime($start);
			$startmonth=date("m",$starttime);
			$startyear=date("Y",$starttime);
			$customStartDate .=$startyear."-".$startmonth;

			$end =explode(' - ',$daterange)[1];
			$endtime=strtotime($end);
			$endmonth=date("m",$endtime);
			$endyear=date("Y",$endtime);
			$customEndDate .= $endyear."-".$endmonth;
		}
	$data['customStartDate']=$customStartDate;
	$data['customEndDate']=$customEndDate;
	return $data;

}

if (!function_exists('bookingDetails')) {
	function bookingDetails($condition){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Landingmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];

		$data['bookingDetails']=$CI->Landingmodel->roomListForPayment($condition);
		if(count($data['bookingDetails'][0])>0){
			return $data;
		}else{
			return false;
		}	
	}
}

if (!function_exists('findSecurityAmt')) {
	function findSecurityAmt($condition){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		//$CI->load->model('Landingmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId = $session_data['user_id'];
		
		$data['discountAmt'] = $CI->Commonmodel->getRow("price_level",$condition);
		if(count($data['discountAmt'])>0){
			return $data['discountAmt'][0]['price'];
		}else{
			return false;
		}	
	}
}

if (!function_exists('findTotalSecurityAmt')) {
	function findTotalSecurityAmt($condition){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		//$CI->load->model('Landingmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId = $session_data['user_id'];
		$sql = "SELECT sum(price) as total FROM price_level WHERE $condition";
		$query = $CI->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result_array()[0]['total'];
		}
	}
}


if (!function_exists('bookedRoomList')) {
	function bookedRoomList($condition,$durationId){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Landingmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
		//return $condition;
		$bookingDetails = $CI->Landingmodel->bookingRoomList($condition,$durationId);
		
		return $bookingDetails[0]['total'];	
	}
}

if (!function_exists('getSetting')) {

    function getSetting() {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
	
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
	
		$data=array();
		$data['getSettingData']=$CI->Commonmodel->getRow("header_footer_setting");
		return $data; 
    }
}
// find city list

if (!function_exists('gitCity')) {

    function gitCity() {
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
	
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
	
		$data=array();
		$cities=$CI->Commonmodel->getRow("cities","status='1' and is_deleted='0'");
		foreach($cities as $city){
			$node[]=$city['city_name'];	
		}
		
		return $node; 
    }
}


if (!function_exists('sendReminderMail')) {
	function sendReminderMail($inerval){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];

		$condition="booking_yn ='0' and email!='' and shared_date < DATE_SUB(NOW(), INTERVAL $inerval HOUR)";
		$sql = "Select * from shared_property WHERE $condition";
		
		$query=$CI->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} 
	}
}
if (!function_exists('duesPayementMail')) {
	function duesPayementMail(){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data = ($CI->session->userdata("session_info"));
		$loginId = $session_data['user_id'];
		$month = date('m');
		//$today = date('Y-m-d');
		$today = '2019-10-31';
		$last_day_this_month  = date('Y-m-t'); 
		$first_day_this_month  = date('Y-m-01');

		if($last_day_this_month == $today ){
			$remindermonth = date('m-Y',strtotime("+1 month"));
		}
		else if($first_day_this_month == $today ){
			$remindermonth = date('m-Y');
		}else{
			$remindermonth = '';
		}
		
		//echo"las ".$last_day_this_month."   to ".$today; exit;
		if(($last_day_this_month == $today) || ($first_day_this_month == $today)){
			$condition = "monthly_payment.payment_status ='0' and monthly_payment.month=format('$remindermonth','mm-yyyy') ";
			$sql = "SELECT booking_order.*,booking_order.created_by,(SELECT room_id FROM booking_order_room WHERE order_id=booking_order.booking_order_id)as roomId,(SELECT email FROM users WHERE id=booking_order.created_by)as userEmail,monthly_payment.month_year,monthly_payment.monthly_payment_id FROM booking_order INNER JOIN monthly_payment ON booking_order.booking_order_id=monthly_payment.order_id WHERE $condition";
			
			$query = $CI->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} 
		}
		
	}
}

if (!function_exists('countBookingforEarlyBooking')) {
	function countBookingforEarlyBooking($condition){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		// $CI->load->model('Emploginmodel');
		$CI->load->model('Commonmodel');
		$session_data = ($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];

		$sql = "SELECT booking_order_room.*,monthly_payment.month_year,count(monthly_payment.month_year)as totalRow FROM booking_order_room INNER JOIN monthly_payment ON booking_order_room.order_id=monthly_payment.order_id wHERE $condition";
			
		$query = $CI->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result_array()[0]['totalRow'];
		} 
	}
}

if (!function_exists('getUserId')) {
	function getUserId(){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId=$session_data['user_id'];
		//$roleId = $session_data['role_id'];
		$condition = "users.role_id='2' and users.is_deleted='0'";
		if($roleId==3){
			$condition .= " and users.created_by='$loginId'";
		}
		$data = array();
		$totalUsers = $CI->Adminmodel->userList($condition);

		$usersArray=array(); 

		if(count($totalUsers[0])>0){
			foreach($totalUsers as $totalUser){
				$node['id'] = $totalUser['id'];
				$node['name'] = $totalUser['first_name'].' '.$totalUser['last_name'];
				array_push($usersArray,$node);
			}
		}

		$condition1 = "monthly_payment.booking_status='0'";
		if($roleId==3){
			$condition1 .=" and (property_member.user_id='$loginId' or apartment_room.created_by='$loginId')";
		}
		$condition1 .=" GROUP by order_id ORDER BY monthly_payment.monthly_payment_id asc";

		$bookingsUser = $CI->Adminmodel->lastPaymentDetails($condition1);
		if(count($bookingsUser[0])>0){
			foreach($bookingsUser as $bookingsUser){
				$node1['id'] = $bookingsUser['created_by'];
				$node1['name'] = $bookingsUser['rentedBy'];
				array_push($usersArray,$node1);
			}
		}
		return $usersArray;
	}
}
if (!function_exists('getFristAndLastDate')) {
	function getFristAndLastDate($orderId=''){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId = $session_data['user_id'];
		//$roleId = $session_data['role_id'];
		$sql = "SELECT (SELECT month_year FROM monthly_payment WHERE order_id='$orderId' ORDER BY monthly_payment_id LIMIT 1) as 'first',(SELECT month_year FROM monthly_payment WHERE order_id='$orderId' ORDER BY monthly_payment_id DESC LIMIT 1) as 'last'";
		$query = $CI->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array()[0];
			$first =  $result['first'];
			$last =  $result['last'];
			$dateRange = $first.' To '.$last;
			return $dateRange;
		} 
	}
}
if (!function_exists('getBookedAndSharedProperty')) {
	function getBookedAndSharedProperty($roomOrApartment='',$apartmentId='',$roomId='',$duration='',$startMonth='',$endMonth='',$totalRoom=''){
		$CI = get_instance();
		$CI->load->database();
        $CI->load->library('session');
		$CI->load->model('Commonmodel');
		$session_data=($CI->session->userdata("session_info"));
		$loginId = $session_data['user_id'];
		//$roleId = $session_data['role_id'];


	if($roomOrApartment==1){
		$customButton = '';

		$apartmentId 	= $apartmentId;
		$roomId  		= $roomId;
		$duration 		= $duration;

		if($duration == 4){

		

			$before24HourDate = date("Y-m-d H:i:s",strtotime('-24 hours',time()));
			$condition = "apartment_id = '$apartmentId' and shared_date >'$before24HourDate' and booking_yn='0'"; 

			/*$countBookingPropery =" booking_order_room.period_id='$duration' and booking_order_room.apartment_id='$apartmentId' and monthly_payment.month_year BETWEEN '$startMonth' and '$endMonth' group by monthly_payment.order_id";*/

			$startRange = date("m-Y",strtotime($startMonth));
			$endRange = date("m-Y",strtotime($endMonth));
			$countBookingPropery =" booking_order_room.period_id='$duration' and booking_order_room.apartment_id='$apartmentId' and monthly_payment.month_year BETWEEN format('$startRange','mm-yyyy') and format('$endRange','mm-yyyy') group by monthly_payment.order_id";

		//echo bookedRoomList($countBookingPropery,$duration; exit
			if(bookedRoomList($countBookingPropery,$duration)>0){
				

				if(checkDuplicateValue("shared_property",$condition)){
					$customButton = "<span class='customButtonApart'> In progress </span>";
				}
				$conditon1 = "room_id = '$roomId' and period_id='$duration'";
				
				if(checkDuplicateValue("booking_order_room",$conditon1)){
					// for get booking created by user id//
					$sql = "SELECT booking_order_room.*,booking_order.created_by FROM booking_order_room INNER JOIN booking_order ON booking_order_room.order_id=booking_order.booking_order_id where room_id = '$roomId' and period_id='$duration'";
					$query = $CI->db->query($sql);
					if ($query->num_rows() > 0) {
						$userId =  encryptor($query->result_array()[0]['created_by']);
						$Username=getSingleColumn("concat(first_name,' ',last_name)","users","id='".decryptor($userId)."'");

						$orderId =  ($query->result_array()[0]['order_id']);
						$dateRange = getFristAndLastDate($orderId);
					} 
					$customButton = "<a href='javascript:void(0);' class='customUserButton' onclick=viewUser('$userId')><span class='customButton'> Booked By ".$Username."(".$dateRange.")</span></a>";
				}	
			}
			$buttonData['customButton'] = $customButton;
			return $buttonData;
		}else{
			$before24HourDate = date("Y-m-d H:i:s",strtotime('-24 hours',time()));
			$condition = "apartment_id = '$apartmentId' and shared_date >'$before24HourDate' and booking_yn='0'"; 

			if(checkDuplicateValue("booking_order_room","apartment_id = '$apartmentId' and period_id='$duration'")){
				
				if(checkDuplicateValue("shared_property",$condition)){
					$customButton = "<span class='customButtonApart'> In progress </span>";
				}
				if(checkDuplicateValue("booking_order_room","room_id = '$roomId' and period_id='$duration'")){

					$sql = "SELECT booking_order_room.*,booking_order.created_by FROM booking_order_room INNER JOIN booking_order ON booking_order_room.order_id=booking_order.booking_order_id where room_id = '$roomId' and period_id='$duration'";
					$query = $CI->db->query($sql);
					if ($query->num_rows() > 0) {
						$userId =  encryptor($query->result_array()[0]['created_by']);
						$Username=getSingleColumn("concat(first_name,' ',last_name)","users","id='".decryptor($userId)."'");

						$orderId =  ($query->result_array()[0]['order_id']);
						$dateRange = getFristAndLastDate($orderId);
					}

				$customButton = "<a href='javascript:void(0);' class='customUserButton' onclick=viewUser('$userId')><span class='customButton'> Booked By ".$Username."(".$dateRange.")</span></a>";
				}
			}
		$buttonData['customButton'] = $customButton;
		return $buttonData;
		}
	 }
	 if($roomOrApartment==2){
		$customButton = '';

		$apartmentId 	= $apartmentId;
		$roomId  		= $roomId;
		$duration 		= $duration;

		if($duration == 4){

			$before24HourDate = date("Y-m-d H:i:s",strtotime('-24 hours',time()));
			$condition = "apartment_id = '$apartmentId' and shared_date >'$before24HourDate' and booking_yn='0'"; 

			$startRange = date("m-Y",strtotime($startMonth));
			$endRange = date("m-Y",strtotime($endMonth));
			$countBookingPropery =" booking_order_room.period_id='$duration' and booking_order_room.apartment_id='$apartmentId' and monthly_payment.month_year BETWEEN format('$startRange','mm-yyyy') and format('$endRange','mm-yyyy') group by monthly_payment.order_id";

			if(bookedRoomList($countBookingPropery,$duration)>0){
				
				if(checkDuplicateValue("booking_order_room","apartment_id = '$apartmentId' and period_id='$duration'")){
					$customButton = "<span class='customButtonApart'> In progress </span>";
				}

				if(bookedRoomList($countBookingPropery,$duration)){
					$customButton = "<span class='customButtonApart'> Booked </span>";
				}
			
			}

			$buttonData['customButton'] = $customButton;
			return $buttonData;

		}else{
			$before24HourDate = date("Y-m-d H:i:s",strtotime('-24 hours',time()));
			$condition = "apartment_id = '$apartmentId' and shared_date >'$before24HourDate' and booking_yn='0'"; 

			if(checkDuplicateValue("booking_order_room","apartment_id = '$apartmentId' and period_id='$duration'")){

				if(checkDuplicateValue("shared_property",$condition)){
					$customButton = "<span class='customButtonApart'> In progress </span>";
				}
				$totalBooking1 = checkDuplicateValue("booking_order_room","apartment_id = '$apartmentId' and period_id='$duration'"); 

				if($totalRoom==$totalBooking1){
					$customButton = "<span class='customButtonApart'> Booked  </span>";
				}
				
			}

		$buttonData['customButton'] = $customButton;
		return $buttonData;
		}
	 }
		
	}
}
if (!function_exists('getLatLong')) {
	function getLatLong($address){
	    if(!empty($address)){
	        //Formatted address
	        $formattedAddr = str_replace(' ','+',$address);
	        /*echo 'https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key=AIzaSyBLisGXY5L64UQcIHJUnbhCpQkX3EUwJfU';
	         exit;*/
	        //Send request and receive json data by address
	         $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key=AIzaSyBLisGXY5L64UQcIHJUnbhCpQkX3EUwJfU');

	        $output = json_decode($geocodeFromAddr);
	        //Get latitude and longitute from json data
	        $data['latitude']  = $output->results[0]->geometry->location->lat; 
	        $data['longitude'] = $output->results[0]->geometry->location->lng;
	        //Return latitude and longitude of the given address
	        if(!empty($data)){
	            return $data;
	        }else{
	            return false;
	        }
	    }else{
	        return false;   
	    }
	}
}

?>