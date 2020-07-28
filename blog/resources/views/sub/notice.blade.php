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
                <li><a href="/sub/notice1">공지사항</a></li>
                <li><a href="/sub/inquiry1">라벨인쇄 견적문의</a></li>
                <li><a href="/sub/inquiry2">파우치 견적문의</a></li>
                <li><a href="/sub/notice2">문의사항</a></li>
            </ul>
        </div>
        <script>
            $(function(){
                var url = "{{request()->segment(2)}}";
                switch (url){
                    case "notice1":
                        $(".sub_nav li").eq(0).addClass("on");
                        break;

                    case "inquiry1":
                        $(".sub_nav li").eq(1).addClass("on");
                        break;

                    case "inquiry2":
                        $(".sub_nav li").eq(2).addClass("on");
                        break;

                    case "notice2":
                        $(".sub_nav li").eq(3).addClass("on");
                        break;
                }
            })
        </script>
        {{--공지사항,문의사항--}}
        <div class="notice_table">
            <form action="">
                <select name="" id="">
                    <option value="" selected>제목</option>
                    <option value="" selected>작성자</option>
                </select>
                <input type="text">
                <input type="submit" value="검색">
            </form>
            @if(request()->segment(2) == "notice1" || request()->segment(2) == "notice2")
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
                <tr class="top_notice">
                    <td>공지</td>
                    <td><a href="#none">[필독] 파우치 인쇄 견적 문의 시 필요사항</a></td>
                    <td>명성파우치(주)</td>
                    <td>2020.02.01</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td><a href="#none">스파우트파치 견적 문의드립니다.</a></td>
                    <td>박**</td>
                    <td>2020.02.01</td>
                </tr>
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
                <tr class="top_notice">
                    <td>공지</td>
                    <td><a href="#none">[필독] 파우치 인쇄 견적 문의 시 필요사항</a></td>
                    <td>명성파우치(주)</td>
                    <td>2020.02.01</td>
                    <td></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td><a href="#none">스파우트파치 견적 문의드립니다.</a></td>
                    <td>박**</td>
                    <td>2020.02.01</td>
                    <td class="not_end"><span>접수</span></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td><a href="#none">스파우트파치 견적 문의드립니다.</a></td>
                    <td>박**</td>
                    <td>2020.02.01</td>
                    <td class="the_end"><span>답변완료</span></td>
                </tr>
            </table>
            @endif
            @if(request()->segment(2) != "notice1")
                <div class="write_box">
                    <a href="/sub/notice_write">글쓰기</a>
                </div>
            @endif
            <div class="paging">

            </div>
        </div>
        {{--견적문의--}}
    </div>
@include('inc/footer')