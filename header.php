<?php
/**
 * header.php - 사이트의 공통 부분 중 헤더 부분을 담당하는 템플릿
 *
 * @package theme-itssue
 */

$it_base = get_template_directory_uri();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <!-- head 태그에서 할 일 -->
  <?php
  wp_enqueue_style( 'style-css', $it_base. '/style.css' );
  ?>
  <!-- /head 태그에서 할 일 -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- 메인 백그라운드 이미지 -->
  <img src="<?php echo $it_base; ?>/images/main-bg.jpg"
    class="main-bg" alt="메인 백그라운드 이미지" />
  <!-- /메인 백그라운드 이미지 -->

  <div class="wrapper bg-fff">
    <header>
      <?php do_action( 'it_print_header' ); ?>

      <!-- 메뉴 영역 -->
      <div id="main-menu">
        <?php
        wp_nav_menu( array(
          'theme_location'  => 'primary',
          'container'       => 'nav',
          'container_class' => 'normal',
        ) );
        ?>
      </div><!-- #main-menu -->
      <!-- /메뉴 영역 -->
    </header>

    <div class="wrapper-inner">
      <div class="main-content">