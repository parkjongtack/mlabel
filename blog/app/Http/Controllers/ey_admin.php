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

class Ey_admin extends Controller
{
	public function file_upload(Request $request) {

		if($request->upfiles) {
			$file = $request->upfiles->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./sample/editor/html/popular/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}

		$response = new \StdClass;
		//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
		$response->link = "/sample/editor/html/popular/" . $file_array[1];
		echo stripslashes(json_encode($response));
	}
	
	public function __construct()
	{
		
	}

    public function ey_login(Request $request) {

		return view('ey_login'); 

	}

	public function ey_login_action(Request $request) {
		
		$member_infom_count = DB::table('admin_member') 
				->select(DB::raw('*'))
				->where('user_id', $request->id)
				->get()->count();		
		
		if($member_infom_count > 0) {
			
			$member_infom = DB::table('admin_member') 
					->select(DB::raw('*'))
					->where('user_id', $request->id)
					->first();

			if (Hash::check($request->pw, $member_infom->passwd)) {

				session(['user_id' => $request->id]);

				echo "<script>alert('로그인되었습니다.');location.href='/ey_admin/pcslider';</script>";
			} else {
				echo "<script>alert('비밀번호가 잘못되었습니다.');location.href='/ey_admin/login';</script>";
			}
			
		} else {
			echo "<script>alert('등록되어 있지 않은 아이디입니다.');location.href='/ey_admin/login';</script>";
		}
		
	}

	public function ey_control(Request $request) {
		DB::table('board')->where('idx', $request->idx)->delete();
		return true;
	}	

	public function ey_control2(Request $request) {
		DB::table('poplayer')->where('idx', $request->idx)->delete();
		return true;
	}	

	public function ey_control_file(Request $request) {
		DB::table('file_list')->where('idx', $request->idx)->delete();
		return true;
	}	

	public function ey_logout(Request $request) {
		$request->session()->flush();
		echo "<script>alert('로그아웃 되었습니다.');location.href='/ey_admin/login';</script>";
	}

	public function write_board_form(Request $request) {

		if(request()->segment(4) == "modify") {

			$board_inform = DB::table('board') 
						->select(DB::raw('*'))
						//->where('board_type', $request->board_type)
						->where('idx', $request->board_idx)
						->first();			

			$return_list['data'] = $board_inform;

			if(request()->segment(2) == 'beds') {

				$board_inform2 = DB::table('file_list') 
							->select(DB::raw('*'))
							//->where('board_type', $request->board_type)
							->where('board_idx', $request->board_idx)
							->where('sub_main_status', 'N')
							->get();

				$return_list['data2'] = $board_inform2;

				$board_inform2 = DB::table('file_list') 
							->select(DB::raw('*'))
							//->where('board_type', $request->board_type)
							->where('board_idx', $request->board_idx)
							->where('sub_main_status', 'Y')
							->get();

				$return_list['data3'] = $board_inform2;

			}

			return view('ey_modify_board', $return_list);

		} else {

			return view('ey_write_board');

		}

	}

	public function priority_change(Request $request) {
		
		echo $request->status;

		if($request->status == "2up") {
		
			$priority_infom = DB::table('board') 
						->select(DB::raw('priority'))
						->where('idx', $request->board_idx)
						->first();

			DB::table('board')->where('idx', $request->board_idx)->update(
				[
					'priority' => $priority_infom->priority + 10,
				]
			);
		
		}

		if($request->status == "up") {
		
			$priority_infom = DB::table('board') 
						->select(DB::raw('priority'))
						->where('idx', $request->board_idx)
						->first();

			DB::table('board')->where('idx', $request->board_idx)->update(
				[
					'priority' => $priority_infom->priority + 1,
				]
			);
		
		}

		if($request->status == "2down") {
		
			$priority_infom = DB::table('board') 
						->select(DB::raw('priority'))
						->where('idx', $request->board_idx)
						->first();

			DB::table('board')->where('idx', $request->board_idx)->update(
				[
					'priority' => $priority_infom->priority - 10,
				]
			);
		
		}

		if($request->status == "down") {
		
			$priority_infom = DB::table('board') 
						->select(DB::raw('priority'))
						->where('idx', $request->board_idx)
						->first();

			DB::table('board')->where('idx', $request->board_idx)->update(
				[
					'priority' => $priority_infom->priority - 1,
				]
			);
		
		}

		echo "<script>alert('노출순위 수정이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
		exit;

	}

