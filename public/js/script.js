$(function () {
  $('.modalOpen').each(function () {
    $(this).on('click', function () {
      console.log(1);
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      $(modal).fadeIn();
      return false;
    });
  });
});

$(function () {
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.active-form')) {
      //ここに外側をクリックしたときの処理
      var target = $('.modalOpen').data('target');
      var modal = document.getElementById(target);
      $(modal).fadeOut();
    } else {
      //ここに内側をクリックしたときの処理
    };
  })
});




// $(function () {
//   $('.menu-trigger').click(function () {
//     $(this).toggleClass('active');
//     if ($(this).hasClass('active')) {
//       $('.g-navi').addClass('active');
//     } else {
//       $('.g-navi').removeClass('active');
//     }
//   });
//   $('.nav-wrapper ul li a').click(function () {
//     $('.menu-trigger').removeClass('active');
//     $('.g-navi').removeClass('active');
//   });
// });



$(function () {
  $(".menu-trigger").click(function () {
    $('.ku').toggleClass('active');
    $(".menu").slideToggle();
  });
});
