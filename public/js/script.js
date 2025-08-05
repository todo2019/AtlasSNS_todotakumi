$(function () {
  $('#menu-toggle').click(function () {
    $(this).toggleClass('active');
    $('.navi-menu').toggleClass('active');

    // 「<」と「>」を切り替える const current = $this.html().trim(); // 念のため trim()
    const current = $this.html().trim();
    $this.html(current === '<' ? '>' : '<');


    // メニューリンクをクリックしたら閉じる（任意）
    $('.navi-menu li a').click(function () {
      $('#menu-toggle').removeClass('active').html('>');
      $('.navi-menu').removeClass('active');
    });
  });
});
