<?php
/**
 * tmpl-front-category.php - 메인 페이지의 카테고리 영역을 담당하는 파일입니다.
 * 
 * @package theme-itssue
 */
?>
<div class="block-cat">
  <p class="cat-title">
    <?php echo single_cat_title(); ?>
  </p>
  <?php $cat_link = get_category_link( get_query_var( 'cat' ) ); ?>
  <a href="<?php echo $cat_link; ?>" title="더보기" class="cat-more">
    +
  </a>

  <hr class="clear">

  <?php
  if ( have_posts() ):
    while( have_posts() ):
      the_post();
      printf( '<a href="%s" title="%s" class="post-title">%s</a>'
        , get_permalink()
        , the_title_attribute( 'after= 보러가기&echo=0' )
        , get_the_title()
      );
      printf( '<span class="post-date">%s</span>'
        , get_the_date()
      );
    endwhile;
  else:
    echo '<div>등록된 글이 존재하지 않습니다.</div>';
  endif;
  ?>
</div>