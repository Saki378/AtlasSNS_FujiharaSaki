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

  // クリックしたときモーダルをとじる
  $('.js-modal-close').on('click', function () {
    $('.modal').fadeOut();
    return false;
  });
});


// プロフィール更新画面ファイルを添付した際にデータ名を移す。
$('#attachment .fileinput').on('change', function () {
  var file = $(this).prop('files')[0];
  $(this).closest('#attachment').find('.filename').text(file.name);
});
