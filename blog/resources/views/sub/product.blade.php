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
                <li class="on">전체보기</li>
                <li>화장품</li>
                <li>제약</li>
                <li class="last">생활용품</li>
                <li>주방용품</li>
                <li>식품</li>
                <li>의류</li>
                <li>화학</li>
                @else
                <li class="on">전체보기</li>
                <li>스파우트</li>
                <li>지퍼스탠드</li>
                <li class="last">지퍼백</li>
                <li>스택드업</li>
                <li>삼방</li>
                <li>스틱롤</li>
                <li>M방</li>
                @endif
            </ul>
        </div>
        <div class="product sub_layout on">
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
            </div>
        </div>
    </div>
</div>
@include('/inc/footer')