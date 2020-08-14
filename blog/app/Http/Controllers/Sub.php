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

class Sub extends Controller
{

	// if(stripos($agent['userAgent'], 'android-web-app') !== false) {
	// 	$device = 'webapp';
	//  } else if(stripos($agent['userAgent'], 'Android') !== false) {
	// 	$device = 'Android';
	//  } else if(stripos($agent['userAgent'], 'iPhone') !== false) {
	// 	$device = 'iPhone';
	//  } else {
	// 	$device = 'browser';
	//  }

	public function company(Request $request) {

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

		return view($device == "browser" ? '/sub/company' : '/m/sub/company' , $request);

	}

	public function business(Request $request) {

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

		return view($device == "browser" ? '/sub/business' : '/m/sub/business' , $request);

	}
	
	public function equipment(Request $request) {

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

		$board_equipment_array = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut, substring_index(link_value,"/",-1) as link_key'))
								->where('board_type', 'equipment')
								->where('use_status', 'Y')
								->where('category2', $_GET['category2'])
								->orderBy('idx','desc')
								->get();

		$return_list['board_equipment'] = $board_equipment_array;		

		return view($device == "browser" ? '/sub/equipment' : '/m/sub/equipment' , $return_list);

	}

	public function product(Request $request) {

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

		if($_GET['category2'] == "all") {

			$board_sale_label_array = DB::table('board') 
									->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
									->where('board_type', 'sale_label')
									->where('use_status', 'Y')
									->orderBy('idx','desc')
									->get();

			$return_list['board_sale_label'] = $board_sale_label_array;		

			$board_sale_pouch_array = DB::table('board') 
									->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
									->where('board_type', 'sale_pouch')
									->where('use_status', 'Y')
									->orderBy('idx','desc')
									->get();

			$return_list['board_sale_pouch'] = $board_sale_pouch_array;		


		} else {

			$board_sale_label_array = DB::table('board') 
									->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
									->where('board_type', 'sale_label')
									->where('use_status', 'Y')
									->where('category2', $_GET['category2'])
									->orderBy('idx','desc')
									->get();

			$return_list['board_sale_label'] = $board_sale_label_array;		

			$board_sale_pouch_array = DB::table('board') 
									->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
									->where('board_type', 'sale_pouch')
									->where('use_status', 'Y')
									->where('category2', $_GET['category2'])
									->orderBy('idx','desc')
									->get();

			$return_list['board_sale_pouch'] = $board_sale_pouch_array;		


		}


		return view($device == "browser" ? '/sub/product' : '/m/sub/product' , $return_list);

	}

	public function product_view(Request $request) {

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

		$board_array = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('use_status', 'Y')
								->where('idx', $_GET['idx'])
								->where('board_type', $_GET['board_type'])
								->orderBy('idx','desc')
								->first();

		$return_list['board_array'] = $board_array;	

		$board_past_array_cnt = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('use_status', 'Y')
								->where('idx', '<', $_GET['idx'])
								->where('board_type', $_GET['board_type'])
								->orderBy('idx','desc')
								->get()->count();

		if($board_past_array_cnt > 0) {

			$board_past_array = DB::table('board') 
									->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
									->where('use_status', 'Y')
									->where('idx', '<', $_GET['idx'])
									->where('board_type', $_GET['board_type'])
									->orderBy('idx','desc')
									->first();


			$return_list['board_past_array'] = $board_past_array;	

		}

		$board_next_array_cnt = DB::table('board') 
								->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
								->where('use_status', 'Y')
								->where('idx', '>', $_GET['idx'])
								->where('board_type', $_GET['board_type'])
								->orderBy('idx','asc')
								->get()->count();

		if($board_next_array_cnt > 0) {

			$board_next_array = DB::table('board') 
									->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
									->where('use_status', 'Y')
									->where('idx', '>', $_GET['idx'])
									->where('board_type', $_GET['board_type'])
									->orderBy('idx','asc')
									->first();
			$return_list['board_next_array'] = $board_next_array;	

		}

		$return_list['board_past_array_cnt'] = $board_past_array_cnt;	
		$return_list['board_next_array_cnt'] = $board_next_array_cnt;	


		return view($device == "browser" ? '/sub/product_view' : '/m/sub/product_view' , $return_list);

	}

