<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
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
     * @param TagRequest $request
     * @return Response
     */
    public function store(TagRequest $request)
    {
        // タグ作成(Requestsでバリデーション済)
        $request->user()->tags()->create([
            'tag_name' => $request->tag_name,
        ]);

        return redirect('/tags');
    }

    /**
     * タグ削除
     * 
     * @param Request $request
     * @param Tag $tag
     * @return Response
     */
    public function destroy(Request $request, Tag $tag)
    {
        // タグ削除
        $tag->delete();
        return redirect('/tags');
    }

    /**
     * タグ編集フォーム
     * 
     * @param Request $request
     * @param Tag $tag
     * @return Response
     */
    public function edit(Request $request, Tag $tag)
    {   
        return view('tags.update', [            
                'tag' => $tag,
        ]);
    }

    /**
     * タグ編集
     * 
     * @param TagRequest $request
     * @param Tag $tag
     * @return Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        // タグ名変更(Requestsでバリデーション済)
        $tag->update([
            'tag_name' => $request->tag_name,
        ]);

        return redirect('/tags');
    }

    /**
     * タグごとのアイテム一覧
     * 
     * @param Request $request
     * @param Tag $tag
     * @return Response
     */
    public function itemsOfTag(Request $request, Tag $tag)
    {
        // アイテム情報だけを抽出
        $items = $tag->items;
        
        return view('tags.item_of_tag', [
            'items' => $items,
            'tag' => $tag,
        ]);
    }
}
