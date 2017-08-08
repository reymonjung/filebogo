<?php 
if(strpos(element('css', $view),'imglist') !== false){
    $i=1;
    if (element('latest', $view)) {
    //echo element('pln_url',element('0', element('latest', $view)));
        //print_r(element('0', element('latest', $view)));
        echo '<!-- 메인영상 영역 -->
            <section class="mainbanner" id="menu01">
              <h4>메인광고영역</h4>
              <a href="'.element(element('href_url', $view),element('0', element('latest', $view))).'"> <img src="'.element('pfi_url',element('0', element('latest', $view))).'" alt="ad_01"> </a> </section>';

    }
} else $i=0;
 ?>


<section class="<?php echo element('css', $view)?>" id="<?php echo element('sectionId', $view)?>">
    
    <?php 
        if(html_escape(element('board_name', element('board', $view)))!=='전체'){
            echo "<h2>".html_escape(element('board_name', element('board', $view)));

            if(element('css', $view) =='novel'){
         ?>
        
       <span><a href="<?php echo board_url(element('brd_key', element('board', $view))); ?>" title="<?php echo html_escape(element('board_name', element('board', $view))); ?>">더보기 ></a></span> 

        <?php 
            } 
            echo "</h2>";
        }
        ?>
    
       <?php if(element('css', $view) =='best') echo '<nav>'; ?>
            <ul>
            <?php
            
            if (element('latest', $view)) {
                foreach (element('latest', $view) as $key => $value) {
                    //print_r($value);


                if($key==0 && strpos(element('css', $view),'imglist') !== false) continue;
            ?>
                <li><a href="<?php echo element(element('href_url', $view), $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>">
                    <?php 
                    if(element('pfi_url', $value) && element('css', $view) !='novel'){
                        echo '<img src="'.html_escape(element('pfi_url', $value)).'" alt="photo_'.$i.'">';
                    } elseif (element('pln_url', $value)&& element('css', $view) !='novel') { 
                        echo '<img src="'.html_escape(element('pln_url', $value)).'" alt="photo_'.$i.'">';
                    }
                    ?>
                    
                    <h3> <?php echo element('title', $value) ? html_escape(element('title', $value)) :'';?>
                        <?php if(element('css', $view) =='best') {
                            echo '<br/><span> 소설 종류 : 공포<br/>등록일 : '.element('display_datetime', $value).'</span> ';
                        }?>
                    </h3></a>
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
    <?php if(element('css', $view) =='best') echo '</nav>'; ?>
</section>
