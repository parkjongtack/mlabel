@include('/inc/head')
<div class="sub_sec product_view">
    <div class="sec_title">
        <div class="sec_title_inner">
            <h2>@if($_GET['board_type'] == 'sale_laebe')라벨인쇄@else파우치인쇄@endif</h2>
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
                            <p class="info_text">{{ $board_array->product_name }}</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">재질</p>
                            <p class="info_text">{{ $board_array->material_name }}</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">사이즈</p>
                            <p class="info_text">{{ $board_array->size }}</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">유형</p>
                            <p class="info_text">{{ $board_array->type_set }}</p>
                        </div>
                        <div class="info_line">
                            <p class="info_title">기타</p>
                            <p class="info_text">{{ $board_array->etc }}</p>
                        </div>
                    </div>
                    <a href="/sub/notice_write?board_type={{ $_GET['board_type'] }}">견적문의</a>
                </div>
            </div>
            <div class="info_nav">
                <a href="@if($_GET['board_type'] == 'sale_pouch') /sub/product/pouch?category2=all @else /sub/product/label?category2=all @endif">목록</a>
                @if($board_next_array_cnt > 0)
				<a href="/sub/product_view?idx={{ $board_next_array->idx }}&board_type={{ $_GET['board_type'] }}">다음글</a>
				@endif
				@if($board_past_array_cnt > 0)
                <a href="/sub/product_view?idx={{ $board_past_array->idx }}&board_type={{ $_GET['board_type'] }}">이전글</a>
				@endif
            </div>
<!-- 
 -->
            <div class="info_detail">
                <h3>상세설명</h3>
				{!! $board_array->contents !!}
                <!-- <img src="/img/detail_sample.png" alt=""> -->
            </div>
        </div>
    </div>
</div>
@include('/inc/footer')