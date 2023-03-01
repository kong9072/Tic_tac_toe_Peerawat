<?php
function urllink($content='') {
	$content = preg_replace('#(((https?://)|(w{3}\.))+[a-zA-Z0-9&;\#\.\?=_/-]+\.([a-z]{2,4})([a-zA-Z0-9&;\#\.\?=_/-]+))#i', '<a href="$0" target="_blank">$0</a>', $content);
	// Si on capte un lien tel que www.test.com, il faut rajouter le http://
	if(preg_match('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', $content)) {
		$content = preg_replace('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', '<a href="http://www.$1" target="_blank">www.$1</a>', $content);
		//preg_replace('#<a href="www\.(.+)">#i', '<a href="http://$0">$0</a>', $content);
	}

	$content = stripslashes($content);
	return $content;
}

function err($errmsg, $div){
				echo "<script>window.parent.document.getElementById('".$div."').innerHTML = '".$errmsg."';</script>";
				//alert($errmsg);
				exit();
   }

function getBrowser()
{
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

function no_time($dte){ //แปลงวันที่เป็นตัวเลข
	$no = str_replace("-","",$dte);
	$no = str_replace(" ","",$no);
	$no = str_replace(":","",$no);
	return $no;
}

function txt_time($no){ //แปลงตัวเลขเป็นวันที่
	$txt1 = substr($no,0,4);
	$txt2 = substr($no,4,2);
	$txt3 = substr($no,6,2);
	$txt4 = substr($no,8,2);
	$txt5 = substr($no,10,2);
	$txt6 = substr($no,12,2);
	return $txt1."-".$txt2."-".$txt3." ".$txt4.":".$txt5.":".$txt6;
}

function widgets_source($url) {
		if($fp = file($url)) {
			return implode("", $fp);
		} else {
			return false;
		}
	}


function showframe($img,$w,$h){
	echo '<iframe id="showfrm" name="showfrm" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto" width="'.$w.'" height="'.$h.'" src="'.$img.'"></iframe>';
}

function showflash($img,$w,$h){
		echo '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="'.$w.'" height="'.$h.'">
	  <param name="movie" value="'.$img.'" />
	  <param name="quality" value="high" />
	  <embed src="'.$img.'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'.$w.'" height="'.$h.'"></embed>
	</object>';
}

function showyoutube($img,$w,$h,$auto){
						$embedname = $img;
						  // หา ID
						  $sems = 0;
						  $sem = strpos($embedname,"?v=");
						  if($sem>0) $sems = $sem+3;
						  $lems = strlen($embedname)-$sems;
						  $lem = strpos($embedname,"&feature");
						  if($lem==0) $lem = strpos($embedname,"&list");
						  if($lem>0) $lems = $lem - $sems;
						  $embed = substr($embedname,$sems,$lems);
						echo '<object id="ytPlayer" style="height:'.$h.'; width:'.$w.'">
							<param name="movie" value="http://www.youtube.com/v/'.$embed.'?version=3&enablejsapi=1&modestbranding=1&autoplay='.$auto.'">
							<param name="allowScriptAccess" value="always">
							<param name="wmode" value="transparent">
							<embed id="ytplayer" src="http://www.youtube.com/v/'.$embed.'?version=3&enablejsapi=1&modestbranding=1&autoplay='.$auto.'" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" wmode="transparent" height="'.$h.'" width="'.$w.'">
						</object>';
}

function imgYoutube($embedname, $w){
											  // หา ID
											  $sems = 0;
											  $sem = strpos($embedname,"?v=");
											  if($sem>0) $sems = $sem+3;
											  $lems = strlen($embedname)-$sems;
											  $lem = strpos($embedname,"&feature");
											  if($lem==0) $lem = strpos($embedname,"&list");
											  if($lem>0) $lems = $lem - $sems;
											  $p_embed = substr($embedname,$sems,$lems);
											  //list($width,$height)=getimagesize("http://img.youtube.com/vi/".$p_embed."/2.jpg");
											  //list($width,$height)=getimagesize("http://i4.ytimg.com/vi/".$p_embed."/default.jpg");
											  //if($width>0){
												//$img = "http://img.youtube.com/vi/".$p_embed."/2.jpg";
												$img = "http://i4.ytimg.com/vi/".$p_embed."/default.jpg";
												list($width,$height)=getimagesize($img);
												if($width>10){
													$img = "<img src=\"".$img."\" width=\"".$w."\" border=\"0\">";
												} else {
													$img = "<img src=\"images/videotitle.png\" width=\"".$w."\" border=\"0\">";
												}
											  echo $img;
}

function addspaces( $str ) { // ให้มีเว้นวรรคตามจำนวนเคาะ
	$str = str_replace( ' ', '&nbsp; ', $str );
	return $str;
}

function format_bytes($size) {
    $units = array(' B', ' KB', ' MB', ' GB', ' TB');
    for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
    return round($size, 2).$units[$i];
}

function date2number($en){
	list($y,$m,$d) = explode("-", $en);
	$nnn = $y.$m.$d;
	return $nnn;
}

function max_arr($arr) { //หาค่าสูงสุดใน array
	$countMem = count($arr);
	$max = 0;
	for ($i = 0; $i < $countMem; $i++) {
	if ($arr[$i] > $max) {
	$max = $arr[$i];
	}
	}
	return $max;
}

function datetime($tm, $n){
	if($n==0){
		return (db2date(substr($tm,0,10)) ." ". substr($tm,11,8));
	} elseif($n==1){
		return (db2date(substr($tm,0,10)));
	} else {
		return (substr($tm,11,8));
	}
}

function getNewNo($no,$len){ // สร้างรหัส ตามจำนวนอักษร
	$no = $no+1;
	for($i=0;$i<$len;$i++){
		if(strlen($no)<$len){ $no = "0". $no; }
	}
	return ($no);
}

function get_number($no,$len){ // สร้างรหัส ตามจำนวนอักษร
	for($i=0;$i<$len;$i++){
		if(strlen($no)<$len){ $no = "0". $no; }
	}
	return ($no);
}

function CheckRude($temp){
		$wordrude = array(
		"ashole","a s h o l e","a.s.h.o.l.e","bitch","b i t c h","b.i.t.c.h","shit","s h i t","s.h.i.t","fuck",
		"dick","f u c k","d i c k","f.u.c.k","d.i.c.k","มึง","มึ ง","กู","ควย","ค ว ย","ค.ว.ย",
		"คอ วอ ยอ","คอ-วอ-ยอ","ปี้","เหี้ย","เฮี้ย","ชาติหมา","ชาดหมา","ช า ด ห ม า","ช.า.ด.ห.ม.า","ช า ติ ห ม า",
		"ช.า.ติ.ห.ม.า","ไอ้","สัดหมา","สัด","เย็ด","หี","สันดาน","แม่ง","ระยำ","ส้นตีน","แตด") ;
		$wordchange = ("<font color=red>...</font>") ;

		for ( $i=0 ; $i<sizeof($wordrude) ; $i++ ){
			$temp = eregi_replace ($wordrude[$i] ,$wordchange ,$temp);
		}
		return ( $temp ) ;
}

function rand_txt($len)
{
					srand((double)microtime()*10000000);
					$chars = "ABCDEFGHJKLMNPQRSTUVWXYZ0123456789";
					$ret_str = "";
					$num = strlen($chars);
					for($i = 0; $i < $len; $i++)
					{
						$ret_str.= $chars[rand()%$num];
						$ret_str.="";
					}
					return $ret_str;
}

function rand_int($len)
{
					srand((double)microtime()*10000000);
					$chars = "0123456789";
					$ret_str = "";
					$num = strlen($chars);
					for($i = 0; $i < $len; $i++)
					{
						$ret_str.= $chars[rand()%$num];
						$ret_str.="";
					}
					return $ret_str;
}

function gotos($url,$sec) {
	echo "<meta http-equiv=\"refresh\" content=\"$sec; URL=$url\">";
}

function alert($msg) {
	echo "<script>alert(\"$msg\");</script>";
}

function popupWin($Url,$namewin,$setwin) {
	echo "<script language=\"javascript\" type=\"text/javascript\">window.open('$Url','$namewin','$setwin');</script>";
}

function Ages($birthdate){
	list($by,$bm,$bd) = explode("-", $birthdate);
	  list($ny,$nm,$nd) = explode("-", date("Y-m-d"));
	  $mk1= mktime(0,0,0,$bm,$bd,$by);
	  $mk2= mktime(0,0,0,$nm,$nd,$ny);
	  $dff=$mk2-$mk1; // เอาค่าที่ได้จาก $mktime1 และ 2 มาลบ กัน
	  $today = getdate($dff); // แปลง ค่าที่ได้กลับไป อยู่ ในรูป วดป.
	  $month = $today['mon'];
	  $mday = $today['mday'];
	  $year = $today['year'];
	  $yy=$year-1970; //เอาปีทีไ่ด้ มา ลบ ด้วย 1970 (ซึ่งเป็นค่าเริ่มต้นของ ของ function นั้น
	  $mm=$month-1; // ก็เช่นเดียวกัน
	  $dd=$mday-1; // ก็เช่นเดียวกัน
	  return ("อายุ $yy &nbsp; ปี &nbsp; $mm &nbsp; เดือน &nbsp; $dd &nbsp; วัน");
 }

function sumtime($xTime,$yTime){ // Y-m-d H:i:s
   $xTime=strtotime($xTime);
   $yTime=strtotime($yTime);
   $totalSecTime = $yTime - $xTime;
   if($totalSecTime < 0 ){
     return '00:00:00';
   }else{
   $hh = substr("00".floor($totalSecTime / 3600),-2) ;
   $tmpMin = $totalSecTime % 3600;
   $mm = substr("00".floor($tmpMin / 60),-2) ;
   $tmpSec = substr("00".($tmpMin % 60),-2);
   return $hh.":".$mm.":".$tmpSec;
   }
}

function S2Time($s) {
	$hh = substr("00".floor($s / 3600),-2) ;
	$tmpMin = $s % 3600;
    $mm = substr("00".floor($tmpMin / 60),-2) ;
    $tmpSec = substr("00".($tmpMin % 60),-2);
    return $hh.":".$mm.":".$tmpSec;
}

function Timethai($temp) {
	// format dd/mm/yyyy
	list($H, $s, $ss) = explode(":", $temp);
	//$yyyy = $yyyy-543;
	$temp = "$H:$s".' น.';
	return($temp);
}
function date2db($temp) {
	// format dd/mm/yyyy
	list($dd, $mm, $yyyy) = explode("/", $temp);
	//$yyyy = $yyyy-543;
	$temp = "$yyyy-$mm-$dd";
	return($temp);
}

function date2stamp($temp) {
	// format dd/mm/yyyy
	list($dd, $mm, $yyyy) = explode("/", $temp);
	//$yyyy -= 543;
	$temp=mktime(0,0,0,$mm,$dd,$yyyy);
	return($temp);
}

function db2date($temp) {
	// format yyyy-mm-dd
	list($yyyy, $mm, $dd) = explode("-", $temp);
	//$yyyy = $yyyy+543;
	$temp = "$dd/$mm/$yyyy";
	$tts = $yyyy.$mm.$dd;
	$tts = $tts+0;
	if($tts<20151201) { $temp=""; }
	return($temp);
}

function db2thaidate($temp) {
	// format yyyy-mm-dd
	list($yyyy, $mm, $dd) = explode("-", $temp);
	$yyyy = $yyyy+543;
	$temp = "$dd/$mm/$yyyy";
	$tts = $yyyy.$mm.$dd;
	$tts = $tts+0;
	if($tts<20581201) { $temp=""; }
	return($temp);
}
function db2Calendar($temp) {
	list($yyyy, $mm, $dd) = explode("-", $temp);
	$temp = "$yyyy, $mm, $dd";
	$tts = $yyyy.$mm.$dd;
	return($temp);
}
function nextDay($dt,$ct){
	$ct = $ct+0;
	list($y, $m, $d) = explode("-", $dt);
	$newdate = date(mktime(0, 0, 0, $m, $d+$ct, $y));
	$newdate = date("Y-m-d", $newdate);
	return($newdate);
}

function prevDay($dt,$ct){
	$ct = $ct+0;
	list($y, $m, $d) = explode("-", $dt);
	$newdate = date(mktime(0, 0, 0, $m, $d-$ct, $y));
	$newdate = date("Y-m-d", $newdate);
	return($newdate);
}

function filesize_format($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}

function convert($number){
$txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
$number = str_replace(",","",$number);
$number = str_replace(" ","",$number);
$number = str_replace("บาท","",$number);
$number = explode(".",$number);
if(sizeof($number)>2){
return 'ทศนิยมหลายตัวนะจ๊ะ';
exit;
}
$strlen = strlen($number[0]);
$convert = '';
for($i=0;$i<$strlen;$i++){
$n = substr($number[0], $i,1);
if($n!=0){
if($i==($strlen-1) AND $n==1){
$convert .= 'เอ็ด';
}
else{
$convert .= $txtnum1[$n];
}
$convert .= $txtnum2[$strlen-$i-1];
}
}
$convert .= 'บาท';
if($number[1]=='0' OR $number[1]=='00' ){
$convert .= 'ถ้วน';
}
else{
$strlen = strlen($number[1]);
for($i=0;$i<$strlen;$i++){
$n = substr($number[1], $i,1);
if($n!=0){
$convert .= $txtnum1[$n];
$convert .= $txtnum2[$strlen-$i-1];
}
}
//$convert .= 'สตางค์';
$convert .= '';
}
$convert = str_replace("หนึ่งสิบ", "สิบ", $convert);
$convert = str_replace("สองสิบ", "ยี่สิบ", $convert);
return $convert;
}

function thaiText($number){
	$number = number_format($number, 2, '.', '');
	$numberx = $number;
	$txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ'); 
	$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน'); 
	$number = str_replace(",","",$number); 
	$number = str_replace(" ","",$number); 
	$number = str_replace("บาท","",$number); 
	$number = explode(".",$number); 
	if(sizeof($number)>2){ 
	return 'ทศนิยมหลายตัวนะจ๊ะ'; 
	exit; 
	} 
	$strlen = strlen($number[0]); 
	$convert = ''; 
	for($i=0;$i<$strlen;$i++){ 
		$n = substr($number[0], $i,1); 
		if($n!=0){ 
			if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; } 
			elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; } 
			elseif($i==($strlen-2) AND $n==1){ $convert .= ''; } 
			else{ $convert .= $txtnum1[$n]; } 
			$convert .= $txtnum2[$strlen-$i-1]; 
		} 
	} 
	
	$convert .= 'บาท'; 
	if($number[1]=='0' OR $number[1]=='00' OR 
	$number[1]==''){ 
	$convert .= 'ถ้วน'; 
	}else{ 
	$strlen = strlen($number[1]); 
	for($i=0;$i<$strlen;$i++){ 
	$n = substr($number[1], $i,1); 
		if($n!=0){ 
		if($i==($strlen-1) AND $n==1){$convert 
		.= 'เอ็ด';} 
		elseif($i==($strlen-2) AND 
		$n==2){$convert .= 'ยี่';} 
		elseif($i==($strlen-2) AND 
		$n==1){$convert .= '';} 
		else{ $convert .= $txtnum1[$n];} 
		$convert .= $txtnum2[$strlen-$i-1]; 
		} 
	} 
	$convert .= 'สตางค์'; 
	}
	//แก้ต่ำกว่า 1 บาท ให้แสดงคำว่าศูนย์ แก้ ศูนย์บาท
	if($numberx < 1)
	{
		$convert = "ศูนย์" .  $convert;
	}
	
	//แก้เอ็ดสตางค์
	$len = strlen($numberx);
	$lendot1 = $len - 2;
	$lendot2 = $len - 1;
	if(($numberx[$lendot1] == 0) && ($numberx[$lendot2] == 1))
	{
		$convert = substr($convert,0,-10);
		$convert = $convert . "หนึ่งสตางค์";
	}
	
	//แก้เอ็ดบาท สำหรับค่า 1-1.99
	if($numberx >= 1)
	{
		if($numberx < 2)
		{
			$convert = substr($convert,4);
			$convert = "หนึ่ง" .  $convert;
		}
	}
	return $convert; 
	}

