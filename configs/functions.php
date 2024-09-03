<?php
//bd date pattern
function serverdate2bddate($serverdate){

        $originalDate = $serverdate; 
        $timestamp = strtotime($originalDate);
        $formattedDate = date('d-m-Y', $timestamp);
        return $formattedDate;
	}


function dv_slug($string) {
	$string = str_replace('&','and',$string); // Replace & to and
	$string = str_replace('+','plus',$string); //Replace + to plus
	$string = str_replace('.', '-', $string); // Replaces all spaces with hyphens.
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	$string=preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	$string=strtolower($string);
	return $string;
}


//getting record
function get_info($table,$info,$condition) {
		global $con;
		$q	=	mysqli_query($con,"SELECT $info FROM $table $condition");
		$r	=	mysqli_fetch_array($q);
		$result = stripslashes($r[0]);
		return $result;
	}

//Count rows
function get_total($table,$info,$condition) {
global $con;
	
		$q	=	mysqli_query($con,"SELECT $info FROM $table $condition");
		$r	=	mysqli_num_rows($q);
		return $r;
	}

function get_sum($table, $field,$condition){
global $con;

$q	=	mysqli_query($con,"SELECT sum($field) AS total FROM $table $condition");
$r	=	mysqli_fetch_array($q);
$total=$r['total'];
return $total;
}




//comma after 3 digit to bd format
function number_format_bd($number){

$length = strlen($number);
if($length<4){$n=$number; return $n;}
elseif($length==4){
	$n = substr_replace($number, ",", 1).substr($number, 1);
	return $n;
}

elseif($length==5){
	$n = substr_replace($number, ",", 2).substr($number, 2);
	return $n;
}

// 1 lakh
elseif($length==6){
	$n = substr_replace($number, ",", 1).substr($number, 1,2).",".substr($number, 3);
	return $n;
}

// 10 lakh
elseif($length==7){
	$n = substr_replace($number, ",", 2).substr($number, 2,2).",".substr($number, 4);
	return $n;
}

// 1crore
elseif($length==8){
	$n = substr_replace($number, ",", 1).substr($number, 1,2).",".substr($number, 3,2).",".substr($number, 5);
	return $n;
}

// 10crore
elseif($length==9){
	$n = substr_replace($number, ",", 2).substr($number, 2,2).",".substr($number, 4,2).",".substr($number, 6);
	return $n;
}


}//end number_format_bd()



function get_url() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}


?>