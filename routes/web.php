<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if(empty(\Session::get('logData')))
	{
		/*$cookieEmail = Cookie::get('email');
		$cookieUserid = Cookie::get('userid');
		if(isset($cookieEmail) && isset($cookieUserid))
		{
			$usercookie=remember_cookie_check($cookie1);
			if($usercookie)
				{
					$usercookieData=remember_cookie2_check($cookieUserid);
					if($usercookieData)
					{
					  session(['logData' => ['id'=>$usercookieData->id]]);
					  
					  return redirect('/account');
					}
				}
		}*/
    	//return view('login');
		return view('login');
	}
	else
		return redirect('/account');
});

Route::get('/logout', function () {
	//$userSession= \Session::get('logData');
	
	/*delete_remember_cookie($userSession['id']);
	Cookie::queue(Cookie::forget('email'));
	Cookie::queue(Cookie::forget('userid'));*/
	
	\Session::flush();
	return redirect('/');
});


Route::post('/loginsubmit', 'Users@loginsubmit');

Route::post('/register/send_otp', 'Users@send_otp');
Route::post('/register/check_otp', 'Users@check_otp');
Route::post('/register/submit', 'Users@register_submit');
Route::get('/register',function(){
	if(!userLoggedin())	
		return view('register');
	else
	return redirect('/account');
});

Route::group(['middleware'=>['logCheck']],function(){
	Route::get('/account', 'Users@account');
});


//forgot password
Route::post('/forgotpassword/send_otp', 'Users@fp_send_otp');
Route::post('/forgotpassword/check_otp', 'Users@fp_check_otp');
Route::post('/forgotpassword/reset_pass', 'Users@fp_reset_pass');
//forgot password ENDS

Route::get('/login',function(){
	//return view('login_new');
	return view('login');
});









Route::get('/test',function(){
	//return json_decode(base64_decode(urldecode('IjU1NTUi')));
	//return view('/test');
	//$cookieEmail = Cookie::get('test_cookie');
	//return $cookieEmail;
	session(['logDatasss' => ['id'=>'5','value'=>'3344']]);
});

Route::get('/test2',function(){
	return view('test2');
	$sees= \Session::get('logDatasss');
	return $sees['id'];
});

Route::get('blade',function(){
	return view('template/blade');
	});
Route::get('comp',function(){
	return view('component/master');
	});
	
	
Route::get('comps',function(){
	return View::make('component/master');
	});

Route::get('/cookie', 'Users@create_cookie');
Route::get('/cookie_get', 'Users@read_cookie');
Route::get('/cookie_del', function(){
Cookie::queue(Cookie::forget('test_cookie'));
});
