
<section class="<?php echo element('css', $view)?>">
    <!-- <h2>
    <?php 
        if(html_escape(element('board_name', element('board', $view)))=='패티쉬') echo "인기사진";
        else if (html_escape(element('board_name', element('board', $view)))=='금주추천') echo "추천웹툰";
        else echo html_escape(element('board_name', element('board', $view)));
    ?> 
    <span> <a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>" title="<?php echo html_escape(element('board_name', element('board', $view))); ?>">더보기 ></a> </span> 
    </h2> -->
    
        <ul>
            <?php
            $i = 0;
            if (element('latest', $view)) {
                foreach (element('latest', $view) as $key => $value) {
                    
      
            ?>
                <li><a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>?<?php if(!empty($this->input->get('findex'))) echo 'findex='.html_escape($this->input->get('findex')); ?>&category_id=<?php echo element('bca_key', element('category', $value)); ?>" title="<?php echo html_escape(element('bca_value',element('category', $value))); ?>">
                    <?php 
                    if(element('pfi_url', $value)){
                        echo '<img src="'.html_escape(element('pfi_url', $value)).'" alt="mugic_'.$i.'">';
                    } elseif (element('pln_url', $value)) { 
                        echo '<img src="'.html_escape(element('pln_url', $value)).'" class="imgUrlExist" onerror="imgUrlChangeTry(this)" data-urltype="'.element('href_url', $view).'" data-url="/img_url_header.php?url='.urlencode(element('pln_url', $value)).'&filename=mugic_'.$i.'" alt="mugic_'.$i.'">';
                    }
                    ?>
                    </a>
                    <h3> <?php echo element('bca_value',element('category', $value)) ? html_escape(element('bca_value',element('category', $value))) :'';?></h3>
                   
                    
                </li>
            <?php
                    $i++;
                }
            }
            /*
            while ($i < element('latest_limit', $view)) {
            ?>
                <li>
                    <h4> 게시물이 없습니다</h4>

                </li> 
            <?php
                $i++;
            }
            */
            ?>
       </ul>
   
</section>
