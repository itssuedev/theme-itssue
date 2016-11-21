<?php
/**
 * tmpl-front-page.php - 메인 페이지의 페이지 영역을 담당하는 파일입니다.
 * 
 * @package theme-itssue
 */
?>
<div class="block-page">
  <?php
  if ( have_posts() ) :
    the_post();
    the_post_thumbnail();
    ?>
    <div>
      <?php
      printf( '<a href="%s" title="%s" class="block-title">%s</a>'
        , get_permalink()
        , the_title_attribute( 'after= 보러가기&echo=0' )
        , get_the_title()
      );
      if ( !has_post_thumbnail() ) {
        ?>
        <p class="page-excerpt">
        <?php echo get_the_excerpt(); ?>
        </p>
        <?php
      }
    ?>
    </div>
    <?php
  else :
    echo '<div>선택한 글이 존재하지 않습니다.</div>';
  endif;
  ?>
</div>