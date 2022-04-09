<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

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
}
