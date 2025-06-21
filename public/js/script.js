// Javascript動作確認
// $(function () { // if document is ready
//   alert('hello world')
// });

$(function () {
  $('.js-modal-open').on('click', function () {
    $('.modal').fadeIn();
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');

    $('.modal_post').text(post);
    $('.modal_id').val(post_id);
    return false;
  });



  $('.js-modal-close').on('click', function () {
    $('.modal').fadeOut();
    return false;
  });


  $('.js-modal-close').on('click', function () {
    $('.modal').fadeOut();
    return false;
  });
});
