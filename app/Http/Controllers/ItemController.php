<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Tag;



class ItemController extends Controller
{
    /**
    * コンストラクタ
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function createform(Request $request)
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
     * @param Request
     * @return Response
     */
    public function store(Request $request)
    {
        dd($request->tag);

        // バリデーション
        $this->validate($request, [
            'name' => 'max:100',
        ]);

        // 画像をstorageに保存
        $image = $request->image;
        $image_name = $image->store('');

        // アイテム作成
        $new_item = $request->user()->items()->create([
            'image' => "/storage/" . $image_name,
            'name' => $request->name,
        ]);

        // 取得したアイテムIDとタグIDを、tags_itemsに登録
        if (isset($request->tag)) {
            $new_item->tags()->sync($request->tag, false);
        }

        // すべてのアイテムを取得
        $items = $request->user()->items()->get();

        // リダイレクト
        return redirect('/items');
    }
}