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
  <!-- 웹사이트 타이틀 -->
  <title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>
  <!-- /웹사이트 타이틀 -->

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
      <div class="site-logo">
        <!-- 로고 이미지 -->
        <a href="<?php bloginfo( 'url' ); ?>" title="HOME">
          <img src="<?php echo $it_base; ?>/images/logo.png"
            alt="로고 이미지" />
        </a>
        <!-- /로고 이미지 -->
      </div><!-- .site-logo -->
      <div class="site-branding">
        <h1 class="site-title">
          <a href="<?php bloginfo( 'url' ); ?>" title="HOME">
            <?php bloginfo( 'name' ); ?>
          </a>
        </h1>
        <p class="site-description">
          <?php bloginfo( 'description' ); ?>
        </p>
      </div>

      <!-- 추가 로고 이미지 -->
      <img src="<?php echo $it_base; ?>/images/logo-extra.png"
        alt="추가 로고 이미지" class="logo-extra" />
      <!-- /추가 로고 이미지 -->

      <div class="header-right">
        <!-- 사이트 연락처 -->
       dev@itssue.co.kr
        <!-- /사이트 연락처 -->
      </div><!-- .header-right -->

      <div class="clear"></div>

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