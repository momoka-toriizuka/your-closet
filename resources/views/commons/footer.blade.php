<footer class="footer">
    <ul class="menu">
        <!-- アイテム一覧リンク -->
        <li class="icon">
            <a href="{{ route('items') }}">
                <img src="{{ asset('/02_icon_fashion_t-shirt.png') }}" alt="アイテム">
            </a>
        </li>
        <!-- タグ一覧リンク -->
        <li class="icon">
            <a href="{{ route('tags') }}">
                <img src="{{ asset('/sharp_icon.png') }}" alt="タグ">
            </a>
        </li>
        <!-- コーデ一覧リンク -->
        <li class="icon">
            <a href="{{ route('outfits') }}">
                <img src="{{ asset('/09_icon_fashion_onepiece.png') }}" alt="コーデ">
            </a>
        </li>
    </ul>
</footer>