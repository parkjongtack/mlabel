@include('/m/inc/head')
<div class="sub_sec equipment">
    <div class="sec_title">
        <div class="sec_title_inner">
            <h2>보유장비</h2>
            <p>최고의 퀄리티를 위한 최상의 장비를 보유하고 있습니다.</p>
        </div>
    </div>
    <div class="inner">
        <div class="equipment sub_layout on">
            @foreach($board_equipment as $board_equipment)
			<div class="equipment_list">
                <div class="img_area">
                    <img src="/storage/app/images/{{ $board_equipment->attach_file }}" alt="">
                </div>
                <div class="text_area">
                    <h2>{{ $board_equipment->subject }}</h2>
                    <!-- <p class="sub_title">국내 단 1대! 8도 인쇄 가능! 최상의 출력물!</p> -->
                    <div class="line"></div>
                    <!-- <p>동판이 필요없는 파우치 인쇄 장비입니다.</p>
                    <p>소량 다품종에 최적화 되었으며 최고의 퀄리티를 자랑합니다.</p> -->
					{!! $board_equipment->contents !!}
                    <a href="#none">영상보기</a>
                </div>
            </div>
			@endforeach
        </div>
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
@include('/m/inc/footer')