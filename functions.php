<?php
/**
 * functions.php - 기능 구현을 담당하는 파일 입니다.
 *
 * @package theme-itssue
 */

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