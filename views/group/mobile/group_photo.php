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

    $("header nav ul li a").removeClass("open");
      var hashTagActive = "";
      $(".scroll").click(function (event) {
        if(hashTagActive != this.hash) {
            event.preventDefault();
            var dest = 0;
            if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
                dest = $(document).height() - $(window).height();
            } else {
                dest = $(this.hash).offset().top;
            }
            $('html,body').animate({
                scrollTop: dest
            }, 1000, 'swing');
            hashTagActive = this.hash;
        }
    });


   
});
</script>



<?php
$section_contents[2]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  '.banner('photo_banner_1').'
</section>
';
echo '<div class="wrap02">';

$i=1;

if (element('board_list', $view)) {
    foreach (element('board_list', $view) as $key => $board) {
        $limit=6;
        $css='photo';
        $href_url='pln_url';

        if(strpos(element('brd_key', $board),'photo_1') !== false) {
            $limit=12;
            
        }
        $config = array(
            'skin' => 'mobile_photo',
            'brd_id' => element('brd_id', $board),
            'limit' => $limit,
            'length' => 25,
            'is_gallery' => '',
            'image_width' => '',
            'image_height' => '',
            'cache_minute' => 1,
            'css' => $css,
            'href_url' => $href_url,
            'sectionId' => 'menu'.sprintf("%02d", $i),
        );
        echo $this->board->latest($config);
        if(array_key_exists($i,$section_contents)) echo $section_contents[$i];
        $i++;
    }
}
echo '<section class="bigbanner">
  <h4>광고영역</h4>
  '.banner('photo_banner_2').'
    </div>';