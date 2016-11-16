<?php
/**
 * tmpl-category.php - 카테고리 화면의 본문내용을 담당하는 파일입니다.
 * 
 * @package theme-itssue
 */
?>
<article id="post-<?php the_ID(); ?>" class="post">
  <div class="post-title">
    <h2>
      <?php
      printf( '<a href="%s" title="%s" class="search-title">%s</a>'
        , get_permalink()
        , the_title_attribute( 'after= 보러가기&echo=0' )
        , get_the_title()
      );
      ?>
    </h2>
  </div><!-- .post-title -->
  <div class="post-extra">
    <span class="post-date"><?php echo get_the_date(); ?></span>
    <br />
    <span class="post-author"><?php the_author(); ?></span>
  </div><!-- .post-extra -->
  <div class="post-content">
    <?php the_excerpt(); ?>
  </div><!-- .post-content -->
</article><!-- #post-<?php the_ID(); ?> -->