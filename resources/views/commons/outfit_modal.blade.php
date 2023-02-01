<dialog id="outfit-modal-container" class="modal-container outfit-modal-container">
    <form method="dialog" id="outfit-dialog-form" action="">

    <!-- アイテムがない場合 -->
        @if (count($items) == 0)
        <div class="message">
            <p class="nothing">アイテムがありません。</p>
        </div>

        <!-- アイテムがある場合 -->
        @elseif (count($items) > 0)
        <div class="data">
            @foreach ($items as $item)
            <a href="{{ route('item.detail', $item->id) }}">
                <input class="checkbox checkbox-select-items" type="checkbox" name="item" value="{{ $item->id }}" <?= (in_array($item->id, $selected_items) ? 'checked' : '') ?>>
                <img class="item-img item-img-index" type="image" src="{{ asset('/storage/'.$item->image) }}" alt="{{ $item->name }}">
            </a>
            @endforeach
        </div>
        @endif

        <div class="form-group  modal-btn">
            <div class="btn-group">
                <!-- 決定ボタン -->
                <button type="submit" id="outfit-modal-confirm" class="btn btn-primary outfit-modal-yes">決定</button>
                <!-- キャンセルボタン -->
                <button type="button" id="outfit-modal-cancel" class="btn btn-reverse outfit-modal-no">キャンセル</button>
            </div>
        </div>
    </form>
</dialog>