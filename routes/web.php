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
Route::get('/back_end', function () {
    return view('welcome');
});


Route::get('/', 'VisitorController@main');
Route::get('/hehe', 'VerifyController@test');


Auth::routes();


Route::get('application/create', 'ApplicationController@create');
Route::get('application/set_start_time', 'ApplicationController@set_start_time');
Route::post('application/send_phone_code', 'ApplicationController@send_code');
Route::post('application/intermediate', 'ApplicationController@intermediate');
Route::post('application/store', 'ApplicationController@store');
Route::get('application/next', 'ApplicationController@next');
Route::get('faq', 'VisitorController@faq');
Route::get('main', 'VisitorController@main');
Route::get('contact', 'VisitorController@contact');
Route::get('policy', 'VisitorController@policy');
Route::get('credit_guide', 'VisitorController@credit_guide');
Route::get('resolution', 'VisitorController@resolution');
Route::get('privacy', 'VisitorController@privacy');
Route::get('personal-detail', 'VisitorController@personal_info')->middleware('auth');
Route::post('personal-upload', 'VisitorController@upload_id')->middleware('auth');
Route::get('/documents',"VisitorController@documents")->middleware('auth');

//Route::get('personal-app/{id}', 'VisitorController@personal_app')->middleware('auth');




Route::get('application/all', 'ApplicationController@index')->middleware('admin');
Route::get('excel/upload', 'ApplicationController@upload_view')->middleware('admin');
Route::post('excel/upload/process', 'ApplicationController@parseImport')->middleware('admin');
Route::get('application/export', 'ApplicationController@export')->middleware('admin');
Route::post('application/get_app_by_date', 'ApplicationController@filterApplication')->middleware('admin');
Route::get('application/detail/{id}', 'ApplicationController@detail')->middleware('admin');
Route::get('content/', 'ContentController@create')->middleware('admin');
Route::get('download_record/{id}', 'ApplicationController@downloadPDF');
Route::patch('content/store', 'ContentController@store')->middleware('admin');
Route::patch('application/update/{id}', 'ApplicationController@update')->middleware('admin');

Route::post('send_info', 'VisitorController@send_info');
Route::post('go_to_app', 'VisitorController@go_to_app');

Route::post('application/generateContract/{id}', 'ApplicationController@generatePDF');
Route::post('contract', 'ApplicationController@contract');

Route::resource('feedback','FeedbackController');
Route::resource('verify','VerifyController');




Route::get('system/dashboard','SystemController@dashboard')->middleware('admin');

Route::post('system/add_loans','VerifyController@add_loans')->middleware('admin');
Route::post('system/remove_loans','VerifyController@remove_loans')->middleware('admin');


Route::get('system/customer','UserController@index')->middleware('admin');
Route::get('system/application_list','SystemController@application_list')->middleware('admin');
Route::get('system/application_detail/{id}','SystemController@application_detail')->middleware('admin');
Route::get('system/application_status/{status}','SystemController@get_application_by_status')->middleware('admin');

Route::post('system/search_application','SystemController@application_search')->middleware('admin');

Route::get('system/verify_detail/{id}','VerifyController@verify_detail')->middleware('admin');
Route::post('system/verify/change_verify_reference','VerifyController@change_verify_reference')->middleware('admin');

Route::get('system/repayments/','RepaymentController@index')->middleware('admin');

Route::patch('system/update_verify/{id}','VerifyController@update')->middleware('admin');
Route::get('system/create_debit/{id}','RepaymentController@create_direct_debit')->middleware('admin');
Route::get('system/add_repayments/{id}','RepaymentController@create_payments')->middleware('admin');
Route::post('system/repayments_create/','RepaymentController@add_payments')->middleware('admin');
Route::get('system/edit_repayments/{id}','RepaymentController@edit_repayment')->middleware('admin');
Route::get('system/delete_repayments/{id}','RepaymentController@delete_repayment')->middleware('admin');
Route::post('system/change_repayment','RepaymentController@change_repayment')->middleware('admin');

Route::post('system/task_save','TaskController@store')->middleware('admin');
Route::post('system/get_task_by_date','TaskController@get_task_by_date')->middleware('admin');

Route::get('system/customer_detail/{id}','UserController@detail')->middleware('admin');
Route::post('system/verify/change_user_status','UserController@change_user_info')->middleware('admin');

Route::get('system/download_contract/{id}','SystemController@generate_final_contract')->middleware('admin');


//Route::post('system/change_status','UserController@change_status')->middleware('admin');
//Route::post('system/change_desirable','UserController@change_desirable')->middleware('admin');

Route::resource('blacklist','BlacklistController')->middleware('admin');



