$(function () {
  $('#menu_toggle').click(function () {
    $(this).toggleClass('active');
    $('.navi_menu').toggleClass('active');


    $('.navi_menu li a').click(function () {
      $('#menu_toggle').removeClass('active').html('>');
      $('.navi_menu').removeClass('active');
    });
  });
});

$(function () {
  if (localStorage.getItem('resultActive') === 'true') {
    $('.result').addClass('active');
  }

  $('.search_icon').click(function (e) {
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


$(function () {
  $('.edit_icon').click(function () {
    const postItem = $(this).closest('.post_result');
    postItem.find('.modal, .modal_overlay').fadeIn();
  });

  $('.modal_edit').click(function () {
    const postItem = $(this).closest('.post_result');
    postItem.find('.modal, .modal_overlay').fadeOut();
  });

  $('.modal_overlay').click(function (e) {
    if ($(e.target).is('.modal_overlay')) {
      const postItem = $(this).closest('.post_result');
      postItem.find('.modal, .modal_overlay').fadeOut();
    }
  });
});
