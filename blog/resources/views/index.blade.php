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
                <li><a href="#none" class="new">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의견적문의견적...</a><span>20.04.21</span></li>
            </ul>
        </div>
    </div>
    <div class="notice_outer">
        <div class="notice_title">파우치인쇄 견적문의</div>
        <div class="notice_list">
            <ul>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
            </ul>
        </div>
    </div>
    <div class="notice_outer">
        <div class="notice_title">문의게시판 견적문의</div>
        <div class="notice_list">
            <ul>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
                <li><a href="#none">견적문의</a><span>20.04.21</span></li>
            </ul>
        </div>
    </div>
    <div class="notice_outer">
        <div class="notice_title">공지사항</div>
        <div class="notice_list">
            <ul>
                <li><a href="#none">공지사항</a><span>20.04.21</span></li>
                <li><a href="#none">공지사항</a><span>20.04.21</span></li>
                <li><a href="#none">공지사항</a><span>20.04.21</span></li>
                <li><a href="#none">공지사항</a><span>20.04.21</span></li>
                <li><a href="#none">공지사항</a><span>20.04.21</span></li>
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
            <div class="quality_box">
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
            </div>
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
    </ul>
    <div class="sale_more_btn">
        <a href="#none">더보기</a>
    </div>
</div>
@include('inc/footer')