	public function request_write(Request $request) {

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

		return view($device == "browser" ? '/sub/request_write' : '/m/sub/request_write' , $request);

	}

	public function notice(Request $request) {

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

		if($_GET['board_type'] == "notice") {
			$boardType = "notice";
		} else if($_GET['board_type'] == "label") {
			$boardType = "label";
		} else if($_GET['board_type'] == "pouch") {
			$boardType = "pouch";
		} else if($_GET['board_type'] == "inquiry") {
			$boardType = "inquiry";
		}

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('board_type', $boardType);
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', "<>", 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('board_type', $boardType);
        $query->where(function($query_set2) {
                $query_set2->where('top_type', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get();

		//검색
		if($request->search_type != ''){

		echo $request->board_type.'<br>';
			$board_search = DB::table('board')
							->select(DB::raw('*'))
							->where($request->search_type, 'like', '%'.$request->search_word.'%')
							// ->orWhere('manager_name', 'like', '%'.$request->search_word.'%')
							->where('board_type',$request->board_type)
							->get();
							//print_r($board_search);
							//exit;

			$return_list["data"] = $board_search;
			$return_list["board_top_count"] = $board_top_count;
			$return_list["board_top_list"] = $board_top_list;
			$return_list["data2"] = $list;
			$return_list["number"] = $number;
			$return_list["key"] = $request->key;
			$return_list["totalCount"] = $totalCount;
			$return_list["paging_view"] = $paging_view;
			$return_list["page"] = $thisPage;
			$return_list["key"] = $request->key;
		}else{

			$return_list = array();
			$return_list["board_top_count"] = $board_top_count;
			$return_list["board_top_list"] = $board_top_list;
			
			$return_list["data"] = $list;
			$return_list["data2"] = $list;
			$return_list["number"] = $number;
			$return_list["key"] = $request->key;
			$return_list["totalCount"] = $totalCount;
			$return_list["paging_view"] = $paging_view;
			$return_list["page"] = $thisPage;
			$return_list["key"] = $request->key;
		}

		return view($device == "browser" ? '/sub/notice' : '/m/sub/notice' , $return_list);

	}

	public function notice_write(Request $request) {

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

		return view($device == "browser" ? '/sub/notice_write' : '/m/sub/notice_write' , $request);

	}

	public function notice_view(Request $request) {

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

		if($_GET['board_type'] == "notice") {
			$boardType = "notice";
		} else if($_GET['board_type'] == "label") {
			$boardType = "label";
		} else if($_GET['board_type'] == "pouch") {
			$boardType = "pouch";
		} else if($_GET['board_type'] == "inquiry") {
			$boardType = "inquiry";
		}

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('board_type', $boardType);
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', "<>", 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('board_type', $boardType)
			  ->where('idx',$request->board_idx);
        $query->where(function($query_set2) {
                $query_set2->where('top_type', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		$list = $query->take($paging_option["pageSize"])->first();
		
		// 게시판 출력 글 번호 계산
		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->first();

		// 댓글
		$board_idx_reply = $_GET['board_idx'];
		// $board_reply->where(function($query_set3) {
		// 	$query_set3->where('top_type', 'Y')
		// 	->orWhere('top_type', null);
		// });

		$board_reply = DB::table('board') 
					->select(DB::raw('*'))
					->where('grp', $list->grp)
					//->where('reply_name', '<>','')
					->Where('reply_name', '<>', null)
					->orderBy('grp','desc')
					->orderBy('depth','asc')
					->get();
					


		$return_list = array();
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["board_reply"] = $board_reply;
		$return_list["key"] = $request->key;


		return view($device == "browser" ? '/sub/notice_view' : '/m/sub/notice_view' , $return_list);

	}

	public function acc(Request $request) {

		$boardType = request()->segment(2);

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('use_status', 'Y');
		$totalQuery->where('board_type', $boardType);
		$totalQuery->where('category2', request()->segment(3));
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('priority', 'asc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('use_status', 'Y');
		$query->where('board_type', $boardType);
		$query->where('category2', request()->segment(3));
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->where('category2', request()->segment(3))
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->where('category2', request()->segment(3))
					->get();

		$return_list = array();
		$return_list["i"] = 1;
		$return_list["j"] = 1;
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["data2"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view('sub/acc', $return_list); 

	}

	public function beds(Request $request) {

		$boardType = request()->segment(2);

		$paging_option = array(
			"pageSize" => 30000,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('use_status', 'Y');
		$totalQuery->where('board_type', $boardType);
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
				->orderBy('priority', 'asc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('use_status', 'Y');
		$query->where('board_type', $boardType);
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view('sub/beds', $return_list); 

	}

	public function beds_sub(Request $request) {

		$boardType = $request->board_idx;

		$paging_option = array(
			"pageSize" => 3000,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('file_list');

		$totalQuery->where('board_idx', $boardType);

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('file_list')
				->select(DB::raw('*'))
				->orderBy('priority', 'asc');

		$query->where('board_idx', $boardType);
		
		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		//print_r($list);
		//exit;

		$html_data = "";
		$sub_main_status_check = "loop_not";
		foreach($list as $key => $value) {

			//echo "sub_main_status=".$value->sub_main_status."<br/>";
			//exit;

			if($value->sub_main_status == "N") {

				//echo "N";

				if($sub_main_status_check == "loop_not") {

					$html_data .= '<div class="swiper-container beds_sub_slide">';
					$html_data .= '	<div class="swiper-wrapper">';

					$sub_html_inform = DB::table('file_list') 
								->select(DB::raw('*'))
								->where('board_idx', $value->board_idx)
								->where('sub_main_status', 'N')
								->get();
					
					//echo count($sub_html_inform);

					foreach($sub_html_inform as $key2 => $value2) {

						$html_data .= '<div class="beds_detail swiper-slide">';
						$html_data .= '<img class="mo_none" src="/storage/app/images/'.$value2->real_file_name.'" alt="">';
						$html_data .= '<img class="mo_block" src="/storage/app/images/'.$value2->real_file_name2.'" alt="">';
						$html_data .= '<div class="besd_explain">';
						$html_data .= '<div class="besd_explain_title">';
						$html_data .= '<p class="beds_txt hei85p_kr">'.$value2->sub_subject.'</p>';
						$html_data .= '<p class="beds_txt hei85p_kr">'.$value2->sub_subject2.'</p>';
						$html_data .= '</div>';
						$html_data .= '<div class="besd_explain_detail">';
						$html_data .= 'COLOR : <b>'.$value2->sub_subject3.'</b>';
						$html_data .= '</div>';
						$html_data .= '</div>';
						$html_data .= '</div>';					

					}
					
					$html_data .= '</div>';
					$html_data .= '<div class="swiper-pagination"></div>';
					$html_data .= '<div class="swiper-button-next"></div>';
					$html_data .= '<div class="swiper-button-prev"></div>';
					$html_data .= '</div>';
					
					$sub_main_status_check = "loop_ok";

				}

			} else {


				$html_data .= '<div class="beds_bot">';
				$html_data .= '	<img class="mo_none" src="/storage/app/images/'.$value->real_file_name.'" alt="">';
				$html_data .= '	<img class="mo_block" src="/storage/app/images/'.$value->real_file_name2.'" alt="">';
				$html_data .= '</div>';

			}

		}
		

		//echo htmlspecialchars($html_data);
		//echo $html_data;
		//exit;
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));
		$return_list = array();
		$return_list["html_data"] = $html_data;
		$return_list["data"] = $list;
		$return_list["data2"] = $list;
		$return_list["data3"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view('sub/beds_sub', $return_list); 

	}

	public function heritage01(Request $request) {

		return view('sub/heritage01'); 

	}

	public function heritage02(Request $request) {

		return view('sub/heritage02'); 

	}

	public function heritage03(Request $request) {

		return view('sub/heritage03'); 

	}

	public function materials(Request $request) {

		return view('sub/materials'); 

	}

	public function media_view(Request $request) {

		if($_GET['tab'] == 1) {
			$boardType = "press";
		} else if($_GET['tab'] == 2) {
			$boardType = "media";
		} else if($_GET['tab'] == 3) {
			$boardType = "notice";
		}

		$board_prev_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('idx', '<', $request->board_idx)
					->orderBy('idx', 'desc')
					->first();

		$return_list['board_prev'] = $board_prev_infom;

		$board_next_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('idx', '>', $request->board_idx)
					->orderBy('idx', 'desc')
					->first();

		$return_list['board_next'] = $board_next_infom;


		$board_infom = DB::table('board') 
					->select(DB::raw('*'))
					->where('idx', $request->board_idx)
					->first();

		$return_list['data'] = $board_infom;

		return view('sub/media_view', $return_list); 

	}

	public function news(Request $request) {

		if($request->tab == 1) {
			$boardType = 'press';
		} else if($request->tab == 2) {
			$boardType = 'media';
		}else{
			$boardType = 'notice';
		}

		$paging_option = array(
			"pageSize" => 10,
			"blockSize" => 5
		);		

		$thisPage = ($request->page) ? $request->page : 1 ;
		$paging = new PagingFunction($paging_option);

		$totalQuery = DB::table('board');
		if($request->key != "") {
			$totalQuery->where(function($totalQuery) use($request){
				$totalQuery->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$totalQuery->where('use_status', 'Y');
		$totalQuery->where('board_type', $boardType);
        $totalQuery->where(function($query_set) {
                $query_set->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });

		if($request->category_type) {
			$totalQuery->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$totalQuery->where('category', 1);
		}

		$totalCount = $totalQuery->get()->count();
		
		$paging_view = $paging->paging($totalCount, $thisPage, "page");
		
		$query = DB::table('board')
				->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut, substring_index(link_value,"/",-1) as link_key'))
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

		$query->where('use_status', 'Y');
		$query->where('board_type', $boardType);
        $query->where(function($query_set2) {
                $query_set2->where('top_type', '<>', 'Y')
                ->orWhere('top_type', null);
        });
		
		//$query->where('top_type', '<>', 'Y');
		//$query->orWhere('top_type', null);
		
		if($request->category_type) {
			$query->where('category', $request->category_type);
		}

		if(request()->segment(2) == "ey_data_room" && !$request->category_type) {
			$query->where('category', 1);
		}

		if($request->page != "" && $request->page > 1) {
			$query->skip(($request->page - 1) * $paging_option["pageSize"]);
		}

		$list = $query->take($paging_option["pageSize"])->get();
		
		// 게시판 출력 글 번호 계산
		$number = $totalCount-($paging_option["pageSize"]*($thisPage-1));

		$board_top_count = DB::table('board') 
					->select(DB::raw('*'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get()->count();

		$board_top_list = DB::table('board') 
					->select(DB::raw('*, substr(reg_date, 1, 10) as reg_date_cut'))
					->where('board_type', $boardType)
					->where('top_type', 'Y')
					->get();

		$return_list = array();
		$return_list["board_top_count"] = $board_top_count;
		$return_list["board_top_list"] = $board_top_list;
		$return_list["data"] = $list;
		$return_list["data2"] = $list;
		$return_list["data3"] = $list;
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;
		
		return view('sub/news', $return_list); 

	}

	public function write_board_action(Request $request) {

		// $answer_infom = DB::table('board') 
		// 			->select(DB::raw('board.grp + 1 as grp_now, board.prino + 1 as prino_now'))
		// 			->where('board_type', $request->board_type)
		// 			->orderBy('idx', 'desc')
		// 			->first();

		// if($board_cnt <= 0) {
		// 	$prino_now = 1;
		// 	$grp_now = 1;
		// } else {
		// 	$prino_now = $answer_infom->prino_now;
		// 	$grp_now = $answer_infom->grp_now;
		// }

		$board_cnt = DB::table('board')
					// ->where('board_type', $request->board_type)
					//->where('idx', $request->board_idx)
					->get()
					->count();

		$board_infom = DB::table('board')
					->select(DB::raw('*, board.grp as grp_now, board.depth as depth_now, board.depth2 as depth2_now, board.grp2 as grp2_now, board.prino as prino_now'))
					//->where('board_type', $request->board_type)
					->orderBy('idx', 'desc')
					->first();

		// $answer_infom = DB::table('board')
		// 			->select(DB::raw('*, board.grp as grp_now, board.prino as prino_now, board.parno as parno_now'))
		// 			//->where('board_type', $request->board_type)
		// 			->orderBy('idx', 'desc')
		// 			->first();

		$reply_answer_infom = DB::table('board') 
					->select(DB::raw('depth, depth2, grp, grp2'))
					//->where('board_type', $request->board_type)
					->where('idx', $request->board_idx)
					->first();
		
		//echo ;
		// $this->validate($request, [
        //     'captcha' => 'required|captcha'
        // ]);
		// if ($ishuman){
		// 	echo "OK";
		// }else{
		// 	echo "FUCK";
		// }
		// exit;
		if($board_cnt <= 0) {
			$parno_now = 0;
			$prino_now = 0;
			$depth_now = 1;
			$depth2_now = 1;
			$grp_now = 1;
			$grp2_now = 1;
		} else {
			//$parno_now = $request->board_idx;
			$prino_now = $board_infom->prino_now + 1;
			$depth_now = $board_infom->depth;
			$depth2_now = $board_infom->depth2;
			$grp_now = $board_infom->grp_now + 1;
			$grp2_now = $board_infom->grp2_now;
		}
		
		if($request->reply_type == "reply") {
			// $parno_now = $request->board_idx;
			// $prino_now = $reply_answer_infom->prino + 1;
			$depth_now = $reply_answer_infom->depth;
			$grp_now = $reply_answer_infom->grp;
		}

		if($request->writer_file) {
			$file = $request->writer_file->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}

		if($request->writer_file2) {
			$file = $request->writer_file2->store('images');
			$file_array2 = explode("/", $file);
			copy("../storage/app/images/".$file_array2[1], "./storage/app/images/".$file_array2[1]);
		} else {
			$file_array2[1] = null;
		}
	// 	// echo $request->idx;
	// 	// echo $request->board_type;
	// 	// echo $request->reply;
	// 	// echo $request->reply_name;
	// 	// echo $request->reply_content;
	// 	// echo request()->ip();
	// 	// echo \Carbon\Carbon::now();
		if($request->reply_type == 'reply'){
			DB::table('board')->insert(
				[
					'grp' => $grp_now,
					'grp2' => $grp2_now,
					'depth' => $depth2_now,
					'depth2' => $depth2_now,
					// 'reply_name' => $request->reply_name,
					// 'reply_name' => $request->reply_name,
					// 'reply_name' => $request->reply_name,
					'reply_name' => $request->reply_name,
					'reply_content' => $request->reply_content,
					'ip_addr' => request()->ip(),
					'reg_date' => \Carbon\Carbon::now(),
				]
			);
			echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/';</script>";
			exit;
		}else if($request->reply_type == 're_reply'){
			DB::table('board')->insert(
				[
					'grp' => $grp_now,
					'grp2' => $grp2_now,
					'depth' => $depth2_now,
					'depth2' => $depth2_now,
					// 'reply_name' => $request->reply_name,
					// 'reply_name' => $request->reply_name,
					// 'reply_name' => $request->reply_name,
					'reply_name' => $request->reply_name,
					'reply_content' => $request->reply_content,
					'ip_addr' => request()->ip(),
					'reg_date' => \Carbon\Carbon::now(),
				]
			);
			echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/';</script>";
			exit;
		}else{

			DB::table('board')->insert(
				[
					'subject' => $request->subject,
					'contents' => $request->contents,
					'category' => $request->category,
					'category2' => $request->category2,
					'corp_name' => $request->corp_name,
					'manager_name' => $request->writer,
					'passwd' => $request->passwd,
					'tel' => $request->tel,
					'email' => $request->email,
					'product_name' => $request->product_name,
					'material_name' => $request->material_name,
					'attach_file' => $file_array[1],
					'attach_file2' => $file_array2[1],
					'size' => $request->size,
					'type_set' => $request->type_set,
					'etc' => $request->etc,
					'writer' => $request->writer,
					'ip_addr' => request()->ip(),
					'board_type' => $request->board_type,
					'parno' => 0,
					'prino' => $prino_now,
					'grp' => $grp_now,
					'grp2' => $grp2_now,
					'depth' => $depth_now,
					'depth2' => $depth2_now,
					'start_period' => $request->start_period,
					'end_period' => $request->end_period,
					'use_status' => $request->use_status,
					'priority' => $request->priority,
					'link_value' => $request->link_value,
					'secret_number' => $request->secret_number,
					'secret_status' => $request->secret_status,
					'reg_date' => \Carbon\Carbon::now(),
				]
			);

			echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/';</script>";
			exit;
		}
	}

	public function video_view(Request $request) {

		return view('sub/video_view'); 

	}

	public function contact_us(Request $request) {

		return view('sub/contact_us'); 

	}

}