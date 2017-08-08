<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php    $this->managelayout->add_js(base_url('plugin/zeroclipboard/ZeroClipboard.js')); ?>

<?php
if (element('syntax_highlighter', element('board', $view)) OR element('comment_syntax_highlighter', element('board', $view))) {
    $this->managelayout->add_css(base_url('assets/js/syntaxhighlighter/styles/shCore.css'));
    $this->managelayout->add_css(base_url('assets/js/syntaxhighlighter/styles/shThemeMidnight.css'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shCore.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushJScript.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushPhp.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushCss.js'));
    $this->managelayout->add_js(base_url('assets/js/syntaxhighlighter/scripts/shBrushXml.js'));
?>
    <script type="text/javascript">
    SyntaxHighlighter.config.clipboardSwf = '<?php echo base_url('assets/js/syntaxhighlighter/scripts/clipboard.swf'); ?>';
    var is_SyntaxHighlighter = true;
    SyntaxHighlighter.all();
    </script>
<?php } ?>

<script>
<!-- 로딩시 대메뉴의 스크롤바 위치 지정 -->
$(document).ready(function() {


    $('.reply01').keyup(function (e){
          var content = $(this).val();
          $('.reply > p').html(content.length + '/30');
    });

    $('.reply_list li sub').click(function(){
    $(this).siblings('.reply_sub').toggle();
    });
    
});
<!-- 팝업창 스크립트 -->
function alertmsg() {
    alert ('정말로 삭제하시겠습니까?');
}

</script>
<?php $segment_arr=explode("_",element('board_key', $view)); ?>

<?php echo element('headercontent', element('board', $view)); ?>

<?php 
$menu = element('menu', $layout);

foreach (element(0, $menu) as $mkey => $mval) {
    if(strpos($mval['men_link'],$segment_arr[0]) !==false) {
        $men_id = $mval['men_id'];
        $men_name = $mval['men_name'];
    }
}


?>

<div class="wrap03">
<section class="mainbanner">
    <p>※영상재생시 5초정도의 대기시간이 발생 할 수 있습니다.※</p>
    <?php echo element('content',element('post', $view));?>
    <!-- <iframe src="https://www.tumblr.com/video/kokojoa/130465470119/700/" style="display:block;background-color:transparent;overflow:hidden" class="embed_iframe tumblr_video_iframe" scrolling="no" frameBorder="0" data-can-gutter data-can-resize data-width="100%" data-height="400" width="100%" height="400" allowfullscreen mozallowfullscreen webkitallowfullscreen></iframe> -->
    <h2><?php echo html_escape(element('post_title', element('post', $view))); ?></h2>




<div>





    <?php if ( ! element('post_del', element('post', $view)) && (element('use_post_like', element('board', $view)) OR element('use_post_dislike', element('board', $view)))) { ?>
        <div class="recommand">
            <?php if (element('use_post_like', element('board', $view))) { ?>
                <a class="good" href="javascript:;" id="btn-post-like" onClick="post_like('<?php echo element('post_id', element('post', $view)); ?>', '1', 'post-like');" title="추천하기"><span class="post-like"><?php echo number_format(element('post_like', element('post', $view))); ?></span><br /><i class="fa fa-thumbs-o-up fa-lg"></i></a>
            <?php } ?>
            <?php if (element('use_post_dislike', element('board', $view))) { ?>
                <a class="bad" href="javascript:;" id="btn-post-dislike" onClick="post_like('<?php echo element('post_id', element('post', $view)); ?>', '2', 'post-dislike');" title="비추하기"><span class="post-dislike"><?php echo number_format(element('post_dislike', element('post', $view))); ?></span><br /><i class="fa fa-thumbs-o-down fa-lg"></i></a>
            <?php } ?>
        </div>
    <?php } ?>

    

        <?php if ( ! element('post_del', element('post', $view)) && element('is_admin', $view)) { ?>
        <div class="pull-right mt20 mb20">
            <button type="button" class="btn btn-default btn-sm admin-manage-post"><i class="fa fa-cog big-fa"></i>관리</button>
            <div class="btn-admin-manage-layer admin-manage-post-layer">
                <?php if (element('is_admin', $view) === 'super') { ?>
                    <div class="item" onClick="post_copy('copy', '<?php echo element('post_id', element('post', $view)); ?>');"><i class="fa fa-files-o"></i> 복사하기</div>
                    <div class="item" onClick="post_copy('move', '<?php echo element('post_id', element('post', $view)); ?>');"><i class="fa fa-arrow-right"></i> 이동하기</div>
                <?php if (element('use_category', element('board', $view))) { ?>
                    <div class="item" onClick="post_change_category('<?php echo element('post_id', element('post', $view)); ?>');"><i class="fa fa-tags"></i> 카테고리변경</div>
                <?php
                    }
                }
                if (element('use_post_secret', element('board', $view))) {
                    if (element('post_secret', element('post', $view))) {
                ?>
                    <div class="item" onClick="post_action('post_secret', '<?php echo element('post_id', element('post', $view)); ?>', '0');"><i class="fa fa-unlock"></i> 비밀글해제</div>
                <?php } else { ?>
                    <div class="item" onClick="post_action('post_secret', '<?php echo element('post_id', element('post', $view)); ?>', '1');"><i class="fa fa-lock"></i> 비밀글로</div>
                <?php
                    }
                }
                if (element('post_hide_comment', element('post', $view))) {
                ?>
                    <div class="item" onClick="post_action('post_hide_comment', '<?php echo element('post_id', element('post', $view)); ?>', '0');"><i class="fa fa-comments"></i> 댓글감춤해제</div>
                <?php } else { ?>
                    <div class="item" onClick="post_action('post_hide_comment', '<?php echo element('post_id', element('post', $view)); ?>', '1');"><i class="fa fa-comments"></i> 댓글감춤</div>
                <?php } ?>
                <?php if (element('post_notice', element('post', $view))) { ?>
                    <div class="item" onClick="post_action('post_notice', '<?php echo element('post_id', element('post', $view)); ?>', '0');"><i class="fa fa-bullhorn"></i> 공지내림</div>
                <?php } else { ?>
                    <div class="item" onClick="post_action('post_notice', '<?php echo element('post_id', element('post', $view)); ?>', '1');"><i class="fa fa-bullhorn"></i> 공지올림</div>
                <?php } ?>
                <?php if (element('post_blame', element('post', $view)) >= element('blame_blind_count', element('board', $view))) { ?>
                    <div class="item" onClick="post_action('post_blame_blind', '<?php echo element('post_id', element('post', $view)); ?>', '0');"><i class="fa fa-exclamation-circle"></i> 블라인드해제</div>
                <?php } else { ?>
                    <div class="item" onClick="post_action('post_blame_blind', '<?php echo element('post_id', element('post', $view)); ?>', '1');"><i class="fa fa-exclamation-circle"></i> 블라인드처리</div>
                <?php } ?>
                <div class="item" onClick="post_action('post_trash', '<?php echo element('post_id', element('post', $view)); ?>', '', '이 글을 휴지통으로 이동하시겠습니까?');"><i class="fa fa-trash"></i> 휴지통으로</div>
            </div>
        </div>
        <?php } ?>
    

    <?php
    if (element('use_sns_button', $view)) {
        $this->managelayout->add_js(base_url('assets/js/sns.js'));
        if ($this->cbconfig->item('kakao_apikey')) {
            $this->managelayout->add_js('https://developers.kakao.com/sdk/js/kakao.min.js');
    ?>
        <script type="text/javascript">Kakao.init('<?php echo $this->cbconfig->item('kakao_apikey'); ?>');</script>
    <?php } ?>
        <div class="sns_button">
            <a href="javascript:;" onClick="sendSns('facebook', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 페이스북으로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_facebook.png" width="22" height="22" alt="이 글을 페이스북으로 퍼가기" title="이 글을 페이스북으로 퍼가기" /></a>
            <a href="javascript:;" onClick="sendSns('twitter', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 트위터로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_twitter.png" width="22" height="22" alt="이 글을 트위터로 퍼가기" title="이 글을 트위터로 퍼가기" /></a>
            <?php if ($this->cbconfig->item('kakao_apikey')) { ?>
                <a href="javascript:;" onClick="kakaolink_send('<?php echo html_escape(element('post_title', element('post', $view)));?>', '<?php echo element('short_url', $view); ?>');" title="이 글을 카카오톡으로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_kakaotalk.png" width="22" height="22" alt="이 글을 카카오톡으로 퍼가기" title="이 글을 카카오톡으로 퍼가기" /></a>
            <?php } ?>
            <a href="javascript:;" onClick="sendSns('kakaostory', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 카카오스토리로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_kakaostory.png" width="22" height="22" alt="이 글을 카카오스토리로 퍼가기" title="이 글을 카카오스토리로 퍼가기" /></a>
            <a href="javascript:;" onClick="sendSns('band', '<?php echo element('short_url', $view); ?>', '<?php echo html_escape(element('post_title', element('post', $view)));?>');" title="이 글을 밴드로 퍼가기"><img src="<?php echo element('view_skin_url', $layout); ?>/images/social_band.png" width="22" height="22" alt="이 글을 밴드로 퍼가기" title="이 글을 밴드로 퍼가기" /></a>
        </div>
    <?php } ?>

    <div class="clearfix"></div>


   
        <div class="btn-group pull-left" role="group" aria-label="...">
            <?php if (element('modify_url', $view)) { ?>
                <a href="<?php echo element('modify_url', $view); ?>" class="btn btn-default btn-sm">수정</a>
            <?php } ?>
            <?php    if (element('delete_url', $view)) { ?>
                <button type="button" class="btn btn-default btn-sm btn-one-delete" data-one-delete-url="<?php echo element('delete_url', $view); ?>">삭제</button>
            <?php } ?>
        </div>
        <?php if (element('write_url', $view)) { ?>
            <div class="pull-right">
                <a href="<?php echo element('write_url', $view); ?>" class="btn btn-success btn-sm">글쓰기</a>
            </div>
        <?php } ?>
    </div>
    
</div>
</section>
<?php echo element('footercontent', element('board', $view)); ?>

<?php if (element('target_blank', element('board', $view))) { ?>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
    $("#post-content a[href^='http']").attr('target', '_blank');
});
//]]>
</script>
<?php } ?>

<script type="text/javascript">
//<![CDATA[
var client = new ZeroClipboard($('.copy_post_url'));
client.on('ready', function( readyEvent ) {
    client.on('aftercopy', function( event ) {
        alert('게시글 주소가 복사되었습니다. \'Ctrl+V\'를 눌러 붙여넣기 해주세요.');
    });
});
//]]>
</script>
<?php
if (element('highlight_keyword', $view)) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#post-content').highlight([<?php echo element('highlight_keyword', $view);?>]);
//]]>
</script>
<?php } ?>
