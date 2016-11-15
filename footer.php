<?php
/**
 * footer.php - 사이트의 공통 부분 중 푸터 부분을 담당하는 템플릿
 *
 * @package theme-itssue
 */
?>
      </div><!-- .main-content -->
      <!-- 사이드바 -->
      <?php get_sidebar(); ?>
      <!-- /사이드바 -->

    </div><!-- .wrapper-inner -->

    <footer>
      <div class="footer-inner">
        <h4 class="footer-co-name">사이트명을 넣어주세요.</h4>

        <a href="#" title="오시는 길">
          <address>주소를 넣어주세요.</address>
        </a>

        <div class="footer-copyright">
          Copyright을 넣어주세요.
        </div><!-- .footer-copyright -->
      </div><!-- .footer-inner -->
    </footer>
  </div><!-- .wrapper -->
  <?php wp_footer(); ?>
</body>
</html>