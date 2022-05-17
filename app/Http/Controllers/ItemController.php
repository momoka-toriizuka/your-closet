<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * アイテム一覧
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $items = $request->user()->items()->get();
        return view('items.index', [
            'items' => $items,
        ]);
    }

    /**
     * アイテム登録フォーム
     * 
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        // すべてのタグを取得
        $tags = $request->user()->tags()->get();

        return view('items.create', [
            'tags' => $tags,
        ]);
    }

    /**
     * アイテム登録
     * 
     * @param ItemRequest
     * @return Response
     */
    public function store(ItemRequest $request)
    {
        // 画像をstorageに保存
        $image = $request->image;
        $image_name = $image->store('');

        // アイテム作成
        $new_item = $request->user()->items()->create([
            'image' => $image_name,
            'name' => $request->name,
        ]);

        // 取得したアイテムIDとタグIDを、tags_itemsに登録
        if (isset($request->tag)) {
            $new_item->tags()->sync($request->tag, false);
        }

        // リダイレクト
        return redirect('items');
    }

    /**
     * アイテム削除
     * 
     * @param Request $request
     * @param Item $item
     * @return Response
     */
    public function destroy(Request $request, Item $item)
    {
        // ストレージの画像ファイルを削除
        $current_path = $item->image;
        Storage::disk('public')->delete($current_path);

        // アイテム削除
        $item->delete();

        // リダイレクト
        return redirect('items');
    }

    /**
     * アイテム詳細
     * 
     * @param Request $request
     * @param Item $item
     * @return Response
     */
    public function detail(Request $request, Item $item)
    {
        // タグ情報だけを抽出
        $tags = $item->tags;

        return view('items.detail', [
            'item' => $item,
            'tags' => $tags,
        ]);
    }

    /**
     * アイテム編集フォーム
     * 
     * @param Request $request
     * @param Item $item_id
     * @return Response
     */
    public function edit(Request $request, Item $item)
    {
        // チェックされたタグのIDを配列として取得
        $checked_tags = $item->tags->pluck('id')->toArray();

        // すべてのタグを取得
        $tags = $request->user()->tags()->get();

        return view('items.update', [
            'item' => $item,
            'checked_tags' => $checked_tags,
            'tags' => $tags,
        ]);
    }

    /**
     * アイテム編集
     * 
     * @param ItemRequest $request
     * @param Item $item
     * @return Response
     */
    public function update(ItemRequest $request, Item $item)
    {
        // 現在の画像のパスをセット
        $current_path = $item->image;
        // 現在の画像ファイルの削除
        Storage::disk('public')->delete($current_path);

        // 画像をstorageに保存
        $image = $request->image;
        $image_name = $image->store('');

        // アイテム情報変更
        $item->update([
            'image' => $image_name,
            'name' => $request->name,
        ]);

        // 現在のタグの紐づけを解除
        $current_tags = $item->tags()->get();
        $item->tags()->detach($current_tags);

        // チェックがついていれば、新しくタグ付けする
        if (isset($request->tag)) {
            $item->tags()->attach($request->tag);
        }

        return redirect('items');
    }
}