	public function image_upload_action(Request $request) {

		if($request->upload) {
			$file = $request->upload->store('images');
			$file_array = explode("/", $file);
			copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
		} else {
			$file_array[1] = null;
		}
		
		/*
		{"uploaded" : 1, "fileName" : "test.jpg", "url" : "/img/test.jpg"}
		JsonObject json = new JsonObject();
		json.addProperty("uploaded", 1);
		json.addProperty("fileName", fileName);
		json.addProperty("url", fileUrl);[출처] CKEditor를 이용해서 이미지 업로드하기|작성자 Junesker
		*/


		$array['uploaded'] = 1;
		$array['fileName'] = $file_array[1];
		$array['url'] = "/storage/app/images/".$file_array[1];

		echo json_encode($array);

		//echo "/storage/app/images/".$file_array[1];
		//echo "<script> window.parent.CKEDITOR.tools.callFunction(".$_GET['CKEditorFuncNum'].", '/storage/app/images/".$file_array[1]."', '');</script>;";

		/*
		if ($_FILES["upload"]["size"] > 0 ){

			// 현재시간 추출
			$date_filedir = date("YmdHis");

			//오리지널 파일 이름.확장자
			$ext = substr(strrchr($_FILES["upload"]["name"],"."),1);
			//$ext : 확장자를 저장하는 변수
			// strrchr(): . 이후의 문자열을 return, substr(): 두 번째 문자에서 끝까지 return
			//즉 확장자만 return시킨다.
			$ext = strtolower($ext); //소문자로 바꾼다.
			$savefilename = $date_filedir."_".str_replace(" ", "_", $_FILES["upload"]["name"]);

			//$savefilename : 날짜를 덧붙여서 파일 이름을 만든다.
			//str_replace(): 파일명에 " "공백이 있으면 "_"로 대치한다.

			$uploadpath = $_SERVER['DOCUMENT_ROOT']."/upload/images";//이거 안 됨.
			$uploadpath = "./images/";
			//$uploadpath :  upload.php가 있는 폴더를 기준으로 이미지가 저장 될 폴더를 지정한다.
			//즉 upload.php가 upload 폴더 안에 있다면 upload/안에 images폴더를 만들면 된다.

			$uploadsrc = $_SERVER['HTTP_HOST']."/upload/images/";
			//내 호스트(즉 root 디렉토리)아래에 이미지가 저장될 "/upload/images/"가 있어야 한다.

			$http='http'.((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on')?'s':'').'://';
			//$_SERVER['HTTPS']의 값이 on인지 아닌지에 따라 https:// 또는 http://가 된다.
			//CKEditor에서는 이미지를 호출할 때 url을 http(또는 https)부분부터 표기해야 한다.

			//php 파일 업로드 하는 부분
			if($ext=="jpg" or $ext=="gif" or $ext =="png"){

				if(move_uploaded_file($_FILES['upload']['tmp_name'],$uploadpath.iconv("UTF-8","EUC-KR",$savefilename))){
				//move_uploaded_file( $_FILES['upload']['tmp_name'], 저장 경로+파일명) : 업로드 파일을 저장 경로로 옮긴다.
				//iconv(기존셋, 바꿀셋, 바꿀 문자열) : 문자셋을 바꾸어준다.(호스트에 따라 한글이 안 될 수도 있다.)
					$uploadfile = $savefilename;
					echo "<script>alert('업로드성공: ".$savefilename."');</script>;";//성공 메세지 출력.
				}//move_upload_file() if문 닫기

			}else{
				echo "<script>alert('jpg, gif, png파일만 업로드 가능함.');</script>;";
			} //확장자확인 if문 닫기

		}else{

			exit;

		}
		*/

		//echo "<script> window.parent.CKEDITOR.tools.callFunction({$_GET['CKEditorFuncNum']}, '".$http.$uploadsrc."$uploadfile');</script>;";
		
	}

