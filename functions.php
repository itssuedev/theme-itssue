<?php
/**
 * functions.php - 기능 구현을 담당하는 파일 입니다.
 *
 * @package theme-itssue
 */

require_once( 'inc/it-customize.php' );

// 메뉴 등록
register_nav_menu( 'primary', '메인 메뉴' );

// 사이드바 등록
function it_main_sidebar() {
  register_sidebar( array(
    'name' => '기본 사이드바',
    'id' => 'main-sidebar',
    'description' => '기본 사이드바 입니다.',
  ) );
}
add_action( 'widgets_init', 'it_main_sidebar' );

// 댓글 창 스크립트 enqueue
function it_enqueue_comment_reply() {
  if( is_singular() && comments_open()
    && ( get_option( 'thread_comments' ) == 1 ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action(  'wp_enqueue_scripts', 'it_enqueue_comment_reply' );

// 사용자 정의 로고
$args = array(
  'width' => 290,
  'height' => 81,
  'header-text' => 'test-cls'
);
add_theme_support( 'custom-logo', $args );

// 사용자 정의 헤더
$args = array(
  'width' => 1080,
  'height' => 148,
  'default-text-color' => '551a8e',
  'header-text' => true,
  'wp-head-callback' => 'it_custom_header_style',
  'admin-head-callback' => 'it_custom_header_admin_style',
  'admin-preview-callback' => 'it_custom_header_admin_preview',
);
add_theme_support( 'custom-header', $args );

// 사용자 정의 배경 이미지
$args = array(
  'default-image' => get_template_directory_uri()
    . '/images/main-bg.jpg',
  'default-repeat'  => 'no-repleat',
  'default-position-x'  => 'center',
  'default-color' => '010a29',
);
add_theme_support( 'custom-background', $args );

// 타이틀 태그
add_theme_support( 'title-tag' );

// 특성 이미지
add_theme_support( 'post-thumbnails' );