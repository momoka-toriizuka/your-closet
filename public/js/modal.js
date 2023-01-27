$(function deleteModal() {
  // 変数に要素を入れる
  var open = $('#modal-open');
  var submit = $('#delete-modal-yes');
  var close = $('#delete-modal-no');
  var container = $('#delete-modal-container');
  var delete_form = $('#delete-form')

  // 開くボタンをクリックしたらモーダルを表示する
  open.on('click', function () {
    container.fadeIn();
    return false;
  });

  // 削除ボタンを押したらdeleteフォームを送信
  submit.on('click', function(){
    delete_form.submit();
  })
  
  // 閉じるボタンをクリックしたらモーダルを閉じる
  close.on('click', function(){
    container.fadeOut();
    return false
  });

});