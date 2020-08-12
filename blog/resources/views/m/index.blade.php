@include('/m/inc/head')
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
<div class="quality">
    <div class="">
        <div class="bg_top"></div>
        <div class="bg_bottom"></div>
        <div class="sec_title_con quality_title">
            <h2>명성라벨, 명성파우치(주)</h2>
            <p>명성라벨과 명성파우치(주)는 다년간<br> 노하우로 최고의 퀄리티를 자랑합니다.</p>
        </div>
        <div class="quality_box_con swiper-container">
            <div class="swiper-wrapper">
				@foreach($data2 as $data2)
                <div class="quality_box swiper-slide">
                    <div class="quality_bg" style="background: url(/storage/app/images/{{ $data2->attach_file }}) no-repeat center; background-size:cover;"></div>
                    <div class="quality_text">
                        <h4>{{ $data2->subject }}</h4>
                        {!! $data2->contents !!}
                    </div>
                    <div class="quality_btn"><img src="/img/quality_btn.png" alt=""></div>
                </div>
				@endforeach
                <!-- <div class="quality_box swiper-slide">
                    <div class="quality_bg"></div>
                    <div class="quality_text">
                        <h4>라벨 인쇄</h4>
                        <p>라벨 인쇄 인쇄라벨 인쇄</p>
                        <p>라벨 인쇄 인쇄라벨 인쇄</p>
                        <p>라벨 인쇄 인쇄라벨 인쇄</p>
                    </div>
                    <div class="quality_btn"><img src="/img/quality_btn.png" alt=""></div>
                </div>
                <div class="quality_box swiper-slide">
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
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<script>
    var swiper = new Swiper('.quality_box_con', {
                spaceBetween: 10,
                slidesPerView: 1.6,
                centeredSlides: true,
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
<div class="see_more_con">
    <div class="img">
        <img src="/img/see_more_con1.png" alt="">
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
    </ul>
    <div class="sale_more_btn">
        <a href="#none">더보기</a>
    </div>
</div>
<div class="see_more_con">
    <div class="img">
        <img src="/img/see_more_con2.png" alt="">
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
    </ul>
    <div class="sale_more_btn">
        <a href="#none">더보기</a>
    </div>
</div>
<div class="insta_area">
    <div class="inner">
        <div class="img">
            <img src="/img/insta_area.png" alt="">
        </div>
        <div class="go_btn">
            <a href="#none">&#64;myungsung_label</a>
            <a href="#none">&#64;myungsung_pouch</a>
        </div>
    </div>
</div>
@include('/m/inc/footer')