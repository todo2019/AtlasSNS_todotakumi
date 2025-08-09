$(function () {
  $('#menu-toggle').click(function () {
    $(this).toggleClass('active');
    $('.navi-menu').toggleClass('active');


    // メニューリンクをクリックしたら閉じる（任意）
    $('.navi-menu li a').click(function () {
      $('#menu-toggle').removeClass('active').html('>');
      $('.navi-menu').removeClass('active');
    });
  });
});
