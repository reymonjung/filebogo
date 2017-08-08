

<?php
echo '<div class="wrap03">';

echo '<!-- 광고 영역 -->
<section class="bigbanner">
    <h4>광고영역</h4>
    '.banner('mugic_banner_1').'
</section>';

$i=0;
if (element('board_list', $view)) {
    
    foreach (element('board_list', $view) as $key => $board) {

        $css='list_03';
        $config = array(
            'skin' => 'mobile_mugic',
            'brd_id' => element('brd_id', $board),
            'limit' => element('list_count', $board),
            'length' => 25,
            'is_gallery' => '',
            'image_width' => '',
            'image_height' => '',
            'cache_minute' => 1,
            'css' => $css,            
            'findex' => 'board_category.bca_order',
            'forder' => 'ASC',
        );
        echo $this->board->latest($config);
    }
}

echo '</div>

<!-- 광고 영역 -->
<section class="bigbanner">
    <h4>광고영역</h4>
    '.banner('mugic_banner_2').'
</section>';