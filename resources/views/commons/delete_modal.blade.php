<!-- 削除確認モーダル -->
<dialog id="delete-modal-container" class="modal-container" role="modal" aria-describedby="d-message">
  <!-- 確認メッセージ   -->
  <p class="modal-message">
    これを削除します。<br>
    本当によろしいですか？
  </p>
  <div class="form-group  modal-btn">
    <div class="btn-group">
      <!-- 削除ボタン -->
      <button type="submit" id="delete-modal-yes" class="btn btn-primary modal-delete-yes">削除する</button>
      <!-- キャンセルボタン -->
      <button type="button" id="delete-modal-no" class="btn btn-reverse modal-delete-no">キャンセル</button>
    </div>
  </div>
</dialog>