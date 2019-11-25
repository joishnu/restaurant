<?php
	function sendsms($mobileno,$textmessage, $return = '0')
	{
		$source 		= 'MAHWUM';
		$sender 		= 'MAHWUM'; 
		$smsGatewayUrl 	= 'https://instantalerts.co';
		$apikey = '602025n746bm1u79i0229uzoe4ddoj6s0';
		$textmessage = urlencode($textmessage);
		//$textmessage=urlencode("Hi this is a test message");
		$api_element = '/api/web/send/';
		$api_params = $api_element.'?apikey='.$apikey.'&sender='.$sender.'&to='.$mobileno.'&message='.$textmessage;
		$smsgatewaydata = $smsGatewayUrl.$api_params;
		$url = $smsgatewaydata;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$output = curl_exec($ch);
		curl_close($ch);
		print_r($output);
		if(!$output){ $output = file_get_contents($smsgatewaydata); }
		if($return == '1'){ return $output; }else{  }
	}
?>