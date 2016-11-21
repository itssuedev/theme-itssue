<?php
/**
 * front-page.php - 사이트의 랜딩 페이지를 담당하는 템플릿
 *
 * @package theme-itssue
 */
get_header();
?>

<div class="slider">
  <!-- 슬라이더 영역 -->
  <?php
  echo do_shortcode( get_theme_mod( 'it_customize_front_slider' ) );
  ?>
  <!-- /슬라이더 영역 -->
</div><!-- .slider -->

<div class="blocks">
  <?php $i = 1; for( ; 3 >= $i; $i++ ) : ?>
    <div id="front-block-<?php echo $i; ?>" class="one-third">
      <?php echo it_front_block( $i ); ?>
    </div>
  <?php endfor; ?>
</div>

<div class="blocks">
  <div class="two-third">
  <?php for( ; 7>= $i; $i++ ) : ?>
    <div id="front-block-<?php echo $i; ?>" class="one-second">
      <?php echo it_front_block( $i ); ?>
    </div>
  <?php endfor; ?>
  </div>
  <div class="one-third block-fbw">
    <?php
    echo do_shortcode( get_theme_mod( 'it_customize_front_sns' ) );
    ?>
  </div>
</div>

<?php
get_footer();