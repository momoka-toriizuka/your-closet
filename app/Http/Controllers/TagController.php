<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
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
     * タグ一覧
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tags = $request->user()->tags()->get();
        return view('tags.index', [
            'tags' => $tags,
        ]);
    }

    /**
     * タグ登録
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'name' =>'required|max:100',
        ]);

        // タグ作成
        $request->user()->tags()->create([
            'name' => $request->name,
        ]);

        return redirect('/tags');
    }

    /**
     * タグ削除
     * 
     * @param Request $request
     * @param Request $tag_id
     * @return Response
     */
    public function destroy(Request $request, $tag_id)
    {
        // レコードを取得
        $tag = Tag::find($tag_id);

        // ログイン中ユーザーとレコードのユーザーIDを照合
        $this->authorize('destroy', $tag);
        
        // タグ削除
        $tag->delete();
        return redirect('/tags');
    }

    /**
     * タグ編集フォーム
     * 
     * @param Request $request
     * @param Request $tag_id
     * @return Response
     */
    public function edit(Request $request, $tag_id)
    {   
        // レコードを取得
        $tag = Tag::find($tag_id);
        
        return view('tags.update', [            
                'tag' => $tag,
        ]);
    }

    /**
     * タグ編集
     * 
     * @param Request $request
     * @param Request $tag_id
     * @return Response
     */
    public function update(Request $request, $tag_id)
    {
        // バリデーション
        $this->validate($request, [
            'name' =>'required|max:255',
        ]);

        // レコードを取得
        $tag = Tag::find($tag_id);
        // ログイン中ユーザーとレコードのユーザーIDを照合
        $this->authorize('update', $tag);


        // タグ名変更
        $tag->update([
            'name' => $request->name,
        ]);

        return redirect('/tags');
    }

    /**
     * タグごとのアイテム一覧
     * 
     * @param Request $request
     * @param Request $tag_id
     * @return Response
     */
    public function itemsOfTag(Request $request, $tag_id)
    {
        // タグに紐づくアイテムとタグ情報を取得
        $tag = Tag::find($tag_id);
        
        // アイテム情報だけを抽出
        $items = $tag->items;

        return view('tags.item_of_tag', [
            'items' => $items,
            'tag' => $tag,
        ]);
    }
}
