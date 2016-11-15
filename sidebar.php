<?php
/**
 * sidebar.php - 사이트의 공통 부분 중 사이드바 부분을 담당하는 템플릿
 *
 * @package theme-itssue
 */
?>
<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
  <div class="main-sidebar">
  <?php dynamic_sidebar( 'main-sidebar' ); ?>
  </div>
<?php endif; ?>