<?php 
//require_once(APPPATH.'modules/admin/controllers/admin.php');



function getSingleResult($sql){
 	$ci =& get_instance();
	$class = $ci->db->query($sql);
    $class = $class->row_array();
	$classs=implode(',',$class);
	$a=explode(',',$classs);
	return $a[0];
}
function getResult($sql,$ece="s") {
		$ci =& get_instance();
		$class = $ci->db->query($sql);
		if($ece=="s"){
		$classs = $class->row();
		}else{$classs = $class->result();}
		return $classs;
}

function fetchData($tableName,$extra='')
	  {
	$sql="select * from $tableName where status='A'";
		if ($extra != '') {
			$sql .=  $extra;
		}
	//$res=mysql_query($sql) or die(mysql_error());
	//$line=mysql_fetch_array($res);
	return $line;
}


function words_repues($num)
{ 
  $numberF=$num;
   $action34=explode(".",$numberF);
   $balance10=$action34[0];
   $balance11=$action34[1];
   $no = $balance10;
   $point = $balance11;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? '' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    " " . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
   strtoupper($result . "Rupees " . $points . " Paise");
      $grandexplode=number_format((float)$num, 2, '.', '');
 	  $action23=explode(".",$grandexplode);
	  $groundA=$action23[0];
	  $groundV=$action23[1];	
	if($groundV >=1 ){
	$goundStr=strtoupper($result . "Rupees and" . $points . " Paise");
			
	}else{
		  $goundStr=strtoupper($result . "Rupees");
	}	
	 return $goundStr;
	}
	
function amount($price,$type,$per){
 $tol=($per * $price)/100;
if($type=='billaddition'){
return $price+$tol;
}elseif($type=='billsubtraction'){
return $price-$tol;}else{return $price;}
}

function ageing($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    $now             = time();
    $unix_date         = strtotime($date);
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }
    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "Old";
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if($difference != 1) {
        $periods[$j].= "s";
    }
    return "$difference $periods[$j] {$tense}";
}

?>