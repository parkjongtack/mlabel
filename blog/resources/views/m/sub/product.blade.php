@include('/m/inc/head')
<div class="sub_sec product">
    <div class="sec_title">
        <div class="sec_title_inner">
            <h2>라벨인쇄</h2>
            <p>최고의 퀄리티를 위한<br>최상의 장비를 보유하고 있습니다.</p>
        </div>
    </div>
    <div class="inner">
        <div class="product sub_layout on">
            <div class="sale_con">
                <ul class="inner">
                @if(request()->segment(3) == 'label')
				 	@foreach($board_sale_label as $board_sale_label)
                    <li>
                        <a href="/sub/product_view?idx={{ $board_sale_label->idx }}&board_type={{ $board_sale_label->board_type }}">
                            <div class="sale_img_box">
                                <img src="/storage/app/images/{{ $board_sale_label->attach_file }}" alt="">
                            </div>
                            <div class="sale_text_box">
                                <h4>{{ $board_sale_label->subject }}</h4>
                                {!! $board_sale_label->contents !!}
                            </div>
                        </a>
                    </li>
                    @endforeach
				@else
					@foreach($board_sale_pouch as $board_sale_pouch)
                    <li>
                        <a href="/sub/product_view?idx={{ $board_sale_pouch->idx }}&board_type={{ $board_sale_pouch->board_type }}">
                            <div class="sale_img_box">
                                <img src="/storage/app/images/{{ $board_sale_pouch->attach_file }}" alt="">
                            </div>
                            <div class="sale_text_box">
                                <h4>{{ $board_sale_pouch->subject }}</h4>
                                {!! $board_sale_pouch->contents !!}
                            </div>
                        </a>
                    </li>
                    @endforeach
				@endif
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
                    <div class="sale_more_btn">
                        <a href="#none">더보기</a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
@include('/m/inc/footer')