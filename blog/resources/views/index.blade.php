@include('/inc/head')
<div class="main_slider swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            @foreach($data as $data)
            <a href="{{$data->link_value}}"><img src="/storage/app/images/{{$data->attach_file}}" alt=""></a>
            @endforeach
            
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<script>
    var swiper = new Swiper('.main_slider', {
                spaceBetween: 10,
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction :false,
                },
                pagination: {
                  el: '.swiper-pagination',
                  clickable: true,
                },
            });
</script>
<div class="notice_con inner">
    <div class="notice_outer">
        <div class="notice_title">라벨인쇄 견적문의</div>
        <div class="notice_list">
            <ul>
				@foreach($board_label as $board_label)
                <li><a href="#none">{{ $board_label->subject }}</a><span>{{ $board_label->reg_date_cut }}</span></li>
                @endforeach
				<!-- <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의견적문의견적...</a><span>20.04.21</span></li> -->
            </ul>
        </div>
    </div>
    <div class="notice_outer">
        <div class="notice_title">파우치인쇄 견적문의</div>
        <div class="notice_list">
            <ul>
				@foreach($board_pouch as $board_pouch)
                <li><a href="#none">{{ $board_pouch->subject }}</a><span>{{ $board_pouch->reg_date_cut }}</span></li>
                @endforeach
                <!-- <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li> -->
            </ul>
        </div>
    </div>
    <div class="notice_outer">
        <div class="notice_title">문의게시판 견적문의</div>
        <div class="notice_list">
            <ul>
				@foreach($board_inquiry as $board_inquiry)
                <li><a href="#none">{{ $board_inquiry->subject }}</a><span>{{ $board_inquiry->reg_date_cut }}</span></li>
                @endforeach
                <!-- <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li> -->
            </ul>
        </div>
    </div>
    <div class="notice_outer">
        <div class="notice_title">공지사항</div>
        <div class="notice_list">
            <ul>
				@foreach($board_notice as $board_notice)
                <li><a href="#none">{{ $board_notice->subject }}</a><span>{{ $board_notice->reg_date_cut }}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="quality">
    <div class="inner">
        <div class="bg_top"></div>
        <div class="bg_bottom"></div>
        <div class="sec_title_con quality_title">
            <h2>명성라벨, 명성파우치(주)</h2>
            <p>명성라벨과 명성파우치(주)는 다년간 노하우로 최고의 퀄리티를 자랑합니다.</p>
        </div>
        <div class="quality_box_con">
			@foreach($data2 as $data2)
            <div class="quality_box">
                <div class="quality_bg" style="background: url(/storage/app/images/{{ $data2->attach_file }}) no-repeat center; background-size:cover;"></div>
                <div class="quality_text">
                    <h4>{{ $data2->subject }}</h4>
                    <!-- <p>라벨 인쇄 인쇄라벨 인쇄</p>
                    <p>라벨 인쇄 인쇄라벨 인쇄</p>
                    <p>라벨 인쇄 인쇄라벨 인쇄</p> -->
					{!! $data2->contents !!}
                </div>
                <div class="quality_btn" style="cursor:pointer;" onclick="javascript:location.href=''"><img src="/img/quality_btn.png" alt=""></div>
            </div>
			@endforeach
            <!-- <div class="quality_box">
                <div class="quality_bg"></div>
                <div class="quality_text">
                    <h4>라벨 인쇄</h4>
                    <p>라벨 인쇄 인쇄라벨 인쇄</p>
                    <p>라벨 인쇄 인쇄라벨 인쇄</p>
                    <p>라벨 인쇄 인쇄라벨 인쇄</p>
                </div>
                <div class="quality_btn"><img src="/img/quality_btn.png" alt=""></div>
            </div>
            <div class="quality_box">
                <div class="quality_bg"></div>
                <div class="quality_text">
                    <h4>라벨 인쇄</h4>
                    <p>라벨 인쇄 인쇄라벨 인쇄</p>
                    <p>라벨 인쇄 인쇄라벨 인쇄</p>
                    <p>라벨 인쇄 인쇄라벨 인쇄</p>
                </div>
                <div class="quality_btn"><img src="/img/quality_btn.png" alt=""></div>
            </div> -->
        </div>
        <div class="quality_nav">
            <ul>
                <li><a href="#none"><img src="/img/quality_nav1.png" alt=""></a></li>
                <li><a href="#none"><img src="/img/quality_nav2.png" alt=""></a></li>
                <li><a href="#none"><img src="/img/quality_nav3.png" alt=""></a></li>
                <li><a href="#none"><img src="/img/quality_nav4.png" alt=""></a></li>
                <li><a href="#none"><img src="/img/quality_nav5.png" alt=""></a></li>
                <li><a href="#none"><img src="/img/quality_nav6.png" alt=""></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="see_more_con">
    <div class="see_more_text">
        <div class="img_area"><img src="/img/more_con_text01.png" alt=""></div>
        <div class="see_more_btn">
            <a href="#none">자세히 보기 ></a>
        </div>
    </div>
    <div class="see_more_img">
        <img src="/img/more_con_img01.png" alt="">
    </div>
</div>
<div class="sale_con">
    <ul class="inner">
		@foreach($board_sale_label as $board_sale_label)
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/storage/app/images/{{ $board_sale_label->attach_file }}" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>{{ $board_sale_label->subject }}</h4>
                    <p>{!! $board_sale_label->contents !!}</p>
                </div>
            </a>
        </li>
		@endforeach
        <!-- <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li> -->
    </ul>
    <div class="sale_more_btn">
        <a href="#none">더보기</a>
    </div>
</div>
<div class="see_more_con num2">
    <div class="see_more_img">
        <img src="/img/more_con_img02.png" alt="">
    </div>
    <div class="see_more_text">
        <div class="img_area"><img src="/img/more_con_text02.png" alt=""></div>
        <div class="see_more_btn">
            <a href="#none">자세히 보기 ></a>
        </div>
    </div>
</div>
<div class="sale_con">
    <ul class="inner">
		@foreach($board_sale_pouch as $board_sale_pouch)
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/storage/app/images/{{ $board_sale_pouch->attach_file }}" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>{{ $board_sale_pouch->subject }}</h4>
                    <p>{!! $board_sale_pouch->contents !!}</p>
                </div>
            </a>
        </li>
		@endforeach
        <!-- <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li>
        <li>
            <a href="#none">
                <div class="sale_img_box">
                    <img src="/img/sale_img.png" alt="">
                </div>
                <div class="sale_text_box">
                    <h4>제품</h4>
                    <p>텍스트</p>
                </div>
            </a>
        </li> -->
    </ul>
    <div class="sale_more_btn">
        <a href="#none">더보기</a>
    </div>
</div>
@include('inc/footer')