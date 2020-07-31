<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'Main@main');

Route::get('/sub/company', 'Sub@company');
Route::get('/sub/business', 'Sub@business');
Route::get('/sub/equipment', 'Sub@equipment');
Route::get('/sub/product/label', 'Sub@product');
Route::get('/sub/product/pouch', 'Sub@product');
Route::get('/sub/product_view', 'Sub@product_view');
Route::get('/sub/notice1', 'Sub@notice');
Route::get('/sub/inquiry1', 'Sub@notice');
Route::get('/sub/inquiry2', 'Sub@notice');
Route::get('/sub/notice2', 'Sub@notice');
Route::get('/sub/notice_write', 'Sub@notice_write');
Route::get('/sub/notice_view', 'Sub@notice_view');

Route::get('/ey_admin/priority_change', 'Ey_admin@priority_change');
//Route::get('/ey_admin/acc', 'Ey_admin@ey_acc');
Route::post('/file_upload', 'Ey_admin@file_upload');

Route::get('/ey_admin/acc/write_board_form', 'Ey_admin@write_board_form');

Route::get('/ey_admin/login', 'Ey_admin@ey_login');
Route::post('/ey_admin/login_action', 'Ey_admin@ey_login_action');

Route::get('/ey_admin/pcslider', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/pcslider/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/pcslider/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/pcslider/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/pcslider/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/popup', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/popup/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/popup/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/popup/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/popup/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/section', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/section/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/section/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/section/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/section/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/label', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/label/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/label/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/label/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/label/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/pouch', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/pouch/control', 'Ey_admin@ey_control');
Route::get('/ey_admin/pouch/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/pouch/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/pouch/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/inquiry', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/inquiry/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/inquiry/control_file', 'Ey_admin@ey_control_file');
Route::get('/ey_admin/inquiry/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/inquiry/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/inquiry/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/notice', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/notice/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/notice/control_file', 'Ey_admin@ey_control_file');
Route::get('/ey_admin/notice/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/notice/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/notice/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/equipment', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/equipment/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/equipment/control_file', 'Ey_admin@ey_control_file');
Route::get('/ey_admin/equipment/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/equipment/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/equipment/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/sale_label', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/sale_label/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/sale_label/control_file', 'Ey_admin@ey_control_file');
Route::get('/ey_admin/sale_label/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/sale_label/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/sale_label/write_board_form/modify', 'Ey_admin@write_board_form');

Route::get('/ey_admin/sale_pouch', 'Ey_admin@ey_board_list');
Route::post('/ey_admin/sale_pouch/control', 'Ey_admin@ey_control');
Route::post('/ey_admin/sale_pouch/control_file', 'Ey_admin@ey_control_file');
Route::get('/ey_admin/sale_pouch/write_board_form', 'Ey_admin@write_board_form');
Route::post('/ey_admin/sale_pouch/write_board_action', 'Ey_admin@write_board_action');
Route::get('/ey_admin/sale_pouch/write_board_form/modify', 'Ey_admin@write_board_form');

//Route::get('/ey_admin/beds', 'Ey_admin@ey_press');
//Route::get('/ey_admin/media', 'Ey_admin@ey_media');

Route::get('/ey_admin/moslider', 'Ey_admin@ey_moslider');
Route::get('/ey_admin/pcpopup', 'Ey_admin@ey_pcpopup');
Route::get('/ey_admin/mopopup', 'Ey_admin@ey_mopopup');
//Route::get('/ey_admin/acc', 'Ey_admin@ey_acc');
Route::get('/ey_admin/logout', 'Ey_admin@ey_logout');
