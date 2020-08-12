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
                <li class="on"><a href="/sub/notice1">공지사항</a></li>
                <li><a href="/sub/inquiry1">라벨인쇄 견적문의</a></li>
                <li><a href="/sub/inquiry2">파우치 견적문의</a></li>
                <li><a href="/sub/notice2">문의사항</a></li>
            </ul>
        </div>
        <div class="notice_write">
            <form action="">
                <div class="write_line">
                    <div class="write_title">
                        <p>업체명</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="">
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title">
                        <p>담당자명</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="">
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title">
                        <p>비밀번호</p>
                    </div>
                    <div class="write_input">
                        <input type="password" name="">
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title">
                        <p>연락처</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="">
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title">
                        <p>이메일</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="">
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title">
                        <p>제목</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="" class="x2">
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title textarea_outer">
                        <p>내용</p>
                    </div>
                    <div class="write_input">
                        <textarea name="" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title">
                        <p>링크</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="" class="x2">
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title">
                        <p>파일1</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="" readonly class="x2" id="file2_">
                        <label for="file2">첨부</label><input type="file" id="file2">
                    </div>
                </div>
                <div class="write_line">
                    <div class="write_title">
                        <p>파일2</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="" readonly class="x2" id="file3_">
                        <label for="file3">첨부</label><input type="file" id="file3">
                    </div>
                </div>
                <div class="write_line last">
                    <div class="write_title">
                        <p>자동등록방지</p>
                    </div>
                    <div class="write_input">
                        <input type="text" name="">
                    </div>
                </div>
                <div class="submit_box">
                    <input type="submit" value="작성완료">
                    <input type="reset" value="취소하기">
                </div>
            </form>
        </div>
    </div>
</div>
@include('/inc/footer')