<?php
/**
 * Template Name: Reverse page
 * reverse-page.php - 정적 페이지의 콘텐트를 역순으로 화면을 출력합니다.
 * 
 * @package theme-itssue
 */
get_header();
the_post();
?>
<div class="page-wrapper">
  <?php if ( comments_open() ) comments_template(); ?>
  <div class="pagination">
    <?php wp_link_pages(); ?>
  </div><!-- .pagination -->
  <div class="page-content">
    <?php the_content(); ?>
  </div><!-- .page-content -->
  <div class="page-inner">
    <h1 class="page-title">
      <?php the_title(); ?>
    </h1>
  </div><!-- .page-inner -->
</div><!-- .page-wrapper -->
<?php
get_footer();