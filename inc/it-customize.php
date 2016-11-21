<?php
/**
 * functions.php - 기능 구현을 담당하는 파일 입니다.
 *
 * @package theme-itssue
 */

// 헤더 이미지 & 헤더 글 색상 스타일
function it_custom_header_style() {
  if ( !current_theme_supports( 'custom-header' ) )
    return;
  ?>
  <style type="text/css" id="it-custom-header-css">
  <?php if ( $header_image = get_header_image() ) : ?>
    header {
      background-image: url("<?php echo $header_image; ?>");
    }
  <?php endif; ?>
  <?php
    if ( display_header_text() ) :
      $text_color = get_header_textcolor();
  ?>
    .site-title a {
      color: #<?php echo esc_attr( $text_color ); ?>;
    }
  <?php else : ?>
    .site-title, .site-description {
      display: none;
    }
  <?php endif; ?>
  </style>
<?php
}

// 헤더 이미지 & 헤더 글 색상 스타일 (JS 미지원)
function it_custom_header_admin_style() {
  $header_background = '';
  if ( $header_image = get_header_image() ) {
    $header_background = "background-image: url(\"{$header_image}\");";
  }
?>
  <style type="text/css" id="it-custom-header-admin-css">
    #it-custom-header {
      background-color: #fff;
      border: none;
      width: 1030px;
      height: 123px;
      padding: 25px 25px 0 25px;
      <?php echo $header_background; ?>
    }

    .site-logo {
      padding: 10px 0 30px;
      float: left;
      height: auto;
      text-align: center;
    }

    .site-logo img {
      max-width: 100%;
      height: auto;
    }

    .site-branding {
      float: left;
      padding: 20px;
    }

    .header-right {
      float: right;
      font-size: 13px;
      color: #000;
      text-align: right;
      margin-top: 20px;
    }

    .header-right a {
      color: #000;
      display: inline-block;
      line-height: 180%;
    }

    .logo-extra {
      float: right;
      padding-left: 20px;
    }

    <?php
      if ( display_header_text() ) :
        $text_color = get_header_textcolor();
    ?>
      .site-title a {
        color: #<?php echo esc_attr( $text_color ); ?>;
      }
    <?php else : ?>
      .site-title, .site-description {
        display: none;
      }
    <?php endif; ?>
  </style>
<?php
}

// 헤더 이미지 & 헤더 글 색상 html
function it_print_header() {
?>
  <div class="site-logo">
    <!-- 로고 이미지 -->
    <?php the_custom_logo(); ?>
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
  <?php if ( $extra_logo = get_theme_mod( 'header_extra_logo' ) ) : ?>
    <img src=
      "<?php echo wp_get_attachment_image_url( $extra_logo ); ?>"
      alt="추가 로고 이미지" class="logo-extra" />
  <?php endif; ?>
  <!-- /추가 로고 이미지 -->

  <div class="header-right">
    <!-- 사이트 연락처 -->
    <?php
      $display
        = get_theme_mod( 'header_contact_show', true )
        ? 'block' : 'none';
    ?>
    <p class="site-contact" style="display:<?php echo $display; ?>">
      <?php echo
        get_theme_mod( 'header_contact', '연락처를 설정하세요.' ); ?>
    </p>
    <!-- /사이트 연락처 -->
  </div><!-- .header-right -->

  <div class="clear"></div>
<?php
}
add_action( 'it_print_header', 'it_print_header' );

// 알림판 영역 헤더 미리보기 (JS 미지원)
function it_custom_header_admin_preview() {
?>
  <div id="it-custom-header">
  <?php do_action( 'it_print_header' ); ?>
  </div>
<?php
}

