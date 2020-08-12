@include('/inc/head')
<div class="sub_sec product">
    <div class="sec_title">
        <div class="sec_title_inner">
            <h2>라벨인쇄</h2>
            <p>최고의 퀄리티를 위한 최상의 장비를 보유하고 있습니다.</p>
        </div>
    </div>
    <div class="inner">
        <div class="sub_nav">
            <ul>
                @if(request()->segment(3) == 'label')
                <li @if($_GET['category2'] == 'all') class="on" @endif onclick="javascript:location.href='/sub/product/label?category2=all';">전체보기</li>
                <li @if($_GET['category2'] == '1') class="on" @endif onclick="javascript:location.href='/sub/product/label?category2=1';">화장품</li>
                <li @if($_GET['category2'] == '2') class="on" @endif onclick="javascript:location.href='/sub/product/label?category2=2';">제약</li>
                <li @if($_GET['category2'] == '3') class="on" @endif onclick="javascript:location.href='/sub/product/label?category2=3';" class="last">생활용품</li>
                <li @if($_GET['category2'] == '4') class="on" @endif onclick="javascript:location.href='/sub/product/label?category2=4';">주방용품</li>
                <li @if($_GET['category2'] == '5') class="on" @endif onclick="javascript:location.href='/sub/product/label?category2=5';">식품</li>
                <li @if($_GET['category2'] == '6') class="on" @endif onclick="javascript:location.href='/sub/product/label?category2=6';">의류</li>
                <li @if($_GET['category2'] == '7') class="on" @endif onclick="javascript:location.href='/sub/product/label?category2=7';">화학</li>
                @else
                <li @if($_GET['category2'] == 'all') class="on" @endif onclick="javascript:location.href='/sub/product/pouch?category2=all';">전체보기</li>
                <li @if($_GET['category2'] == '1') class="on" @endif onclick="javascript:location.href='/sub/product/pouch?category2=1';">스파우트</li>
                <li @if($_GET['category2'] == '2') class="on" @endif onclick="javascript:location.href='/sub/product/pouch?category2=2';">지퍼스탠드</li>
                <li @if($_GET['category2'] == '3') class="on" @endif onclick="javascript:location.href='/sub/product/pouch?category2=3';" class="last">지퍼백</li>
                <li @if($_GET['category2'] == '4') class="on" @endif onclick="javascript:location.href='/sub/product/pouch?category2=4';">스택드업</li>
                <li @if($_GET['category2'] == '5') class="on" @endif onclick="javascript:location.href='/sub/product/pouch?category2=5';">삼방</li>
                <li @if($_GET['category2'] == '6') class="on" @endif onclick="javascript:location.href='/sub/product/pouch?category2=6';">스틱롤</li>
                <li @if($_GET['category2'] == '7') class="on" @endif onclick="javascript:location.href='/sub/product/pouch?category2=7';">M방</li>
                @endif
            </ul>
        </div>
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
                </ul>
            </div>
        </div>
    </div>
</div>
@include('/inc/footer')