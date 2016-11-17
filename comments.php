<?php
/**
 * comments.php - 포스트나 정적 페이지의 댓글 출력을 담당하는 파일입니다.
 * 
 * @package theme-itssue
 */
if ( post_password_required() ) {
  return;
}
?>
<div id="comments" class="comments-area">

  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
      <?php
      $comments_number = get_comments_number();
      printf( '%d개의 댓글이 있습니다.', $comments_number );
      ?>
    </h2>

    <ol class="comment-list">
      <?php
        wp_list_comments( array(
          'style'       => 'ol',
          'avatar_size' => 42,
        ) );
      ?>
    </ol>

    <?php the_comments_navigation(); ?>

  <?php endif; ?>

  <?php
    comment_form();
  ?>

</div><!-- .comments-area -->