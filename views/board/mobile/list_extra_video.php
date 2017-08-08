<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>



<div>
<section class="list_02 extra_video">
    <h2>관련영상 <span><a href="<?php echo element('list_url', $view) ?>">더보기 ></a></span></h2>
    <nav>
        <ul>
    <?php
            
if (element('list', element('data', element('list', $view)))) {
    foreach (element('list', element('data', element('list', $view))) as $key => $result) {
        
        ?>
      
        <li>
        <a href="<?php echo element('post_url', $result); ?>" style="
            <?php
            if (element('post_id', element('post', $view)) === element('post_id', $result)) {
             
            }
            ?>
            " title="<?php echo html_escape(element('title', $result)); ?>">
            <img src="<?php echo element(0,element('pln_url', $result)); ?>" alt="<?php echo 'video_'.$key ?>" title="<?php echo 'video_'.$key ?>"  class="imgUrlExist" onerror="imgUrlChangeTry(this)" data-url="/img_url_header.php?url=<?php echo urlencode(element(0,element('pln_url', $result)))?>&filename=<?php echo 'photo_'.$key ?>"><h3> <?php echo element('title', $result) ? html_escape(element('title', $result)) :'';?></h3></a>
        </li>
        <?php
    }

}
?>
        </ul>
    </nav>
    </section>
</div>


<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  <a href=""> <img src="<?php echo base_url('assets/mobi/images/ad_02.png')?>" alt="ad_02"> </a> </section>