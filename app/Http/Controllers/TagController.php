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
            'name' =>'required|max:255',
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
     * @return Response
     */
    public function destroy(Request $request, Tag $tag)
    {
        $this->authorize('destroy', $tag);
        
        $tag->delete();
        return redirect('/tags');
    }
}
