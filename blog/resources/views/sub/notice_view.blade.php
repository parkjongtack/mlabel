@include('/inc/head')
<div class="sub_sec notice">
    <div class="sec_title">
        <div class="sec_title_inner">
            <h2>견적문의</h2>
            <p>문의 사항을 남겨주시면 담당자가 답변을 남겨드립니다.</p>
        </div>
    </div>
    <div class="inner">
        <div class="sub_nav">
            <ul>
                <li><a href="/sub/notice?board_type=notice">공지사항</a></li>
                <li><a href="/sub/notice?board_type=label">라벨인쇄 견적문의</a></li>
                <li><a href="/sub/notice?board_type=pouch">파우치 견적문의</a></li>
                <li><a href="/sub/notice?board_type=inquiry">문의사항</a></li>
            </ul>
        </div>
        <script>
            $(function(){
                var url = "{{ $_GET['board_type'] }}";
                switch (url){
                    case "notice":
                        $(".sub_nav li").eq(0).addClass("on");
                        break;

                    case "label":
                        $(".sub_nav li").eq(1).addClass("on");
                        break;

                    case "pouch":
                        $(".sub_nav li").eq(2).addClass("on");
                        break;

                    case "inquiry":
                        $(".sub_nav li").eq(3).addClass("on");
                        break;
                }

            });
        </script>
        <div class="notice_view">
            <div class="notice_print">
                <h2>{{ $data->subject }}</h2>
                <div class="subject_info">
                    <div class="info">
                        작성자&nbsp;&nbsp;&nbsp;&nbsp;<b>@if($data->writer == 'admin')명성파우치(주)@else{{ $data->manager_name }}@endif</b>
                    </div>
                    <div class="reg_time">
                    {{ $data->reg_date }}
                    </div>
                </div>
                <div class="contents">
                    <p>업체명 : {{ $data->subject }}</p>
                    <p>담당자명 : {{ $data->manager_name }}</p>
                    <p>연락처 : {{ $data->tel }}</p>
                    <p>이메일 : {{ $data->email }}</p>
                    <p>문의내용 : {!! $data->contents !!}</p>
                </div>
            </div>
            <div class="reply_input">
                <form action="/sub/notice/write_board_action" name="board_write_form" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $data->idx }}" name="board_idx">
                    <input type="hidden" value="{{ $data->depth }}" name="depth">
                    <input type="hidden" value="{{ $data->depth2 }}" name="depth2">
                    <input type="hidden" value="{{ $data->grp }}" name="grp">
                    <input type="hidden" value="{{ $data->grp2 }}" name="grp2">
                    <input type="hidden" value="{{ $data->board_type }}" name="reply_type">
                    <input type="hidden" value="reply" name="reply_type">
                    <label>작성자 : <input type="text" style="width:100px;" name="reply_name"></label>
                    내용 : <textarea style="resize: none;" name="reply_content"></textarea>
                    <input type="submit" value="댓글쓰기">
                </form>
            </div>
            <div class="reply_read">
                <p class="reply_title">댓글</p>
                @foreach($board_reply as $board_reply)
                <div class="reply_outer">
                    <span>{{ $board_reply->reply_name }}</span>
                    <span>{{ $board_reply->reply_content }}</span>
                    <span>{{ $board_reply->reg_date }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('/inc/footer')