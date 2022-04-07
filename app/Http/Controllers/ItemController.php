<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

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
        $items = Item::orderBy('created_at', 'asc')->get();
        return view('items.index', [
            'items' => $items,
        ]);
    }
}
