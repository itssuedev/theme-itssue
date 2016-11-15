<?php
/**
 * functions.php - 기능 구현을 담당하는 파일 입니다.
 *
 * @package theme-itssue
 */


register_nav_menu( 'primary', '메인 메뉴' );

function it_main_sidebar() {
  register_sidebar( array(
    'name' => '기본 사이드바',
    'id' => 'main-sidebar',
    'description' => '기본 사이드바 입니다.',
  ) );
}
add_action( 'widgets_init', 'it_main_sidebar' );