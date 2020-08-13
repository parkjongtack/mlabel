@include('/inc/head')
<div class="sub_sec product_view">
    <div class="sec_title">
        <div class="sec_title_inner">
            <h2>라벨인쇄</h2>
            <p>최고의 퀄리티를 위한 최상의 장비를 보유하고 있습니다.</p>
        </div>
    </div>
    <div class="inner">
        <div class="product_detail">
            <div class="info_outer">
                <div class="img_area">
                    <img src="/storage/app/images/{{ $board_array->attach_file }}" alt="">
                </div>
                <div class="text_area">
                    <h2>{{ $board_array->subject }}</h2>
                    <div class="info_box">
                        <div class="info_line">
                            <p class="info_title">업체명</p>
                            <p class="info_text">{{ $board_array->corp_name }}</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">제품명</p>
                            <p class="info_text">짜먹는 청귤 젤리</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">재질</p>
                            <p class="info_text">PET + AL + NY + LLDPE</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">사이즈</p>
                            <p class="info_text">90 * 130 * 50</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">유형</p>
                            <p class="info_text">스탠드 스파우트 파우치</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">기타</p>
                            <p class="info_text"></p>
                        </div>
                    </div>
                    <a href="#none">견적문의</a>
                </div>
            </div>
            <div class="info_nav">
                <a href="#none">목록</a>
                <a href="#none">다음글</a>
                <a href="#none">이전글</a>
            </div>
            <div class="info_detail">
                <h3>상세설명</h3>
                <img src="/img/detail_sample.png" alt="">
            </div>
        </div>
    </div>
</div>
@include('/inc/footer')