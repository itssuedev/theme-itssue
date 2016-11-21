(function($){
  // 헤더영역 > 사이트 연락처 보이기
  wp.customize('header_contact_show', function(value) {
    var el = $('p.site-contact');
    value.bind(function(newval) {
      el.css('display', newval ? 'block' : 'none');
    });
  });

  // 헤더영역 > 헤더 글 색상
  wp.customize('header_textcolor', function(value) {
    var el = $('.site-title a');
    value.bind(function(newval) {
      el.css('color', newval);
    });
  });

  // 메뉴 > 메뉴 유형
  wp.customize('it_customize_menu_type', function(value) {
    var el = $('#main-menu nav');
    value.bind(function(newval, oldval) {
      el.removeClass(oldval).addClass(newval);
    });
  });

  // 푸터영역 > 푸터 배경 색
  wp.customize('footer_background_color', function(value) {
    var el = $('footer');
    value.bind(function(newval) {
      el.css('background-color', newval);
    });
  });
})(jQuery);