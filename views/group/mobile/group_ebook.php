<?php

$section_contents[2]='<!-- 광고 영역 -->
<section class="bigbanner">
  <h4>광고영역</h4>
  '.banner('ebook_banner_1').'
</section>
';

echo '<div class="wrap">';

$i=1;


if (element('board_list', $view)) {
    foreach (element('board_list', $view) as $key => $board) {
        $limit=10;
        $css='novel';
        $href_url='url';

        if(strpos(element('brd_key', $board),'ebook_1') !== false) {
            $limit=5;
            $css='imglist ebook';
            
        }

        if(strpos(element('brd_key', $board),'ebook_4') !== false) {
            $limit=5;
            $css='best';
            
        }

        $config = array(
            'skin' => 'mobile_ebook',
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
  '.banner('ebook_banner_2').'
</div>';
