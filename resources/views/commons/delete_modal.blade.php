<!-- <div id="modal-dialog" class="modal-dialog">
  <h1>モーダルダイアログ</h1>
  <button type="button" class="dialog-open">
    モーダルダイアログ<br>
    (モーダルウィンドウ)を開く
  </button> -->
<dialog id="dialog-panel" class="dialog-panel" role="dialog" aria-describedby="d-message">
  <p id="d-message" class="dialog-panel-message" role="document">
    これを削除します。<br>
    本当によろしいですか？
  </p>
  <div class="form-group">
    <div class="btn-group">
      <button type="button" id="dialog-yes" class="btn btn-primary">削除する</button>
      <a id="dialog-no" class="btn btn-reverse">キャンセル</a>
    </div>
  </div>
</dialog>