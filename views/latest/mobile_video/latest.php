<?php 

$bestComment=['일본','동양','동양','일본','일본'];
if(strpos(element('brd_key', element('board', $view)),'video_1') !== false){
   // print_r(element('latest', $view));
    $i=1;
    if (element('latest', $view)) {
    //echo element('pln_url',element('0', element('latest', $view)));
        //print_r(element('0', element('latest', $view)));
        echo '<!-- 메인영상 영역 -->
            <section class="mainbanner" id="menu01" >
              <h4>메인광고영역</h4>
              '.element('link_player',element('0', element('latest', $view))).'</section>';

    }
} else $i=0;
 ?>
<section class="<?php echo element('css', $view)?>" id="<?php echo element('sectionId', $view)?>">
    
    <?php 
        if(html_escape(element('board_name', element('board', $view)))=='전체') echo '';
        else {
            echo '<h2>';
            echo html_escape(element('board_name', element('board', $view)));
            if(strpos(element('brd_key', element('board', $view)),'video_1') === false && strpos(element('brd_key', element('board', $view)),'video_7') === false){
                echo '<span><a href="'.board_url(element('brd_key', element('board', $view))).'" title="'.html_escape(element('board_name', element('board', $view))).'">더보기 ></a></span>';
            }         
            echo '</h2>';
        }
    ?> 
       <nav>
            <ul>
            <?php
            
            if (element('latest', $view)) {
                foreach (element('latest', $view) as $key => $value) {
                    //print_r($value);


                if($key==0 && strpos(element('brd_key', element('board', $view)),'video_1') !== false) continue;
            ?>
                <li><a href="<?php echo element(element('href_url', $view), $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>">
                    <?php 
                    if(element('pfi_url', $value) && element('css', $view) !='novel'){
                        echo '<img src="'.html_escape(element('pfi_url', $value)).'" alt="photo_'.$i.'">';
                    } elseif (element('pln_url', $value)&& element('css', $view) !='novel') { 
                        echo '<img src="'.html_escape(element('pln_url', $value)).'" title="photo_"'.$i.' class="imgUrlExist" onerror="imgUrlChangeTry(this)" data-url="/img_url_header.php?url='.urlencode(element(0,element('pln_url', $value))).'&filename=photo_'.$i.'">';
                    }
                    ?>
                    
                    <h3> <?php echo element('title', $value) ? html_escape(element('title', $value)) :'';?>
                        <?php if(element('css', $view) =='best') {
                            echo '<br/><span> 동영상 종류 : '.$bestComment[$key].'<br/>등록일 : '.element('display_datetime', $value).'</span> ';
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
    </nav>
</section>