	public function write_board_action(Request $request) {

		$board_cnt = DB::table('board')
					->where('board_type', $request->board_type)
					//->where('idx', $request->board_idx)
					->get()
					->count();

		$answer_infom = DB::table('board') 
					->select(DB::raw('*, board.grp as grp_now, board.prino as prino_now, board.parno as parno_now'))
					//->where('board_type', $request->board_type)
					->orderBy('priority', 'asc')
					->first();

		$reply_answer_infom = DB::table('board') 
					->select(DB::raw('depth, grp, prino, parno'))
					//->where('board_type', $request->board_type)
					->where('idx', $request->board_idx)
					->first();

		if($board_cnt <= 0) {
			$parno_now = 0;
			$prino_now = 0;
			$depth_now = 1;
			$grp_now = 1;
		} else {
			$parno_now = $request->board_idx;
			$prino_now = $answer_infom->prino_now + 1;
			$depth_now = $answer_infom->depth;
			$grp_now = $answer_infom->grp_now + 1;
		}
		
		if($request->write_type == "reply") {
			$parno_now = $request->board_idx;
			$prino_now = $reply_answer_infom->prino + 1;
			$depth_now = $reply_answer_infom->depth + 1;
			$grp_now = $reply_answer_infom->grp;			
		}


		if(request()->segment(2) == "label" || request()->segment(2) == "section" || request()->segment(2) == "pouch" || request()->segment(2) == "inquiry" || request()->segment(2) == "notice" || request()->segment(2) == "equipment" || request()->segment(2) == "sale_label" || request()->segment(2) == "sale_pouch") {

			if($request->write_type == "modify") {
				
				if($request->writer_file) {
					$file = $request->writer_file->store('images');
					$file_array = explode("/", $file);
					copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
				} else {
					$file_array[1] = null;
				}

				if($file_array[1] != null) {
					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'contents' => $request->contents,
							'category' => $request->category,
							'category2' => $request->category2,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'attach_file' => $file_array[1],
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
							'start_period' => $request->start_period,
							'end_period' => $request->end_period,
							'use_status' => $request->use_status,
							'priority' => $request->priority,
							'link_value' => $request->link_value,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				} else {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'contents' => $request->contents,
							'category' => $request->category,
							'category2' => $request->category2,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
							'start_period' => $request->start_period,
							'end_period' => $request->end_period,
							'use_status' => $request->use_status,
							'priority' => $request->priority,
							'link_value' => $request->link_value,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				}
				
				echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
				exit;

			} else {

				if($request->writer_file) {
					$file = $request->writer_file->store('images');
					$file_array = explode("/", $file);
					copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
				} else {
					$file_array[1] = null;
				}

				DB::table('board')->insert(
					[
						'subject' => $request->subject,
						'contents' => $request->contents,
						'category' => $request->category,
						'category2' => $request->category2,
						'writer' => $request->writer,
						'ip_addr' => request()->ip(),
						'board_type' => $request->board_type,
						'attach_file' => $file_array[1],
						'parno' => 0,
						'prino' => $prino_now,
						'depth' => 1,
						'grp' => $grp_now,
						'start_period' => $request->start_period,
						'end_period' => $request->end_period,
						'use_status' => $request->use_status,
						'priority' => $request->priority,
						'link_value' => $request->link_value,
						'reg_date' => \Carbon\Carbon::now(),
					]
				);
			
				echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
				exit;

			}
		
		} else if(request()->segment(2) == "pcslider" || request()->segment(2) == "popup") {
			
			if($request->write_type == "modify") {
				
				if($request->writer_file) {
					$file = $request->writer_file->store('images');
					$file_array = explode("/", $file);
					copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
				} else {
					$file_array[1] = null;
				}

				if($request->writer_file_mobile) {
					$file = $request->writer_file_mobile->store('images');
					$file_array2 = explode("/", $file);
					copy("../storage/app/images/".$file_array2[1], "./storage/app/images/".$file_array2[1]);
				} else {
					$file_array2[1] = null;
				}

				if($request->all_type == "Y") {
					$all_type = 'Y';
				} else {
					$all_type = 'N';
				}

				if($file_array[1] != null) {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'category' => $request->category,
							'category2' => $request->category2,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'attach_file' => $file_array[1],
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
							'start_period' => $request->start_period,
							'end_period' => $request->end_period,
							'use_status' => $request->use_status,
							'priority' => $request->priority,
							'i_width' => $request->i_width,
							'i_height' => $request->i_height,
							'pop_position' => $request->pop_position,
							'm_width' => $request->m_width,
							'm_height' => $request->m_height,
							'link_value' => $request->link_value,
							'all_type' => $all_type,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				} else {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'subject' => $request->subject,
							'category' => $request->category,
							'category2' => $request->category2,
							'writer' => $request->writer,
							'ip_addr' => request()->ip(),
							'board_type' => $request->board_type,
							'parno' => 0,
							'prino' => $prino_now,
							'depth' => 1,
							'grp' => $grp_now,
							'start_period' => $request->start_period,
							'end_period' => $request->end_period,
							'use_status' => $request->use_status,
							'priority' => $request->priority,
							'i_width' => $request->i_width,
							'i_height' => $request->i_height,
							'pop_position' => $request->pop_position,
							'm_width' => $request->m_width,
							'm_height' => $request->m_height,
							'link_value' => $request->link_value,
							'all_type' => $all_type,
							'reg_date' => \Carbon\Carbon::now(),
						]
					);

				}
				
				if($file_array2[1] != null) {

					DB::table('board')->where('idx', $request->board_idx)->update(
						[
							'attach_file2' => $file_array2[1],
						]
					);

				}

				if(request()->segment(2) != 'acc' && request()->segment(2) != 'pcslider' && request()->segment(2) != 'popup') {

					$insert_id = $request->board_idx;

					$file = array();
					$i = 0;
					foreach($_FILES['writer_file2']['name'] as $key => $value) {

						$file['name'] = $_FILES['writer_file2']['name'][$key];
						$file['tmp_name'] = $_FILES['writer_file2']['tmp_name'][$key];
						$file['size'] = $_FILES['writer_file2']['size'][$key];

						$file2['name'] = $_FILES['writer_file_mobile2']['name'][$key];
						$file2['tmp_name'] = $_FILES['writer_file_mobile2']['tmp_name'][$key];
						$file2['size'] = $_FILES['writer_file_mobile2']['size'][$key];

						$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/storage/app/images/';


						$ext_str = "jpg,gif,png";
						$allowed_extensions = explode(',', $ext_str);

						$max_file_size = 5242880000000000;
						$ext = substr($file['name'], strrpos($file['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext, $allowed_extensions) && $file['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file['size'] >= $max_file_size && $file['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$ext = substr($file2['name'], strrpos($file2['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext, $allowed_extensions) && $file2['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file2['size'] >= $max_file_size && $file2['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$ext2 = substr($file2['name'], strrpos($file2['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext2, $allowed_extensions) && $file2['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file2['size'] >= $max_file_size && $file2['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$ext = substr($file2['name'], strrpos($file2['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext2, $allowed_extensions) && $file2['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file2['size'] >= $max_file_size && $file2['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$path = md5(microtime()) . '.' . $ext;
						$path2 = md5(microtime()) . '.' . $ext;
						if(move_uploaded_file($file['tmp_name'], $upload_directory.$path) && move_uploaded_file($file2['tmp_name'], $upload_directory.$path2)) {

							DB::table('file_list')->insert(
								[
									'sub_subject' => $request->sub_subject[$i],
									'sub_subject2' => $request->sub_subject2[$i],
									'sub_subject3' => $request->sub_subject3[$i],
									'board_type' => $request->board_type,
									'file_name' => $file['name'],
									'real_file_name' => $path,
									'file_name2' => $file2['name'],
									'real_file_name2' => $path2,
									'board_idx' => $insert_id,
									'priority' => $request->sub_slide_priority,
								]
							);					

							$i++;

							//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
							$file_id = md5(uniqid(rand(), true));
							$name_orig = $file['name'];
							$name_save = $path;

						}

					}

					$file = array();
					$i = 0;
					foreach($_FILES['writer_sub_file2']['name'] as $key => $value) {

						$file['name'] = $_FILES['writer_sub_file2']['name'][$key];
						$file['tmp_name'] = $_FILES['writer_sub_file2']['tmp_name'][$key];
						$file['size'] = $_FILES['writer_sub_file2']['size'][$key];

						$file2['name'] = $_FILES['writer_sub_file_mobile2']['name'][$key];
						$file2['tmp_name'] = $_FILES['writer_sub_file_mobile2']['tmp_name'][$key];
						$file2['size'] = $_FILES['writer_sub_file_mobile2']['size'][$key];

						$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/storage/app/images/';

						$ext_str = "jpg,gif,png";
						$allowed_extensions = explode(',', $ext_str);

						$max_file_size = 5242880000000000;
						$ext = substr($file['name'], strrpos($file['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext, $allowed_extensions) && $file['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file['size'] >= $max_file_size && $file['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$ext2 = substr($file2['name'], strrpos($file2['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext2, $allowed_extensions) && $file2['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file2['size'] >= $max_file_size && $file2['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$path = md5(microtime()) . '.' . $ext;
						$path2 = md5(microtime()) . '.' . $ext2;
						if(move_uploaded_file($file['tmp_name'], $upload_directory.$path) && move_uploaded_file($file2['tmp_name'], $upload_directory.$path2)) {

							DB::table('file_list')->insert(
								[
									//'sub_subject' => $request->sub_subject[$i],
									//'sub_subject2' => $request->sub_subject2[$i],
									//'sub_subject3' => $request->sub_subject3[$i],
									'board_type' => $request->board_type,
									'file_name' => $file['name'],
									'real_file_name' => $path,
									'file_name2' => $file2['name'],
									'real_file_name2' => $path2,
									'board_idx' => $insert_id,
									'sub_main_status' => 'Y',
									'priority' => $request->sub_image_priority[$i],
								]
							);					

							$i++;

							//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
							$file_id = md5(uniqid(rand(), true));
							$name_orig = $file['name'];
							$name_save = $path;

						}

					}

				
				}

				echo "<script>alert('글 수정이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
				exit;

			} else {

				if($request->writer_file) {
					$file = $request->writer_file->store('images');
					$file_array = explode("/", $file);
					copy("../storage/app/images/".$file_array[1], "./storage/app/images/".$file_array[1]);
				} else {
					$file_array[1] = null;
				}

				if($request->writer_file_mobile) {
					$file = $request->writer_file_mobile->store('images');
					$file_array2 = explode("/", $file);
					copy("../storage/app/images/".$file_array2[1], "./storage/app/images/".$file_array2[1]);
				} else {
					$file_array2[1] = null;
				}
				
				if($request->all_type == "Y") {
					$all_type = 'Y';
				} else {
					$all_type = 'N';
				}

				$insert_id = DB::table('board')->insertGetId(
					[
						'subject' => $request->subject,
						'contents' => $request->subject2,
						'category2' => $request->category2,
						'writer' => $request->writer,
						'ip_addr' => request()->ip(),
						'board_type' => $request->board_type,
						'attach_file' => $file_array[1],
						'attach_file2' => $file_array2[1],
						'parno' => 0,
						'prino' => $prino_now,
						'depth' => 1,
						'grp' => $grp_now,
						'start_period' => $request->start_period,
						'end_period' => $request->end_period,
						'use_status' => $request->use_status,
						'priority' => $request->priority,
						'i_width' => $request->i_width,
						'i_height' => $request->i_height,
						'pop_position' => $request->pop_position,
						'm_width' => $request->m_width,
						'm_height' => $request->m_height,
						'link_value' => $request->link_value,
						'all_type' => $all_type,
						'reg_date' => \Carbon\Carbon::now(),
					]
				);

				if(request()->segment(2) != 'acc' && request()->segment(2) != 'pcslider' && request()->segment(2) != 'popup') {
			
					$file = array();
					$i = 0;
					foreach($_FILES['writer_file2']['name'] as $key => $value) {

						$file['name'] = $_FILES['writer_file2']['name'][$key];
						$file['tmp_name'] = $_FILES['writer_file2']['tmp_name'][$key];
						$file['size'] = $_FILES['writer_file2']['size'][$key];

						$file2['name'] = $_FILES['writer_file_mobile2']['name'][$key];
						$file2['tmp_name'] = $_FILES['writer_file_mobile2']['tmp_name'][$key];
						$file2['size'] = $_FILES['writer_file_mobile2']['size'][$key];

						$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/storage/app/images/';

						$ext_str = "jpg,gif,png";
						$allowed_extensions = explode(',', $ext_str);

						$max_file_size = 5242880000000000;
						$ext = substr($file['name'], strrpos($file['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext, $allowed_extensions) && $file['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file['size'] >= $max_file_size && $file['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$ext2 = substr($file2['name'], strrpos($file2['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext2, $allowed_extensions) && $file2['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file2['size'] >= $max_file_size && $file2['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$path = md5(microtime()) . '.' . $ext;
						$path2 = md5(microtime()) . '.' . $ext2;

						if(move_uploaded_file($file['tmp_name'], $upload_directory.$path) && move_uploaded_file($file2['tmp_name'], $upload_directory.$path2)) {

							DB::table('file_list')->insert(
								[
									'sub_subject' => $request->sub_subject[$i],
									'sub_subject2' => $request->sub_subject2[$i],
									'sub_subject3' => $request->sub_subject3[$i],
									'board_type' => $request->board_type,
									'file_name' => $file['name'],
									'real_file_name' => $path,
									'file_name2' => $file2['name'],
									'real_file_name2' => $path2,
									'board_idx' => $insert_id,
									'priority' => $request->sub_slide_priority,
								]
							);					

							$i++;

							//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
							$file_id = md5(uniqid(rand(), true));
							$name_orig = $file['name'];
							$name_save = $path;

						}

					}


					$file = array();
					$i = 0;
					foreach($_FILES['writer_sub_file2']['name'] as $key => $value) {

						$file['name'] = $_FILES['writer_sub_file2']['name'][$key];
						$file['tmp_name'] = $_FILES['writer_sub_file2']['tmp_name'][$key];
						$file['size'] = $_FILES['writer_sub_file2']['size'][$key];

						$file2['name'] = $_FILES['writer_sub_file_mobile2']['name'][$key];
						$file2['tmp_name'] = $_FILES['writer_sub_file_mobile2']['tmp_name'][$key];
						$file2['size'] = $_FILES['writer_sub_file_mobile2']['size'][$key];

						$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/storage/app/images/';

						$ext_str = "jpg,gif,png";
						$allowed_extensions = explode(',', $ext_str);

						$max_file_size = 5242880000000000;
						$ext = substr($file['name'], strrpos($file['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext, $allowed_extensions) && $file['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file['size'] >= $max_file_size && $file['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$ext2 = substr($file2['name'], strrpos($file2['name'], '.') + 1);

						// 확장자 체크
						if(!in_array($ext2, $allowed_extensions) && $file2['name'] != "") {
							echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
							exit;
						}

						// 파일 크기 체크
						if($file2['size'] >= $max_file_size && $file2['name'] != "") {
							echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
							exit;
						}

						$path = md5(microtime()) . '.' . $ext;
						$path2 = md5(microtime()) . '.' . $ext2;
						if(move_uploaded_file($file['tmp_name'], $upload_directory.$path) && move_uploaded_file($file2['tmp_name'], $upload_directory.$path2)) {

							DB::table('file_list')->insert(
								[
									//'sub_subject' => $request->sub_subject[$i],
									//'sub_subject2' => $request->sub_subject2[$i],
									//'sub_subject3' => $request->sub_subject3[$i],
									'board_type' => $request->board_type,
									'file_name' => $file['name'],
									'real_file_name' => $path,
									'file_name2' => $file2['name'],
									'real_file_name2' => $path2,
									'board_idx' => $insert_id,
									'sub_main_status' => 'Y',
									'priority' => $request->sub_image_priority[$i],
								]
							);					

							$i++;

							//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
							$file_id = md5(uniqid(rand(), true));
							$name_orig = $file['name'];
							$name_save = $path;

						}

					}



				}

				echo "<script>alert('글 작성이 완료되었습니다.');location.href = '/ey_admin/".$request->board_type."';</script>";
				exit;

			}

		}
	}

	public function ey_acc(Request $request) {

		return view('ey_acc'); 

	}

	public function ey_beds(Request $request) {

		return view('ey_beds'); 

	}

	public function ey_press(Request $request) {

		return view('ey_press'); 

    }
    
    public function ey_media(Request $request) {

		return view('ey_media'); 

    }
    
    public function ey_board_list(Request $request) {

		if(request()->segment(2) != "notice") {
			$boardType = request()->segment(2);
		} else {
			$boardType = "notice";
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
				->orderBy('idx', 'desc');
				
		if($request->key != "") {
			$query->where(function($query) use($request){
				$query->where('subject', 'like', '%' . $request->key . '%')
				->orWhere('contents', 'like', '%' . $request->key . '%');
			});
		}

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
		$return_list["number"] = $number;
		$return_list["key"] = $request->key;
		$return_list["totalCount"] = $totalCount;
		$return_list["paging_view"] = $paging_view;
		$return_list["page"] = $thisPage;
		$return_list["key"] = $request->key;

		return view("ey_board_list", $return_list);

    }
    
    public function ey_moslider(Request $request) {

		return view('ey_moslider'); 

    }
    
    public function ey_pcpopup(Request $request) {

		return view('ey_pcpopup'); 

    }
    
    public function ey_mopopup(Request $request) {

		return view('ey_mopopup'); 

	}

    public function ey_write_notice(Request $request) {

		return view('ey_write_notice'); 

    }
    
}