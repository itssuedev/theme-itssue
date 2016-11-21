/**
 * common.js - 공통 자바스크립트
 *
 * @package theme-itssue
 */
jQuery(document).ready(function($) {
  $('a:not([title]').each(function(i,e) {
    var sTitle = e.text;
    $(e).attr('title', sTitle + ' 바로가기');
  });
});