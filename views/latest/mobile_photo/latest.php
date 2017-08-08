
<section class="<?php echo element('css', $view)?>" id="<?php echo element('sectionId', $view)?>">
    <h2>
    <?php 
       echo  html_escape(element('board_name', element('board', $view)));
    ?> 
    <span> <a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>" title="<?php echo html_escape(element('board_name', element('board', $view))); ?>">
    더보기 >
    </a> </span> 
    </h2>
        <nav>
            <ul>
            <?php
            $i = 0;
            if (element('latest', $view)) {
                foreach (element('latest', $view) as $key => $value) {
               //     print_r($value);
      
            ?>
                <li><a rel="example_group" href="<?php echo element(element('href_url', $view), $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>">
                    <?php 
                    if(element('pfi_url', $value)){
                        echo '<img src="'.html_escape(element('pfi_url', $value)).'" alt="photo_'.$i.'">';
                    } elseif (element('pln_url', $value)) { 
                        echo '<img src="'.html_escape(element('pln_url', $value)).'" alt="photo_'.$i.'" data-urltype="'.element('href_url', $view).'" class="imgUrlExist" onerror="imgUrlChangeTry(this)" data-url="/img_url_header.php?url='.urlencode(element('pln_url', $value)).'&filename=photo_'.$i.'">';
                    }
                    ?>
                    </a>
                    <h3> <?php// echo element('title', $value) ? html_escape(element('title', $value)) :'';?></h3>
                </li>
            <?php
                    $i++;
                }
            }
            while ($i < element('latest_limit', $view)) {
            ?>
                <li>
                   <h3> 게시물이 없습니다</h3>
                    
                </li>
            <?php
                $i++;
            }
            ?>
       </ul>
    </nav>
</section>
