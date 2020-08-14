@include('/inc/head')
<div class="sub_sec company">
    <div class="sec_title">
        <div class="sec_title_inner">
            <h2>회사소개</h2>
            <p>명성라벨과 명성파우치(주)는 고객 만족을 위해 최선을 다합니다.</p>
        </div>
    </div>
    <div class="inner">
        <div class="sub_nav">
            <ul>
                <li>CEO 인사말</li>
                <li>연혁</li>
                <li>비전</li>
                <li>오시는 길</li>
                <li>거래처 및 인증서</li>
            </ul>
        </div>
        <script>
            $(function(){
                var url = "{{ $_GET['page'] }}";
                switch (url){
                    case "1":
                        $(".sub_nav li").eq(0).addClass("on");
                        break;

                    case "2":
                        $(".sub_nav li").eq(1).addClass("on");
                        break;

                    case "3":
                        $(".sub_nav li").eq(2).addClass("on");
                        break;

                    case "4":
                        $(".sub_nav li").eq(3).addClass("on");
                        break;
                    case "5":
                        $(".sub_nav li").eq(3).addClass("on");
                        break;
                }
            });
        </script>
        <div class="sub_layout lay1 on">
            <h2>
                <span class="blue">고객</span>의 <span class="org">성공이</span><br>
                <span class="blue">명성라벨</span>과 <span class="blue">명성파우치(주)</span>의 <span class="org">성공</span>입니다.
            </h2>
            <p>
                안녕하세요 <span class="blue">명성라벨, 명성파우치(주)</span> 대표 박용현입니다.<br>
                명성라벨과 명성파우치(주)를 이용해 주시는 고객 여러분께 감사드립니다.<br>
                <span class="blue">“더 빠르고, 더 정확하게, 더 신속하게”</span>를 외치며 지난 25년을 정신없이 달려왔습니다.<br>
                고객 여러분의 성원 덕분에 <span class="blue">명성라벨</span>에 이어 <span class="blue">명성파우치(주)</span>를 확장하게 되었습니다.<br>
                            <br>
                명성라벨은 1994년에 설립하여 30년 이상의 인쇄경력을 바탕으로 풍부한 경험과 기술력 확보 및<br>
                2016년 수지 CTP 도입으로 타 회사보다 인쇄 퀄리티에서 앞선 기술력으로 차별화를 두고 있습니다.<br>
                            <br>
                <b>필름 출력 후 제판으로 했던 작업을</b><br>
                CTP출력으로 진행하여 해상도 상승, 빠른 속도, 가격 경쟁력 및 월등한 인쇄 퀄리티가 가능하며<br>
                3단계 QC를 통하여 우수한 제품만 출고합니다.<br>
                            <br>
                <b>로타리 8도 인쇄기 4대 보유 및 무동판 소량 파우치인쇄</b><br>
                2중지, 3중2지, 배면라벨, 도난방지, 홀로그램, 온도변화라벨, 팬시라벨, 금박, 형합, 타공, 부분코팅, 라벨부착,<br>
                무동판 소량 파우치인쇄, 실크인쇄 및 부분 골작업, POP인쇄 시스템이 되어 있어<br>
                업체에서 요구하는 퀄리티 높은 제품을 만등 수 있으며 2교대로 풀가동 되고 있습니다.<br>
                            <br>
                화장품 업체, 대기업 건강식품 및 제약회사 등 300여 곳이 넘는 거래처 제품을<br>
                인쇄하고 납품하여 최고의 만족을 통해 반품 없이 꾸준히 이어가고 있습니다.<br>
                            <br>
                현재 기업 및 개인고객 모두와 신뢰를 바탕으로 꾸준히 거래하고 있으며<br>
                신규 업체가 계속해서 증가하고 있습니다.<br>
                이에 고객 여러분의 더 높은 만족을 위해 끊임없는 기술 개발을 통해<br>
                더욱 성장하여 고객에게 신뢰와 감동을 드리기 위해 최선을 다하는<br>
                <span class="blue">명성라벨, 명성파우치(주)</span>가 되겠습니다.
            </p>
            <img src="/img/company_sign.png" alt="">
        </div>
        <div class="sub_layout lay2">
            <h1>2019</h1>
            <div class="lay2_list">
                <p><span>01</span> 연혁</p>
                <p><span>02</span> 연혁</p>
                <p><span>03</span> 연혁</p>
                <p><span>04</span> 연혁</p>
                <p><span>05</span> 연혁</p>
                <p><span>06</span> 연혁</p>
                <p><span>07</span> 연혁</p>
            </div>
        </div>
        <div class="sub_layout lay3">
            <div class="img_area">
                <img src="/img/company_lay3_1.png" alt="">
            </div>
            <div class="text_area">
                <div class="text_box">
                    <h3>Creative & Printing</h3>
                    <p>
                        크리에이티브하고 혁신적인 방법으로 프린팅(패키지, 비닐, 라벨), 의료용 유리용기 엠플,<br>
                        카트리지, 소량 파우치 등 인쇄를 전문으로 하는 생산업체입니다.<br>
                        혁신적인 기술과 품질의 자부심을 통해 보다 차별화된 제작물을 만들어 갑니다.
                    </p>
                </div>
                <div class="text_box">
                    <h3>Technology lnfra</h3>
                    <p>
                        시스템의 차이가 결과의 차이를 만듭니다.<br>
                        매년 50억의 매출 달성, 의약품부터 화장품, 프린팅까지 글로벌 시대에 발맞추어 나아가는<br>
                        명성라벨, 명성파우치(주)는 고객 만족을 최우선으로 하는 회사입니다.
                    </p>
                </div>
                <div class="text_box">
                    <h3>국내유일! 최신형 인쇄기 보유</h3>
                    <p>
                        국내 최대인쇄 가능폭(640*420mm), 최고의 성능과 품질을 자랑하는 최신형 도입으로<br>
                        고품질 인쇄 및 짧은 시간 제작이 가능해졌습니다.<br>
                        “더 빠르고, 더 정확하게, 더 신속하게”를 외치며 지난 25년을 정신없이 달려왔습니다.
                    </p>
                </div>
                <div class="text_box">
                    <h3>국내 1호 기계 WJPS를 통한 풀컬러 파우치(8도) 인쇄</h3>
                    <p>
                        최상의 디자인을 표현할 수 있는 완벽한 컬러표현이 가능합니다. 모든 임직원들도<br>
                        7도 인쇄를 한번에 표현할 수있는 High Quality를 자부심으로 생각합니다.<br>
                        식품과 화장품, 프린팅 산업의 다양한 부자재를 기준 이상의 품질과 정확한 납기 준수를<br>
                        통해 고객에게 신뢰와 감동을 드리기 위해 최선을 다할 것을 약속드립니다.
                    </p>
                </div>
            </div>
        </div>
        <div class="sub_layout lay4">
        </div>
        <div class="sub_layout lay5">
            <p>300여 곳이 넘는 거래처와 신뢰를 바탕으로 꾸준히 거래하고 있습니다.</p>
            <div class="img_area">
                <img src="/img/company_lay5_1.png" alt="">
            </div>
            <p>명성라벨과 명성파우치(주)의 인증서입니다.</p>
            <div class="img_area">
                <img src="/img/company_lay5_2.png" alt="">
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        var para = 'lay{{@$_GET[page]}}';
        $(".sub_layout").removeClass('on');
        $("."+para).addClass("on");
    });
</script>
@include('inc/footer')