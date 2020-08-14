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
        {{--공지사항,문의사항--}}
        <div class="notice_table">
            <form action="/sub/notice?board_type={{ $_GET['board_type'] }}" name="board_write_form" method="get" enctype="multipart/form-data">
                    
                    <input type="hidden" value="{{ $_GET['board_type'] }}" name="board_type">
                    <input type="hidden" value="search" name="search">
                <select name="search_type" id="">
                    <option value="subject" selected>제목</option>
                    <option value="writer">작성자</option>
                </select>
                <input type="text" name="search_word">
                <input type="submit" value="검색">
            </form>
            @if($_GET['board_type'] == "notice" || $_GET['board_type'] == "inquiry")
            <table>
                <colgroup>
                    <col width=120>
                    <col width=820>
                    <col width=165>
                    <col width=165>
                </colgroup>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일</th>
                </tr>
                @foreach($data as $data)
                    @if($data->top_type == 'Y')
                <tr class="top_notice">
                    <td>공지</td>
                    
                    <td><a href="/sub/notice_view?board_type={{ $_GET['board_type'] }}&board_idx={{ $data->idx }}">{{ $data->subject }}</a></td>
                    <td>명성파우치(주)</td>
                    <td>{{ substr($data->reg_date, 0 ,10) }}</td>
                </tr>
                    @else
                <tr>
                    <td>{{ $number-- }}</td>
                    
                    <td><a href="/sub/notice_view?board_type={{ $_GET['board_type'] }}&board_idx={{ $data->idx }}">{{ $data->subject }}</a></td>
                        @if($data->writer == 'admin')
                    <td>명성파우치(주)</td>
                        @else
                    <td>{{ $data->manager_name }}</td>
                        @endif
                    <td>{{ substr($data->reg_date, 0 ,10) }}</td>
                </tr>
                    @endif
                @endforeach
            </table>
                @else
            <table>
                <colgroup>
                    <col width=120>
                    <col width=700>
                    <col width=165>
                    <col width=165>
                    <col width=140>
                </colgroup>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일</th>
                    <th>진행상태</th>
                </tr>
                @foreach($data as $data)
                @if($data->top_type == 'Y')
                <tr class="top_notice">
                    <td>공지</td>
                    <td><a href="/sub/notice_view?board_type={{ $_GET['board_type'] }}&board_idx={{ $data->idx }}">{{ $data->subject }}</a></td>
                    <td>{{ $data->writer }}</td>
                    <td>{{ substr($data->reg_date, 0 ,10) }}</td>
                    <td></td>
                </tr>
                @else
                <tr>
                    <td>{{ $number-- }}</td>
                    <td><a href="/sub/notice_view?board_type={{ $_GET['board_type'] }}&board_idx={{ $data->idx }}">{{ $data->subject }}</a></td>
                    <td>{{ $data->writer }}</td>
                    <td>{{ substr($data->reg_date, 0 ,10) }}</td>
                    @if($data->use_status == 'Y')
                    <td class="the_end"><span>답변완료</span></td>
                    @else
                    <td class="not_end"><span>접수</span></td>
                    @endif
                </tr>
                @endif
                @endforeach
            </table>
            @endif
            @if($_GET['board_type'] != "notice")
                <div class="write_box">
                    <a href="/sub/notice_write?board_type={{ $_GET['board_type'] }}">글쓰기</a>
                </div>
            @endif
            <div class="paging">

            </div>
        </div>
        {{--견적문의--}}
    </div>
@include('inc/footer')