<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name=”referer” content=”no-referer” />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<?php if (element('meta_description', $layout)) { ?><meta name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>"><?php } ?>
<?php if (element('meta_keywords', $layout)) { ?><meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>"><?php } ?>
<?php if (element('meta_author', $layout)) { ?><meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>"><?php } ?>
<?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
<?php if (element('canonical', $view)) { ?><link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/ui-lightness/jquery-ui.css" /> -->
<?php echo $this->managelayout->display_css(); ?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
// 자바스크립트에서 사용하는 전역변수 선언
var cb_url = "<?php echo trim(site_url(), '/'); ?>";
var cb_cookie_domain = "<?php echo config_item('cookie_domain'); ?>";
var cb_charset = "<?php echo config_item('charset'); ?>";
var cb_time_ymd = "<?php echo cdate('Y-m-d'); ?>";
var cb_time_ymdhis = "<?php echo cdate('Y-m-d H:i:s'); ?>";
var layout_skin_path = "<?php echo element('layout_skin_path', $layout); ?>";
var view_skin_path = "<?php echo element('view_skin_path', $layout); ?>";
var is_member = "<?php echo $this->member->is_member() ? '1' : ''; ?>";
var is_admin = "<?php echo $this->member->is_admin(); ?>";
var cb_admin_url = <?php echo $this->member->is_admin() === 'super' ? 'cb_url + "/' . config_item('uri_segment_admin') . '"' : '""'; ?>;
var cb_board = "<?php echo isset($view) ? element('board_key', $view) : ''; ?>";
var cb_board_url = <?php echo ( isset($view) && element('board_key', $view)) ? 'cb_url + "/' . config_item('uri_segment_board') . '/' . element('board_key', $view) . '"' : '""'; ?>;
var cb_device_type = "<?php echo $this->cbconfig->get_device_type() === 'mobile' ? 'mobile' : 'desktop' ?>";
var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
var cookie_prefix = "<?php echo config_item('cookie_prefix'); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.hoverIntent.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ba-outside-events.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/iscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mobile.sidemenu.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
<?php echo $this->managelayout->display_js(); ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/plugins/jquery.fitvids.js'); ?>"></script>
<script>
$(document).ready(function () {
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
        controls: true, // 좌,우 컨트롤 버튼 출력 여부

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
    });              
});
</script>
</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
<!-- 헤더영역 -->
    <header> 
      <!-- 로고영역 -->
      <nav class="logo">
        <ul>
          <li><a href="javascript:;"><img src="<?php echo base_url('assets/mobi/images/coin.png'); ?>" alt="coin"></a></li>
          <li><a href="<?php echo site_url(); ?>" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>"><?php echo $this->cbconfig->item('site_logo'); ?></a></li>
          <li><a href="javascript:;"><img src="<?php echo base_url('assets/mobi/images/set.png'); ?>" alt="set"></a></li>
        </ul>
      </nav>
      
      <!-- 메인메뉴 영영-->
      <nav class="main" >
        <ul>
            <?php
            $menuhtml = '';
            $click_bar = '';
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                if (element(0, $menu)) {
                    foreach (element(0, $menu) as $mkey => $mval) {
                        //if (element(element('men_id', $mval), $menu)) {
                        if (false) {    
                            $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                            $menuhtml .= '<li class="dropdown">
                            <a href="' . $mlink . '" ' . element('men_custom', $mval);
                            if (element('men_target', $mval)) {
                                $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                            }
                            $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a><a href="#" style="width:25px;float:right;" class="subopen" data-menu-order="' . $mkey . '"><i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu drop-downorder-' . $mkey . '">';

                            foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
                                $menuhtml .= '<li><a href="' . element('men_link', $sval) . '" ' . element('men_custom', $sval);
                                if (element('men_target', $sval)) {
                                    $menuhtml .= ' target="' . element('men_target', $sval) . '"';
                                }
                                $menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
                            }
                            $menuhtml .= '</ul></li>';

                        } else {
                            $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                            $menuhtml .= '<li id="'.$click_bar.'"><a href="' . $mlink . '" ' . element('men_custom', $mval);
                            if (element('men_target', $mval)) {
                                $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                            }                                                                                                                                                                                                                                                                                                                      
                            $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
                        }
                    }
                }
            }
            echo $menuhtml;
            ?>
          
        </ul>
      </nav>
    </header>

    <!-- 슬라이드 -->
    <section class="slide">
      <h4>슬라이드 영역</h4>
      <ul >
        <li> <a href="http://www.naver.com"><img src="<?php echo base_url('assets/mobi/images/slide01.png'); ?>" alt="wall01" /></a> </li>
        <li> <a href="http://www.naver.com"><img src="<?php echo base_url('assets/mobi/images/slide02.png'); ?>" alt="wall01"/></a> </li>
        <li> <a href="http://www.naver.com"><img src="<?php echo base_url('assets/mobi/images/slide03.png'); ?>" alt="wall01"/></a> </li>
      </ul>
      <div class="newPager"></div>
      <div class="newAutoControl"></div>
      <span class="btn prev"></span> <span class="btn next"></span> 
    </section>

    <!-- main start -->
    <div class="main">
        <div class="container">

                <!-- 본문 시작 -->
                <?php if (isset($yield))echo $yield; ?>
                <!-- 본문 끝 -->

        </div>
    </div>
    <!-- main end -->

    <!-- footer start -->
    <footer>
        <nav>
            <ul>
            <li><a href="<?php echo document_url('aboutus'); ?>" title="성인마켓소개">성인마켓소개</a></li>
            <li><a href="<?php echo document_url('advertis'); ?>" title="광고문의">광고문의</a></li>
            <li><a href="<?php echo document_url('privacy'); ?>" title="개인정보취급">개인정보취급</a></li>
            <li><a href="<?php echo document_url('provision'); ?>" title="이용약관">이용약관</a></li>
            </ul>
            <!--div class="see_mobile"><a href="<?php echo current_full_url(); ?>" class="btn btn-primary btn-xs viewpcversion">PC 버전으로 보기</a></div-->
        </nav>
        이 사이트는 성인컨텐츠 제공이 합법인 유럽, 호주, 일본 등지의<br/> 
        한글을 사용하는 사용자들을 위한 성인전용 서비스이며,<br/> 국내 사용자와
        미성년자의 출입을 금지합니다.<br/> 
        <br/> 
        Copyright ⓒ All right reseved by Mobipopcon
    </footer>
    <!-- footer end -->


