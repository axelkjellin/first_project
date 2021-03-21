<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Student;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'UserController@register');

Route::post('/login', function (Request $request) {
    $data = $request->all();

    $validator = Validator::make($data, [
        'email' => 'required',
        'password' => 'required'
    ]);

    if($validator->fails()){
        return $validator->errors();
    }

    if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
        $user = auth()->user();
        $user->token = $user->createToken($user->email)->accessToken;
        return $user;
    }
});


Route::resource('/student', 'StudentController')->middleware('auth:api');
Route::resource('/classes', 'StudentsClassController')->middleware('auth:api');