<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php echo element('headercontent', element('board', element('list', $view))); ?>


<!-- 로딩후 대메뉴 의 스크롤바 위치 지정-->
<script>
$(document).ready(function(){
    

    
    
     $('.music_list table tr').click(function(){
      $('.music_list table tr').removeClass('checking');
      $(this).addClass('checking');
      $('#iframe_mugic').attr('src' ,$(this).data('href'));
      $('#iframe_mugic #player video.video-stream').play();
    });

    $('.music_list table tr').eq(1).click();

});
</script>

<?php
    $menu = element('menu', $layout);
    foreach (element(0, $menu) as $mkey => $mval) {
        if(strpos($mval['men_link'],$this->uri->segment(2,'mugic')) !==false) {
            $men_id = $mval['men_id'];
            $men_name = $mval['men_name'];
            $men_link = $mval['men_link'];  
        }
    }
    
   
    ?>

<div class="wrap03">

<!-- iframe 영역 -->
  <section class="iframe" style="position:relative; padding-top:53%; margin-bottom:0;">
    <iframe id="iframe_mugic" width="100%" height="100%" style="position:absolute; top:0; left:0;" src="" frameborder="0" allowfullscreen></iframe>
  </section>
<!-- --> 
<!-- Music list 영역 -->
  <section class="music_list">

    <h2><?php echo element('bca_value',element('category', element(0,element('list', element('data', element('list', $view)))))) ? html_escape(element('bca_value',element('category', element(0,element('list', element('data', element('list', $view))))))) :'';?></h2>
    <?php if (element('point_info', element('list', $view))) { ?>
        <div class="point-info pull-right mr10">
            <button type="button" class="btn-point-info" ><i class="fa fa-info-circle"></i></button>
            <div class="point-info-content alert alert-warning"><strong>포인트안내</strong><br /><?php echo element('point_info', element('list', $view)); ?></div>
        </div>
    <?php } ?>
    

    <?php
    $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
    echo form_open('', $attributes);
    ?>
        <!-- 리스트-->
    
        <?php if (element('is_admin', $view)) { ?>
        <div><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label></div>
        <?php } ?>
        <table>
          <tr>
            <th>Rank</th>
            <th>Title</th>
            <th>Artist</th>
          </tr>
            <?php 
            $i=0;
            if (element('list', element('data', element('list', $view)))) {
                
                foreach (element('list', element('data', element('list', $view))) as $result) {
                    
                $i++;
            ?>
                <tr data-href="<?php echo !empty(element(1,element('pln_url', $result))) ? element(1,element('pln_url', $result)):element(0,element('pln_url', $result)); ?>?version=2&autoplay=1&showinfo=0&rel=0" class="" title="<?php echo html_escape(element('title', $result)); ?>" style="cursor:pointer;">
                    <td>
                    <?php if (element('is_admin', $view)) { ?><span scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></span><?php } ?>
                    <?php echo $i ?>
                    </td>
                    <td>
                    <?php echo html_escape(element('title', $result)); ?><img src="<?php echo base_url('/assets/mobi/images/play.png') ?>" alt="play">
                    </td>
                    <td>
                        <?php echo element('bca_value',element('category', $result)) ? html_escape(element('bca_value',element('category', $result))) :'';?>
                    </td>
                </tr>
            <?php
                }
            }
            if (  ! element('list', element('data', element('list', $view)))) {
            ?>
                <tr>
                    <td colspan=3><h4>게시물이 없습니다</h4></td>
                </tr>
            <?php } ?>
            </table>
       
    <?php echo form_close(); ?>

    <div class="table-bottom mt10">
        <div class="pull-left mr10 ">
            <a href="<?php echo $men_link ?>" class="btn btn-default btn-sm">목록</a>
        </div>
        <?php if (element('is_admin', $view)) { ?>
            <div class="pull-left">
                <button type="button" class="btn btn-default btn-sm admin-manage-list"><i class="fa fa-cog big-fa"></i>관리</button>
                <div class="btn-admin-manage-layer admin-manage-layer-list">
                <?php if (element('is_admin', $view) === 'super') { ?>
                    <div class="item" onClick="document.location.href='<?php echo admin_url('board/boards/write/' . element('brd_id', element('board', element('list', $view)))); ?>';"><i class="fa fa-cog"></i> 게시판설정</div>
                    <div class="item" onClick="post_modify($('input:checked[name=\'chk_post_id[]\']').val());"><i class="fa fa-modx"></i> 수정하기</div>
                    <div class="item" onClick="post_multi_copy('copy');"><i class="fa fa-files-o"></i> 복사하기</div>
                    <div class="item" onClick="post_multi_copy('move');"><i class="fa fa-arrow-right"></i> 이동하기</div>
                    <div class="item" onClick="post_multi_change_category();"><i class="fa fa-tags"></i> 카테고리변경</div>
                <?php } ?>
                    <div class="item" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');"><i class="fa fa-trash-o"></i> 선택삭제하기</div>
                    <div class="item" onClick="post_multi_action('post_multi_secret', '0', '선택하신 글들을 비밀글을 해제하시겠습니까?');"><i class="fa fa-unlock"></i> 비밀글해제</div>
                    <div class="item" onClick="post_multi_action('post_multi_secret', '1', '선택하신 글들을 비밀글로 설정하시겠습니까?');"><i class="fa fa-lock"></i> 비밀글로</div>
                    <div class="item" onClick="post_multi_action('post_multi_notice', '0', '선택하신 글들을 공지를 내리시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지내림</div>
                    <div class="item" onClick="post_multi_action('post_multi_notice', '1', '선택하신 글들을 공지로 등록 하시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지올림</div>
                    <div class="item" onClick="post_multi_action('post_multi_blame_blind', '0', '선택하신 글들을 블라인드 해제 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드해제</div>
                    <div class="item" onClick="post_multi_action('post_multi_blame_blind', '1', '선택하신 글들을 블라인드 처리 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드처리</div>
                    <div class="item" onClick="post_multi_action('post_multi_trash', '', '선택하신 글들을 휴지통으로 이동하시겠습니까?');"><i class="fa fa-trash"></i> 휴지통으로</div>
                </div>
            </div>
        <?php } ?>
        <?php if (element('write_url', element('list', $view))) { ?>
            <div class="pull-right">
                <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글쓰기</a>
            </div>
        <?php } ?>
    </div>
    
    <nav><?php echo element('paging', element('list', $view)); ?></nav>
    </section>
</div>

<?php echo element('footercontent', element('board', element('list', $view))); ?>

<!-- 광고 영역(class="bigbanner") -->
<section class="bigbanner">
    <h4>광고영역</h4>
    <?php echo banner('mugic_banner_2'); ?>
</section>

<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
