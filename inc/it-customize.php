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

// 헤더 이미지 & 헤더 글 색상 html (JS 미지원)