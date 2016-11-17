<?php
/**
 * searchform.php - 검색 창 폼을 담당하는 파일입니다.
 * 
 * @package theme-itssue
 */
?>
<form method="get" action="<?php bloginfo( 'url' ); ?>">
  <input type="text" name="s" />
  <input type="submit" value="검색" />
</form>