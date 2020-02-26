<?php

    function human_file_size($bytes, $decimals = 2)
    {
        
		return \App\User::first();
		
    }
	
	function hsize()
    {
        return $user_otp = DB::table('users_otp')
			->where('id', '1')->get();
 	}
	
	function checkIfUserRegistered($value,$field='phone')
	{
		if($field=='email')
			$where=['email','=', $value];
		else
			$where=['phone','=', $value];
			
		$user=\App\User::where([
			$where
		])->first();
		return $user;
	}
	
	
	
	//START
	function userLoggedin()
	{
		$user=false;
		if(\Session::get('logData'))
			$user=true;
		return $user;	
	}
	
	function userTypeList()
	{
		return [
			'1'=>'Admin',
			'2'=>'Lawyer',
			'3'=>'Clerk',
			'4'=>'Client'
		];
	}
	
	function generateOTP()
	{
		return MD5(1234);
	}
	
	function expireOTP_time()
	{
		return 1;
	}
	
	function encodeData($phone)
	{
		return urlencode(base64_encode(json_encode($phone)));
	}
	
	function decodeData($phone)
	{
		return json_decode(base64_decode(urldecode($phone)));
	}
	
	function minutesDifference($startdate,$enddate)
	{
		$starttimestamp = strtotime($startdate);
		$endtimestamp = strtotime($enddate);
		return $difference = abs($endtimestamp - $starttimestamp)/(60);
	}
	
	function add_remember_cookie($cookieemail,$cookieuserid)
	{
		DB::table('remember_cookies')->insert(
    	['user_id' => $cookieuserid,'cookie_name' => $cookieemail]
		);
	}
	
	function delete_remember_cookie($cookieuserid)
	{
		DB::table('remember_cookies')->where('user_id',$cookieuserid)->delete();
	}
	
	function remember_cookie_check($cookie1)
	{
		$return=false;
		$cookieCount= DB::table('remember_cookies')
			->where('cookie_name', $cookie1)->count();
			
		if($cookieCount>0)
			$return=true;
		return $return;
	}
	
	function remember_cookie2_check($cookie2)
	{
		$return=false;
		$user=\App\User::where([
			['id','=', $cookie2]
		])->first();
		if(!empty($user))
			$return=$user;
			
		return $return;
	}
 
