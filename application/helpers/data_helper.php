<?php
	function this() {
		$ci = &get_instance();

		return $ci;
	}

	function userSession($session_data = "") {
		if (!empty($session_data)) {
			return this()->session->userdata($session_data);
		}
	}

	function stringTruncate($string, $len) {
		$string = strip_tags($string);
		$tail 	= max(0, $len-10);
		$trunk 	= substr($string, 0, $tail);
		$trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($string, $tail, $len-$tail))));

		return $trunk;
	}

	function idDate($date, $short=''){  
		if ($short) {
		$BulanIndo = array("Jan", "Feb", "Mar",  
							   "Apr", "Mei", "Jun",  
							   "Jul", "Agu", "Sep",  
							   "Okt", "Nov", "Des"); 
		} else {
		$BulanIndo = array("Januari", "Februari", "Maret",  
							   "April", "Mei", "Juni",  
							   "Juli", "Agustus", "September",  
							   "Oktober", "November", "Desember"); 
		}  
		$tahun = substr($date, 0, 4);  
		$bulan = substr($date, 5, 2);  
		$tgl   = substr($date, 8, 2);  
			  
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;       
		return($result);  
	}
?>