<?php
/**
 * footer.php - 사이트의 공통 부분 중 푸터 부분을 담당하는 템플릿
 *
 * @package theme-itssue
 */
?>
      </div><!-- .main-content -->
      <!-- 사이드바 -->
      <?php if ( !is_front_page() ) get_sidebar(); ?>
      <!-- /사이드바 -->

    </div><!-- .wrapper-inner -->

    <footer>
      <div class="footer-inner">
       <?php echo get_theme_mod( 'footer_text' ); ?>
      </div><!-- .footer-inner -->
    </footer>
  </div><!-- .wrapper -->
  <?php wp_footer(); ?>
</body>
</html>