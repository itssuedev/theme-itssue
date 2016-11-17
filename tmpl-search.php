<?php
/**
 * tmpl-search.php - 검색결과 아이템 영역을 담당하는 템플릿입니다.
 * 
 * @package theme-itssue
 */
?>
<li>
  <dl>
    <dt>
      <?php
      printf( '<a href="%s" title="%s" class="search-title">%s</a>'
        , get_permalink()
        , the_title_attribute( 'after= 보러가기&echo=0' )
        , get_the_title()
      );
      ?>
    </dt>
    <dd>
      <?php the_excerpt(); ?>
    </dd>
    <dd>
      <span class="info-date"><?php echo get_the_date(); ?></span>
      <span class="info-author"><?php the_author(); ?></span>
    </dd>
  </dl>
</li>