// XMLHTTP

//================== 21/7/2016 =======================================
	function fb_thaidate($timestamp){
		$diff = time() - $timestamp;
		$periods = array("วินาที", "นาที", "ชั่วโมง");
		$words="ที่แล้ว";

		if($diff<60){
			$i=0;
			$diff=($diff==1)?"":$diff;
			$text = "$diff $periods[$i]$words";

		}elseif($diff<3600){
			$i=1;
			$diff=round($diff/60);
			$diff=($diff==3 || $diff==4)?"":$diff;
			$text = "$diff $periods[$i]$words";

		}elseif($diff<86400){
			$i=2;
			$diff=round($diff/3600);
			$diff=($diff != 1)?$diff:"" . $diff ;
			$text = "$diff $periods[$i]$words";

		}elseif($diff<172800){
			$diff=round($diff/86400);
			$text = "$diff วันที่แล้ว เมื่อเวลา " .date("g:i a",$timestamp);

		}else{

			$thMonth = array("ม.ค.","ก.พ.","มี.ค.","ม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
			$date = date("j", $timestamp);
			$month = $thMonth[date("m", $timestamp)-1];
			$y = date("Y", $timestamp)+543;
			$t1 = "$date  $month  $y";
			$t2 = "$date  $month  ";

			if($timestamp<strtotime(date("Y-01-01 00:00:00"))){
				$text = "เมื่อวันที่ " . $t1. " เวลา " . date("G:i",$timestamp) . " น.";
			}else{
				$text = "เมื่อวันที่ " . $t2 . " เวลา " . date("G:i",$timestamp) . " น.";
			}
		}
		return $text;
	}

//================== 15/2/2018 =======================================
	function fb_thaidateTh($temp){
	   
		list($yyyy, $mm, $dd) = explode("-", $temp);
		 if($dd<'10'){
			$date_all=substr($dd,1);
		}else{
			$date_all=$dd;
		}
		$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม", "พฤศจิกายน","ธันวาคม");
		$month =  $thaimonth[$mm-1];
		$yyyy = $yyyy+543;
		$temp = 'วันที่ '.$date_all.' เดือน '.$month.' พ.ศ.' .$yyyy;
		$tts = $yyyy.$month.$date_all;
		return($temp);
	}
	function monthTh($temp){
	   
		list($mm,$yyyy) = explode("-", $temp);
		$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม", "พฤศจิกายน","ธันวาคม");
		$month =  $thaimonth[$mm-1];
		$yyyy = $yyyy;
		$temp = $month.' ' .$yyyy;
		$tts = $month.$yyyy;
		return($temp);
	}
	function fb_thaidateEn($temp){
	   
		list($yyyy, $mm, $dd) = explode("-", $temp);
		 if($dd<'10'){
			$date_all=substr($dd,1);
		}else{
			$date_all=$dd;
		}
		$thaimonth=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct", "Nov","Dec");
		$month =  $thaimonth[$mm-1];
		$yy = $yyyy+543;

		$temp = $date_all.'-'.$month.'-' .substr($yy,-2);
		$tts = $yy.$month.$date_all;
		return($temp);
	}

	///UPDATE 2020-04-17 นับวัน
	function getNumDay($d1,$d2){
		$dArr1    = preg_split("/-/", $d1);
		list($year1, $month1, $day1) = $dArr1;
		$Day1 =  mktime(0,0,0,$month1,$day1,$year1);
		 
		$dArr2    = preg_split("/-/", $d2);
		list($year2, $month2, $day2) = $dArr2;
		$Day2 =  mktime(0,0,0,$month2,$day2,$year2);
		 
		return round(abs( $Day2 - $Day1 ) / 86400 )+1;
    }
    function DateTH29Feb($date){
        if($date!='0000-00-00' AND $date!='') {
            if(substr($date,5)=='02-29'){
                $Date_ON = date('29-02-Y', strtotime('+543 year', strtotime($date)));
            }else{
                $Date_ON = date('d-m-Y', strtotime('+543 year', strtotime($date)));
            }
        }else{ $Date_ON = null; }
        return $Date_ON;
    }
    function DateTHsave($date){    
        $day = substr($date,0,2);
        $month = substr($date,3,2);
        $year = substr($date,6,4);
        $yearTH = $year - 543;
        $dateEN = $yearTH.'-'.$month.'-'.$day;
        if($date!=''){ return $dateEN; }
        return null;
    }
   
?>
