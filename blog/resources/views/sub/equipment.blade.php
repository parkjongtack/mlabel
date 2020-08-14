@include('/inc/head')
<div class="sub_sec equipment">
    <div class="sec_title">
        <div class="sec_title_inner">
            <h2>보유장비</h2>
            <p>최고의 퀄리티를 위한 최상의 장비를 보유하고 있습니다.</p>
        </div>
    </div>
    <div class="inner">
        <div class="sub_nav">
            <ul>
                <li @if($_GET['category2'] == '1') class="on" @endif onclick="javascript:location.href='/sub/equipment?category2=1';">라벨인쇄설비</li>
                <li @if($_GET['category2'] == '2') class="on" @endif onclick="javascript:location.href='/sub/equipment?category2=2';">라벨제판설비</li>
                <li @if($_GET['category2'] == '3') class="on" @endif onclick="javascript:location.href='/sub/equipment?category2=3';">라벨부착설비</li>
                <li @if($_GET['category2'] == '4') class="on" @endif onclick="javascript:location.href='/sub/equipment?category2=4';">파우치인쇄설비</li>
                <li @if($_GET['category2'] == '5') class="on" @endif onclick="javascript:location.href='/sub/equipment?category2=5';">파우치제판설비</li>
            </ul>
        </div>
        <style>
            .iframe_bg_outer{display: none;}
            .iframe_bg{position:fixed; top:0; left:0; width:100vw; height: 100vh; background-color: rgba(0,0,0,0.5);z-index:999;}
            iframe{position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); width:80vw; height:40vw; min-width:800px; min-height:400px;z-index:999; border: 0;}
            .close_btn{color: #fff; font-size: 30px; position: fixed; top: 10vh;left: 90vw;}
        </style>
        <div class="iframe_bg_outer">
            <div class="iframe_bg">
                <div class="close_btn"><i class="far fa-window-close" style="cursor: pointer"></i></div>
                <iframe src="" id="video_view"></iframe>
            </div>
        </div>
        <div class="equipment sub_layout on">
            @foreach($board_equipment as $board_equipment)
			<div class="equipment_list">
                <div class="img_area">
                    <img src="https://img.youtube.com/vi/{{ $board_equipment->link_key }}/0.jpg" alt="">
                </div>
                <div class="text_area">
                    <h2>{{ $board_equipment->subject }}</h2>
                    <!-- <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p> -->
                    <div class="line"></div>
                    <!-- <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p> -->
					{!! $board_equipment->contents !!}
                    <a href="#none" onclick="javascript:video_view_src('{{ $board_equipment->link_value }}');">영상보기</a>
                </div>
            </div>
			@endforeach
        </div>
        <script>
            $('.close_btn').click(function(){
                $(".iframe_bg_outer").hide(500);
            });
                function video_view_src(src) {
                    $("#video_view").attr("src",src);

                    $(".iframe_bg_outer").show(500);
                }

        </script>
            <!-- <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div> -->
            </div>
        </div>
        <!-- <div class="equipment sub_layout">
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
        </div>
        <div class="equipment sub_layout">
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
        </div>
        <div class="equipment sub_layout">
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
            <div class="equipment_list">
                <div class="img_area">
                    <img src="/img/sample_img1.png" alt="">
                </div>
                <div class="text_area">
                    <h2>WJPS-660 OPPSET (옵셋)</h2>
                    <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p>
                    <div class="line"></div>
                    <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p>
                    <a href="#none">영상보기</a>
                </div>
            </div>
        </div> -->
    </div>
</div>
@include('/inc/footer')