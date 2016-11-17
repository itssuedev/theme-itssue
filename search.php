<?php
/**
 * search.php - 검색 결과를 담당하는 템플릿입니다.
 *
 * @package theme-itssue
 */
get_header();
?>
<div class="page-wrapper">
  <div class="page-inner">
    <h1 class="page-title">
      <?php printf( "'%s' 검색결과", get_query_var( 's' ) ); ?>
    </h1>
  </div><!-- .page-inner -->
  <div class="page-content searchwrap">
    <?php if ( have_posts() ) : ?>
      <ul class="search-result">
        <?php while( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'tmpl-search' ); ?>
        <?php endwhile; ?>
      </ul>
      <div class="pagination">
        <?php echo paginate_links(); ?>
      </div>
    <?php else : ?>
      <span class="no-resuslt">검색 결과가 없습니다.</span>
    <?php endif; ?>
  </div><!-- .page-content -->
</div><!-- .page-wrapper -->
<?php
get_footer();