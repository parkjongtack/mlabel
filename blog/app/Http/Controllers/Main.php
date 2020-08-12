<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Classes\CommonFunction;
use App\Classes\PagingFunction;
use App\Admin;
use App\User;
use Auth;
use DB;
use App\Classes\jsonRPCClient;

class Main extends Controller
{

	public function main(Request $request) {

		$commons = new CommonFunction();

		$agent = $commons->getBrowser();
		$device = "";
		$walletSize = 0;
		$curreny_id = !$request->cu ? '' : $request->cu;
		
		if(stripos($agent['userAgent'], 'android-web-app') !== false) {
		   $device = 'Android';
		} else if(stripos($agent['userAgent'], 'Android') !== false) {
		   $device = 'Android';
		} else if(stripos($agent['userAgent'], 'iPhone') !== false) {
		   $device = 'iPhone';
		} else {
		   $device = 'browser';
		}
		// if(stripos($agent['userAgent'], 'android-web-app') !== false) {
		// 	$device = 'webapp';
		//  } else if(stripos($agent['userAgent'], 'Android') !== false) {
		// 	$device = 'Android';
		//  } else if(stripos($agent['userAgent'], 'iPhone') !== false) {
		// 	$device = 'iPhone';
		//  } else {
		// 	$device = 'browser';
		//  }

		// echo $device;
		$board_list_pcslider_main = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('board_type', 'pcslider')
								//->where('start_period', '<=', date("Y-m-d"))
								//->where('end_period', '>=', date("Y-m-d"))
								->where('use_status', 'Y')
								->orderBy('priority','asc')
								->get();

		$return_list['data'] = $board_list_pcslider_main;

		$board_quality_section_array = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('board_type', 'section')
								->where('use_status', 'Y')
								->orderBy('idx','desc')
								->limit(3)
								->get();

		$return_list['data2'] = $board_quality_section_array;

		return view($device == "browser" ? 'index' : 'm/index' , $return_list);
		// return view('index', $return_list);

	}

}