// 사용자 정의하기 항목
function it_theme_customize_register( $wp_customize ) {
  // 전역 설정 panel
  $wp_customize->add_panel( 'it_customize_global', array(
    'priority' => 10,
    'title' => '전역 설정',
    'description' => '사이트에 전반적인 영향을 미치는 설정들을 관리합니다.',
  ) );
  $wp_customize->get_section( 'background_image' )->panel
                = 'it_customize_global';
  $wp_customize->get_section( 'background_image' )->title = '배경';
  $wp_customize->get_control( 'background_color' )->section
                = 'background_image';
  $wp_customize->get_section( 'custom_css' )->panel
                = 'it_customize_global';
  $wp_customize->get_section( 'static_front_page' )->panel
                = 'it_customize_global';
  $wp_customize->get_section( 'static_front_page' )->priority
                = 170;

  // 전역 설정 panel > 사이트 section
  $wp_customize->add_section( 'it_customize_site', array(
    'title' => '사이트',
    'description' => '사이트의 기본정보를 관리합니다.',
    'panel' => 'it_customize_global',
  ) );
  $wp_customize->get_control( 'blogname' )->section
                = 'it_customize_site';
  $wp_customize->get_control( 'blogdescription' )->section
                = 'it_customize_site';
  $wp_customize->get_control( 'site_icon' )->section
                = 'it_customize_site';

  // 헤더영역 section
  $wp_customize->add_section( 'it_customize_header', array(
    'priority' => 40,
    'title' => '헤더영역',
    'description' => '헤더영역을 설정합니다.',
  ) );
  $wp_customize->get_control( 'custom_logo' )->section
                = 'it_customize_header';
  $wp_customize->get_control( 'display_header_text' )->section
                = 'it_customize_header';
  $wp_customize->get_control( 'header_textcolor' )->section
                = 'it_customize_header';
  $wp_customize->get_control( 'header_textcolor' )->priority
                = 50;
  $wp_customize->get_control( 'header_image' )->section
                = 'it_customize_header';
  $wp_customize->get_control( 'header_image' )->priority
                = 60;

  // 푸터영역 패널
  $wp_customize->add_section( 'it_customize_footer', array(
    'priority' => 50,
    'title' => '푸터영역',
    'description' => '푸터영역을 설정합니다.',
  ) );

  // 불필요 항목 삭제
  $wp_customize->remove_section( 'title_tagline' );
  $wp_customize->remove_section( 'colors' );
  $wp_customize->remove_section( 'header_image' );

  // 헤더영역 > 사이트 연락처 control
  $wp_customize->add_setting( 'header_contact', array(
    'default' => '연락처를 설정하세요.',
    'sanitize_callback' => 'sanitize_email',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Control( $wp_customize, 'header_contact', array(
      'label' => '사이트 연락처',
      'description' => '이메일 주소를 입력합니다.',
      'section' => 'it_customize_header',
      'settings' => 'header_contact',
      'active_callback' => 'it_show_header_contact',
    ) )
  );

  // 헤더영역 > 사이트 연락처 보이기 control
  $wp_customize->add_setting( 'header_contact_show', array(
    'default' => true,
  ) );
  $wp_customize->add_control(
    new WP_Customize_Control( $wp_customize, 'header_contact_show',
      array(
        'priority' => 9,
        'label' => '사이트 연락처 보이기',
        'type' => 'checkbox',
        'section' => 'it_customize_header',
        'settings' => 'header_contact_show',
      )
    )
  );

  // 메뉴 > 메뉴 유형
  $wp_customize->add_section( 'it_customize_menu_type_section', array(
    'priority' => 1,
    'panel' => 'nav_menus',
    'title' => '메뉴 유형',
    'description' => '메뉴가 확장되는 유형을 선택합니다.',
  ) );
  $wp_customize->add_setting( 'it_customize_menu_type', array(
    'default' => 'normal',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Control( $wp_customize, 'it_customize_menu_type',
      array(
        'label' => '메뉴 유형',
        'section' => 'it_customize_menu_type_section',
        'type' => 'radio',
        'choices' =>
          array( 'normal' => '풀다운 메뉴', 'mega' => '메가 메뉴' ),
      )
    )
  );

  // 푸터영역 > 푸터 텍스트 control
  $wp_customize->add_setting( 'footer_text', array(
    'default' => '',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Control( $wp_customize, 'footer_text', array(
      'label' => '푸터 텍스트',
      'description' =>
        '푸터 영역에 출력할 텍스트를  입력합니다. 태그 사용이 가능합니다.',
      'priority' => 11,
      'type' => 'textarea',
      'section' => 'it_customize_footer',
      'settings' => 'footer_text',
    ) )
  );

  // 푸터영역 > 푸터 배경 색 control
  $wp_customize->add_setting( 'footer_background_color', array(
    'default' => '#a2a2a2',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color',
      array(
        'label' => '푸터 배경 색',
        'section' => 'it_customize_footer',
        'settings' => 'footer_background_color',
      )
  ) );

  // 헤더영역 > 추가 로고 control
  $wp_customize->add_setting( 'header_extra_logo', array(
    'default' => '',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control( $wp_customize,
      'header_extra_logo', array(
        'label' => '추가 로고',
        'priority' => 100,
        'section' => 'it_customize_header',
        'width' => 75,
        'height' => 88,
        'button_labels' => array(
          'frame_title'  => '추가 로고',
        ),
    ) )
  );
}
add_action( 'customize_register', 'it_theme_customize_register' );

// 사이트 연락처 보이기 여부
function it_show_header_contact() {
  return get_theme_mod( 'header_contact_show', true );
}

// 푸터 영역 배경색 스타일
function it_customize_style() {
?>
  <style type="text/css">
    footer {
      background-color:
        <?php
        echo get_theme_mod( 'footer_background_color', '#a2a2a2' );
        ?>;
    }
  </style>
<?php
}
add_action( 'wp_head', 'it_customize_style' );