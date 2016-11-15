<?php
/**
 * index.php - 테마 구성의 필수 파일입니다.
 * 
 * @package theme-itssue
 */
get_header();

while( have_posts() ) :
  the_post();
?>
  <a href="<?php echo get_permalink(); ?>">
    <h1><?php the_title(); ?></h1>
  </a>
  <br />

  <?php the_content(); ?>

  <br /><br />
<?php
endwhile;

get_footer();