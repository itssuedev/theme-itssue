<?php
/**
 * category.php - 카테고리 화면을 담당하는 파일입니다.
 * 
 * @package theme-itssue
 */
get_header();
$cat_name = get_query_var( 'category_name' );
?>
<div class="page-wrapper">
  <div class="page-inner">
    <h1 class="page-title">
      <?php single_cat_title(); ?>
    </h1>
  </div><!-- .page-inner -->
  <div class="page-content catwrap-<?php echo $cat_name; ?>">
    <?php if ( have_posts() ) : ?>
      <?php while( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'tmpl-category', $cat_name ); ?>
      <?php endwhile; ?>
      <p class="pagination">
      <?php echo paginate_links(); ?>
      </p>
    <?php else : ?>
      <?php get_template_part( 'tmpl-category', 'none' ); ?>
    <?php endif; ?>
  </div><!-- .page-content -->
</div><!-- .page-wrapper -->
<?php
get_footer();