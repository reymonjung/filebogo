<?php

$section_contents[3]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  '.banner('video_banner_1').'
</section>
';

$section_contents[5]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  '.banner('video_banner_2').'
</section>
';


$section_contents[7]='<!-- 무료공개 이벤트 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  '.banner('video_banner_3').'
</section>';

echo '<div class="wrap02">';

$i=1;


if (element('board_list', $view)) {
    foreach (element('board_list', $view) as $key => $board) {
        
        $limit=4;
        $css='imglist';
        $href_url='url';

        if(strpos(element('brd_key', $board),'video_1') !== false) {
            $limit=5;
            $css='imglist';
            
        }

        if(strpos(element('brd_key', $board),'video_7') !== false) {
            $limit=5;
            $css='best';
            
        }

        $config = array(
            'skin' => 'mobile_video',
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

