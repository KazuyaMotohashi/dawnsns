require('./bootstrap');
console.log(1);
$(function () {
  $('.modalOpen').each(function () {
    $(this).on('click', function () {

      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(target);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
