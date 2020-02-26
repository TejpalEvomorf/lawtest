<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;use Cookie;
class Users extends Controller
{
    //
	
	function loginsubmit(Request $req)
	{
		$user=User::where([
			['phone','=', $req->phone],
			['password','=',MD5($req->password)]
		])->first();
		if($user)
		{
			$req->session()->put('logData',['id'=>$user->id]);
			
			//remember me starts
			/*if(isset($req->remember))
			{
				$cookieemail=md5($user->email);
				$cookieuserid=$user->id;
			
				Cookie::queue('email', $cookieemail, 24*7);
				Cookie::queue('userid', $cookieuserid, 24*7);
				delete_remember_cookie($cookieuserid);
				add_remember_cookie($cookieemail,$cookieuserid);
			}*/
			//remember me ends
		}
		else
		 return 'wrong_details';	
	}
	
	function send_otp(Request $req)
	{
		$user=checkIfUserRegistered($req->phone);
		if($user)
		{
			$result='error';
			$error='already_registered';
			$phone='';
		}
		else
		{
			$date=date('Y-m-d H:i:s');
			$data=$req->input();
			$otp=generateOTP();
			
			$result='success';
			$error='';
			$phone=encodeData($data['phone']);
			
			$user_otp = DB::table('users_otp')
			->where('phone', $data['phone'])->count();
			
			if($user_otp > 0)
			{
				DB::table('users_otp')
				->where('phone', $data['phone'])
				->update([
				'phone' => $data['phone'], 'otp' => $otp, 'verified' => '0', 
				'updated_at' => $date
				]);	
			}
			else
			{
				DB::table('users_otp')->insert([
				['phone' => $data['phone'], 'otp' => $otp, 'updated_at' => $date, 'created_at' => $date]
				]);
			}
		}
		
		return [
		'result'=>$result,
		'phone'=>$phone,
		'error'=>$error,
		];
	}
	
	function check_otp(Request $req)
	{
		$otp=MD5($req->otp);
		$phoneNo=decodeData($req->phone);
		$result='success';
		$error=$phone='';
		
		$user_otp = DB::table('users_otp')
			->where('phone', $phoneNo)->first();

		if($user_otp)
		{
			$date=date('Y-m-d H:i:s');
			$minDiff=minutesDifference($date,$user_otp->updated_at);
			if($minDiff > expireOTP_time())
			{
				$result='error';
				$error='expired_otp';
			}
			else
			{
				if($user_otp->otp !=$otp)
				{
					$result='error';
					$error='wrong_otp';
				}
				else
				{
					DB::table('users_otp')
					->where(['phone'=> $phoneNo,'otp'=>$otp])
					->update(['verified' => '1', 'updated_at' => $date]);
					$phone=encodeData($phoneNo.'-verified');
				}
			}
		}
		else
		{
			$result='error';
			$error='not_found';
		}
		
		return [
		'result'=>$result,
		'phone'=>$phone,
		'error'=>$error
		];
	}
	
	function register_submit(Request $req)
	{
		$phoneNo=str_replace('-verified','',decodeData($req->phone));
		$user_otp = DB::table('users_otp')->where(['phone'=> $phoneNo,'verified'=>'1'])->count();
		if($user_otp > 0)
		{
			$userPhone=checkIfUserRegistered($phoneNo);
			if($userPhone)
			{
				$result='error';
				$error='phone_already_registered';
			}
			else
			{
				$userEmail=checkIfUserRegistered($req->email,'email');
				if($userEmail)
				{
					$result='error';
					$error='email_already_registered';
				}
				else
				{
					$user= new User;
					$user->phone=$phoneNo;
					$user->password=MD5($req->password);
					$user->email=$req->email;
					$user->fname=$req->fname;
					$user->lname=$req->lname;
					$user->account_type=$req->account_type;
					$user->save();
					
					$result='success';
					$error='';
					
					$req->session()->put('logData',['id'=>$user->id]);
				}
			}
		}
		else
		{
			$result='error';
			$error='otp_not_verified';
		}
		
		return [
		'result'=>$result,
		'error'=>$error
		];
	}
	
	function fp_send_otp(Request $req)
	{
			$result='success';
			$error=$user_id='';
			
			if($req->form_fp_option=='1')
				$where=['phone','=', $req->phone];
			else
				$where=['email','=', $req->email];
			$user=User::where([
			$where
			])->first();
			
			if($user)
			{
				DB::table('user_otp_fp')->where('user_id',$user->id)->delete();
				
				$date=date('Y-m-d H:i:s');
				$otp=generateOTP();
				
				DB::table('user_otp_fp')->insert([
				['user_id' => $user->id, 'otp' => $otp, 'sent_on' =>$req->form_fp_option , 'date' => $date]
				]);
				
				$user_id=encodeData($user->id);
			}
			else
			{
				$result='error';
				$error='not_registered';
			}
			
			return [
				'result'=>$result,
				'user'=>$user_id,
				'error'=>$error,
			];
	}
	
	function fp_check_otp(Request $req)
	{
		$otp=MD5($req->otp);
		$userId=decodeData($req->user);
		$result='success';
		$error=$user_id='';
		
		$user_otp = DB::table('user_otp_fp')
			->where('user_id', $userId)->first();
		if($user_otp)
		{
			$date=date('Y-m-d H:i:s');
			$minDiff=minutesDifference($date,$user_otp->date);
			if($minDiff > expireOTP_time())
			{
				$result='error';
				$error='expired_otp';
			}
			else
			{
				if($user_otp->otp !=$otp)
				{
					$result='error';
					$error='wrong_otp';
				}
				else
					$user_id=encodeData($userId.'-verified');
			}
		}
		else
		{
			$result='error';
			$error='not_found';
		}
		
		return [
		'result'=>$result,
		'user'=>$user_id,
		'error'=>$error
		];
	}
	
	function fp_reset_pass(Request $req)
	{
		$userId=str_replace('-verified','',decodeData($req->user));
		
		$user = User::find($userId);
		$user->password = MD5($req->password);
		$user->save();
		
		$result='success';
		return [
		'result'=>$result
		];
	}
	
	function account(Request $req)
	{
		return view('account');
	}
	
	
	
	
	
	
	
	
	
	
	
	//Test functions below
	function create_cookie()
	{
		$minutes='500000000';
		$path='/';
		//$cookie = Cookie::make('test_cookie', 'cookie value', $minutes);
		
		
		Cookie::queue('test_cookie', 'cookie value', $minutes);
		return 'Cookie created';
	}
	
	function read_cookie()
	{
		$val = Cookie::get('test_cookie');
		$val2 = Cookie::get('test_cookiesss');
		if(isset($val2))
			echo 'val2 exist';
		else
			echo 'val2 not exist';
		return $val;
	}
}
