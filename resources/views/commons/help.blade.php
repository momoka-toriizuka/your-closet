<!-- ヘルプモーダル -->
<dialog id="help-modal-container" class="modal-container" role="modal" aria-describedby="d-message">
    <main class="panel">
        <div class="help-modal-close">
            <a id="help-modal-close">×</a>
        </div>
        <div class="panel-body help-content">

            <!-- フッターのヘルプ -->
            <h2 class="help-headline">メニュー（フッター）</h2>
            <div class="help-section">
                <p class="help-paragraph">
                    ・画面右下の＋アイコンから、アイテム登録画面に遷移可能です。<br>
                    ・フッターの#アイコンから、タグ一覧画面に遷移可能です。<br>
                    ・フッターのワンピースアイコンから、コーディネート一覧画面に遷移可能です。
                </p>
            </div>

            <!-- アイテムのヘルプ -->
            <h2 class="help-headline">アイテム</h2>
            <p class="help-paragraph">
                お手持ちの洋服・バッグ・アクセサリー・靴などを写真とともに登録することができます。<br>
                ショッピングや不要な服の処分などにお役立てください。
            </p>
            <h2 class="help-sub-headline">アイテム一覧画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    すべてのアイテムを表示する画面です。ログイン後は、この画面にリダイレクトします。<br>
                    フッターのTシャツアイコンから遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・この画面にはアイテムの画像だけが表示されており、アイテム名やタグはアイテム詳細画面でご確認いただく仕様となっています。<br>
                    ・アイテムの写真をクリック/タップすることで、アイテム詳細画面に遷移可能です。<br>
                    ・画面右上のログアウトボタンを<span class="color-red">一度</span>押下することで、ログアウト可能です。
                </p>
            </div>
            <h2 class="help-sub-headline">アイテム登録画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    画像・名前を指定してアイテムを登録し、あらかじめ登録しておいたタグをアイテムに付ける画面です。<br>
                    アイテム一覧画面右下の＋アイコンから、遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・「アイテム画像を選択」ボタンから画像を選んでください（<span class="color-red">必須項目</span>）。<br>
                    ・アイテム名をテキストボックスに入力してください（任意項目）。<br>
                    ・アイテムと紐づけたいタグを選び、チェックを入れてください（任意項目）。<br>
                    ・登録ボタン押下で登録され、アイテム一覧画面にリダイレクトします。<br>
                    ・キャンセルボタン押下でアイテム一覧画面に遷移可能です。
                </p>
            </div>
            <h2 class="help-sub-headline">アイテム詳細画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    アイテムの画像と名前、アイテムに紐づけられたタグを確認出来る画面です。<br>
                    アイテム一覧画面、タグごとのアイテム一覧画面に表示されるアイテム写真を押下することで、遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・グレーで表示されているタグをクリック/タップすることで、そのタグごとのアイテム一覧画面に遷移可能です。<br>
                    ・編集ボタン押下で、アイテム編集画面に遷移可能です。<br>
                    ・キャンセルボタン押下でアイテム一覧画面に遷移可能です。<br>
                    ・画面右上のゴミ箱アイコンから、表示されているアイテムを削除できます。
                </p>
            </div>
            <h2 class="help-sub-headline">アイテム編集画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    アイテムの画像と名前の変更、タグの付け替えができます。<br>
                    アイテム詳細画面の編集ボタンから遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・「アイテム画像を選択」ボタンから画像を選び直してください（<span class="color-red">必須項目</span>）。
                    画像を変更したくない場合も、選択し直してください。<br>
                    ・アイテム名をテキストボックスに入力してください（任意項目）。<br>
                    ・アイテムと紐づけたいタグにチェックを入れ、紐づけを解除したいタグのチェックを外してください（任意項目）。<br>
                    ・更新ボタン押下で内容が変更され、アイテム一覧画面にリダイレクトします。<br>
                    ・キャンセルボタン押下でアイテム詳細画面に遷移可能です。
                </p>
            </div>

            <!-- タグのヘルプ -->
            <h2 class="help-headline">タグ</h2>
            <p class="help-paragraph">
                アイテムにタグ付けすることでアイテムを分類し、お手持ちのアイテムの色や系統チェックなどにお役立ていただけます。<br>
                また、一つのアイテムに複数のタグを付けることもできます。
            </p>
            <h2 class="help-sub-headline">タグ一覧画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    登録されているすべてのタグを表示する画面です。<br>
                    フッターの#アイコンから遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・初めから用意されているタグはなく、ご自身ですべて登録していただく仕様です。<br>
                    ・画面上部のテキストボックスにタグを入力し登録ボタンを押すことで、タグを登録することができます。<br>
                    ・画面左に表示されている#タグをクリック/タップすることで、そのタグに紐づけられたアイテムの一覧画面に遷移可能です。<br>
                    ・#タグの右側に表示されている編集ボタンを押すことで、タグ編集画面に遷移可能です。<br>
                    ・#タグの右側に表示されている削除ボタンを<span class="color-red">一度押下</span>することで、タグを削除することができます。
                </p>
            </div>
            <h2 class="help-sub-headline">タグ編集画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    タグ一覧画面で選択したタグ名を変更できる画面です。<br>
                    タグ一覧画面の編集ボタンから遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・テキストボックスに新しいタグ名を入力し更新ボタンを押すことで、タグ名を変更することができます。登録後はタグ一覧画面にリダイレクトします。<br>
                    ・キャンセルボタン押下でタグ一覧画面に遷移可能です。
                </p>
            </div>
            <h2 class="help-sub-headline">タグごとのアイテム一覧画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    画面左上に表示されているタグに紐づけられているアイテムを表示する画面です。<br>
                    タグ一覧画面のタグをクリック/タップすることで遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・アイテムの写真をクリック/タップすることで、アイテム詳細画面に遷移可能です。<br>
                </p>
            </div>
            <!-- コーディネートのヘルプ -->
            <h2 class="help-headline">コーディネート</h2>
            <p class="help-paragraph">
                あらかじめ登録しておいたアイテムを複数選択し、コーディネートとして登録することができます。<br>
                毎日の洋服・アクセサリー・靴選びや、ショッピングの際にお役立てください。
            </p>
            <h2 class="help-sub-headline">コーディネート一覧画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    全てのコーディネートを表示する画面です。<br>
                    フッターのワンピースアイコンから遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・一覧画面で一つのコーディネートの枠内に表示されるアイテムは、最大4件です。 <br>
                    ・コーディネートの枠内をクリック/タップすることで、コーディネート詳細画面に遷移可能です。<br>
                    ・画面右下の＋アイコンから、コーディネート登録画面に遷移可能です。
                </p>
            </div>
            <h2 class="help-sub-headline">コーディネート登録画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    コーディネートに紐づけるアイテムを選択・名前を入力することで、コーディネートを登録することができます。<br>
                    コーディネート一覧画面右下の＋アイコンから遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・「アイテム選択」ボタンでアイテム選択画面に遷移し、コーディネートに登録するアイテムを選択して
                    決定ボタンを押してください（<span class="color-red">必須項目</span>）。<br>
                    ・アイテムが選択されている場合、画面中央の枠内にアイテムが表示されます。
                    アイテムが多い場合、横スクロールでご確認いただけます。<br>
                    ・テキストボックスにコーディネート名を入力してください（任意項目）。<br>
                    ・登録ボタン押下で登録され、コーディネート一覧画面にリダイレクトします。<br>
                    ・キャンセルボタン押下でコーディネート一覧画面に遷移可能です。
                </p>
            </div>
            <h2 class="help-sub-headline">コーディネート詳細画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    コーディネートに登録されているアイテムとコーディネート名を確認することができます。<br>
                    コーディネート一覧画面に表示されているコーディネートの枠内をクリック/タップすることで遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・画面中央の枠内に、コーディネートに登録されているアイテムの画像が表示されます。<br>
                    ・アイテム数が多い場合は、横スクロールでご確認ください。<br>
                    ・編集ボタン押下でコーディネート編集画面に遷移可能です。<br>
                    ・キャンセルボタン押下でコーディネート一覧画面に遷移可能です。<br>
                    ・画面右上のゴミ箱アイコンから、表示されているコーディネートを削除できます。
                </p>
            </div>
            <h2 class="help-sub-headline">コーディネート編集画面</h2>
            <div class="help-section">
                <p class="help-gray">
                    コーディネートに紐づけるアイテムとコーディネート名を変更出来る画面です。<br>
                    コーディネート詳細画面の編集ボタン押下で遷移可能です。
                </p>
                <p class="help-paragraph">
                    ・紐づけるアイテムを変更したい場合は「アイテム選択」ボタンでアイテム選択画面に遷移し、コーディネートに登録したいアイテムにチェックを入れてください（<span class="color-red">必須項目</span>）。<br>
                    ・現在紐づけられているアイテムには初めからチェックが入っているので、必要に応じて外してください。<br>
                    ・テキストボックスにコーディネート名を入力してください（任意項目）。<br>
                    ・更新ボタン押下で内容が変更され、コーディネート一覧画面にリダイレクトされます。<br>
                    ・キャンセルボタン押下でコーディネート一覧画面に遷移可能です。
                </p>
            </div>
        </div>
    </main>
</dialog>