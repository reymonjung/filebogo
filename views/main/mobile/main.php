<?php $this->managelayout->add_css(base_url('assets/js/fancybox/jquery.fancybox-1.3.4.css')); ?>
<?php $this->managelayout->add_js(base_url('assets/js/bxslider/plugins/jquery.fitvids.js')); ?>
<?php $this->managelayout->add_js(base_url('assets/js/fancybox/jquery.mousewheel-3.0.4.pack.js')); ?>
<?php $this->managelayout->add_js(base_url('assets/js/fancybox/jquery.fancybox-1.3.4.js')); ?>



<script type="text/javascript">
$(document).ready(function() { 

    $("a[rel=example_group]").fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'titlePosition'     : 'over',
        'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });
   // $('section.slide ul li').css('display','block');
    $('.slide ul').bxSlider({
        //work method
        mode: 'horizontal', // 'horizontal' : 좌,우 'vertical' : 상,하 'fade' : fade in, out
        speed: 1000, // m/s ex > 1000 = 1s
        easing: 'ease-in-out', // 동작 가속도 css와 동일
        slideMargin:0, // img와 img 사이 간격
        startSlide: 0, // 시작시 로드될 이미지 (0부터시작)
        preloadImages: 'visible', // "visible"은 보여질때 이미지를 로드, "all"로 설정하면 이미지가 모드 로드되야 작동.
        randomStart: false, //시작시 랜덤으로 이미지 로드 여부 (boolean)
        adaptiveHeight:true, //각 이미지의 높이에 따라 슬라이더 높이의 유동적 조절 여부
        adaptiveHeightSpeed: 300, //adaptiveHeight 동작속도
        video: true,//slide에 video 사용여부, 사용할 시에 plugins/jquery.fitvids.js include 필요
        captions:false, // img 태그에 title 속성값을 사용할시, 그부분의 출력여부 단, css .bx-wrapper .bx-caption 부분 조절 필요

        //responsive method
        responsive: true,//반응형 지원 여부

        touchEnabled: true,//터치스와이프 기능 사용여부
        swipeThreshold: 50,//터치하여 스와이프 할때 변환 효과에 소모되는 시간 설정
        oneToOneTouch: true, // fade 효과가 아닌 슬라이드는 손가락의 접지상태에 따라 슬라이드를 움직일수있다.
        preventDefaultSwipeX: true, // onoToOneTouch 에서 true일 경우, 손가락을따라 x축으로 움직일지에 대한 여부
        preventDefaultSwipeY:false , // onoToOneTouch 에서 true일 경우, 손가락을따라 y축으로 움직일지에 대한 여부

        //control method
        controls: false, // 좌,우 컨트롤 버튼 출력 여부

        auto: true, // 자동 재생 활성화
        autoControls:false, //자동재생 제어버튼 활성화  단, auto 모드가 활성화 되어있어야함.

        autoControlsCombine:false, // 재생시 중지버튼 활성화, 중지시 재생버튼 활성화
        pause:4000, // 자동 재생 시 각 슬라이드 별 노출 시간
        autoStart: true, // 페이지 로드가 되면, 슬라이드의 자동시작 여부
        autoDirection: 'next', // 자동 재생 시에 정순, 역순(prev) 방식 설정
        autoHover: true, // 슬라이드 오버시 재생 중단 여부 (false: 오버무시) 
        autoDelay:0, // 자동 재생 전 대기 시간 설정
        hideControlOnEnd: false, //첫번째 슬라이드 일경우 이전 버튼 삭제, 마지막 슬라이드 일 경우 다음 버튼 삭제 단, infiniteLoop: false 일 경우만 사용 가능.
        infiniteLoop: true,//마지막에 도달 했을시, 첫페이지로 갈 것인가 멈출것인가

        onSliderLoad: function(){
            $('section.slide').css('visibility','visible');
          // swipedisable(document.getElementById('bxslider'));

        //   $(".bxslider").parent().height($(".bxslider").height());
           
         //  $(".bxslider").show();
        }


    });   

});
</script>

<!-- 슬라이드 -->
<section class="slide" style="visibility: hidden;">
  <h4>슬라이드 영역</h4>
  <ul >
    <?php echo banner('main_bxslider_1','order',3,'<li>','</li>'); ?>
  </ul>
  <div class="newPager"></div>
  <div class="newAutoControl"></div>
  <span class="btn prev"></span> <span class="btn next"></span> 
</section>
<?php



//광고영역


$section_contents[1]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  '.banner('main_banner_1').'
</section>
';

$i=0;

if (element('board_list', $view)) {
    foreach (element('board_list', $view) as $key => $board) {

        $limit=5;
        $css='swip_menu';
        $href_url='url';
        if(strpos(element('brd_key', $board),'photo') !== false) {
            $limit=9;
            $css='photo';
            $href_url='pln_url';
        }

        if(strpos(element('brd_key', $board),'video') !== false) {
            $limit=5;
            $css='vod';
            $href_url='pln_url';
        }

        if(strpos(element('brd_key', $board),'webtoon') !== false ) {
            $css.=' webtoon';
        }
        
        $config = array(
            'skin' => 'mobile_main',
            'brd_key' => element('brd_key', $board),
            'limit' => $limit,
            'length' => 40,
            'is_gallery' => '',
            'image_width' => '',
            'image_height' => '',
            'cache_minute' => 1,
            'css' => $css,
            'href_url' => $href_url,
        );
        echo $this->board->latest($config);
        if(array_key_exists($i,$section_contents)) echo $section_contents[$i];

        $i++;

    }
}