<div class="menu hide" id="side_menu">
    <div class="side_wr add_side_wr">
        <div id="isroll_wrap" class="side_inner_rel">
            <div class="side_inner_abs">
                <div class="m_search">
                    <form name="mobile_header_search" id="mobile_header_search" action="<?php echo site_url('search'); ?>" onSubmit="return headerSearch(this);">
                        <input type="text" placeholder="Search" class="input" name="skeyword" accesskey="s" />
                    </form>
                </div>
                <div class="m_login">
                    <?php if ($this->member->is_member()) { ?>
                        <span><a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" class="btn btn-primary" title="로그아웃"><i class="fa fa-sign-out"></i> 로그아웃</a></span>
                        <span><a href="<?php echo site_url('mypage'); ?>" class="btn btn-primary" title="로그아웃"><i class="fa fa-user"></i> 마이페이지</a></span>
                    <?php } else { ?>
                        <span><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" class="btn btn-primary" title="로그인"><i class="fa fa-sign-in"></i> 로그인</a></span>
                        <span><a href="<?php echo site_url('register'); ?>" class="btn btn-primary" title="회원가입"><i class="fa fa-user"></i> 회원가입</a></span>
                    <?php } ?>
                </div>
                <ul class="m_board">
                    <?php if ($this->cbconfig->item('open_currentvisitor')) { ?>
                        <li><a href="<?php echo site_url('currentvisitor'); ?>" title="현재 접속자"><span class="fa fa-link"></span> 현재 접속자</a></li>
                    <?php } ?>
                    <?php if ($this->member->is_member()) { ?>
                        <li><a href="<?php echo site_url('notification'); ?>" title="나의 알림"><span class="fa fa-bell-o"></span>알림 : <?php echo number_format(element('notification_num', $layout) + 0); ?> 개</a></li>
                        <?php if ($this->cbconfig->item('use_note') && $this->member->item('mem_use_note')) { ?>
                            <li><a href="javascript:;" onClick="note_list();" title="나의 쪽지"><span class="fa fa-envelope"></span> 쪽지 : <?php echo number_format($this->member->item('meta_unread_note_num') + 0); ?> 개</a></li>
                        <?php } ?>
                        <?php if ($this->cbconfig->item('use_point')) { ?>
                            <li><a href="<?php echo site_url('mypage/point'); ?>" title="나의 포인트"><span class="fa fa-gift"></span> 포인트 : <?php echo number_format($this->member->item('mem_point') + 0); ?> 점</a></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <ul class="m_menu">
                    <?php
                    $menuhtml = '';
                    if (element('menu', $layout)) {
                        $menu = element('menu', $layout);
                        if (element(0, $menu)) {
                            foreach (element(0, $menu) as $mkey => $mval) {
                                if (element(element('men_id', $mval), $menu)) {
                                    $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                                    $menuhtml .= '<li class="dropdown">
                                    <a href="' . $mlink . '" ' . element('men_custom', $mval);
                                    if (element('men_target', $mval)) {
                                        $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                                    }
                                    $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a><a href="#" style="width:25px;float:right;" class="subopen" data-menu-order="' . $mkey . '"><i class="fa fa-chevron-down"></i></a>
                                    <ul class="dropdown-menu drop-downorder-' . $mkey . '">';

                                    foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
                                        $menuhtml .= '<li><a href="' . element('men_link', $sval) . '" ' . element('men_custom', $sval);
                                        if (element('men_target', $sval)) {
                                            $menuhtml .= ' target="' . element('men_target', $sval) . '"';
                                        }
                                        $menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
                                    }
                                    $menuhtml .= '</ul></li>';

                                } else {
                                    $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                                    $menuhtml .= '<li><a href="' . $mlink . '" ' . element('men_custom', $mval);
                                    if (element('men_target', $mval)) {
                                        $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                                    }
                                    $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
                                }
                            }
                        }
                    }
                    echo $menuhtml;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
    Cookies.set('device_view_type', 'desktop', { expires: 1 });
});
$(document).on('click', '.viewmobileversion', function(){
    Cookies.set('device_view_type', 'mobile', { expires: 1 });
});
</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>

<!--
Layout Directory : <?php echo element('layout_skin_path', $layout); ?>,
Layout URL : <?php echo element('layout_skin_url', $layout); ?>,
Skin Directory : <?php echo element('view_skin_path', $layout); ?>,
Skin URL : <?php echo element('view_skin_url', $layout); ?>,
-->

</body>
</html>
