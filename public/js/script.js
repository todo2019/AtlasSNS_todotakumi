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

$(function () {
  if (localStorage.getItem('resultActive') === 'true') {
    $('.result').addClass('active');
  }

  $('.search-icon').click(function (e) {
    const keyword = $('.keyword').val().trim();
    $('.result').removeClass('active');
    localStorage.removeItem('resultActive');

    if (keyword !== '') {
      $('.result').addClass('active');
      localStorage.setItem('resultActive', 'true');
    }
  });

  $(window).on('beforeunload unload', function () {
    if ($('.result').hasClass('active')) {
      return;
    }
    $('.result').removeClass('active');
    localStorage.removeItem('resultActive');
  });
});

$(function () {
  $('a[href="/search"]').click(function () {
    $('.result').removeClass('active');
    localStorage.removeItem('resultActive');
  });
});
