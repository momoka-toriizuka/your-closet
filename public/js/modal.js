$(function deleteModal() {
  // 変数に要素を入れる
  var delete_open = $('#delete-modal-open');
  var delete_submit = $('#delete-modal-yes');
  var delete_close = $('#delete-modal-no');
  var delete_container = $('#delete-modal-container');
  var delete_form = $('#delete-form');
  var help_open = $('#help-modal-open');
  var help_container = $('#help-modal-container');

  // 開くボタンをクリックしたらモーダルを表示する
  delete_open.on('click', function () {
    delete_container.fadeIn();
    return false;
  });

  // 削除ボタンを押したらdeleteフォームを送信
  delete_submit.on('click', function(){
    delete_form.submit();
  })
  
  // 閉じるボタンをクリックしたらモーダルを閉じる
  delete_close.on('click', function(){
    delete_container.fadeOut();
    return false;
  });

  // informationボタンをクリックしたらモーダルを表示する
  help_open.on('click', function () {
    help_container.fadeIn();
    return false;
  });

});