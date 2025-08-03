$(function () {
  $('#menu-toggle').click(function () {
    $(this).toggleClass('active');
    $('.navi-menu').toggleClass('active');

    // 「<」と「>」を切り替える
    if ($(this).hasClass('active')) {
      $(this).html('&gt;'); // >
    } else {
      $(this).html('&lt;'); // <
    }
  });

  // メニューリンクをクリックしたら閉じる（任意）
  $('.navi-menu li a').click(function () {
    $('#menu-toggle').removeClass('active').html('&lt;');
    $('.navi-menu').removeClass('active');
  });
});
