$(function deleteModal() {
  // 変数に要素を入れる
  var delete_modal_open = $('#delete-modal-open');
  var delete_submit = $('#delete-modal-yes');
  var delete_cancel = $('#delete-modal-no');
  var delete_modal = $('#delete-modal-container');
  var delete_form = $('#delete-form')
  var outfit_modal_open = $('#outfit-modal-open')
  var outfit_modal = $('#outfit-modal-container')
  var outfit_form = $('#outfit-dialog-form')
  var outfit_confirm = $('#outfit-modal-confirm')
  var outfit_cancel = $('#outfit-modal-cancel')

  // 開くボタンをクリックしたら削除モーダルを表示する
  delete_modal_open.on('click', function () {
    delete_modal.fadeIn();
    return false;
  });

  // 削除ボタンを押したらdeleteフォームを送信
  delete_submit.on('click', function () {
    delete_form.submit();
  })

  // キャンセルボタンをクリックしたら削除モーダルを閉じる
  delete_cancel.on('click', function () {
    delete_modal.fadeOut();
    return false;
  });

  // コーディネート画面のアイテム選択モーダル表示
  outfit_modal_open.on('click', function () {
    outfit_modal.fadeIn();
  });

  // 決定ボタンを押したらコーディネートに追加するアイテムを格納する配列を作成してformに渡す
  outfit_confirm.on('click', function () {
    // チェックされた値を格納する配列を作成
    values_array = [];
    // アイテム一つひとつをチェックされているか確認
    // for (let i = 0; i < outfit_form.item.length; i++) {
    //   if (outfit_modal.item[i].checked) {
    //     alert('アイテム' + outfit_modal.item[i].value);
    //     values_array.push(outfit_modal.item[i].value)
    //   }
    // }
    // for (const item in outfit_form.item) {
    //   if (outfit_form.item[i].checked) {
    //     alert('アイテム' + outfit_form.item[i].value);
    //     values_array.push(outfit_form.item[i].value)
    //   }
    // }
    $('input[name=item]:checked').each(function() {
      var item_id = $(this).val();
      values_array.push(item_id);
    });
    for (let i = 0; i < values_array.length; i++) {
      alert(values_array[i]);
    }
    

    outfit_modal.fadeOut();
    return false;
  });

  // キャンセルボタンをクリックしたらアイテム選択モーダルを閉じる
  outfit_cancel.on('click', function () {
    outfit_modal.fadeOut();
  });

});