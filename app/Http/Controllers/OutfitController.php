<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OutfitRequest;
use App\Models\Item;
use App\Models\Outfit;

class OutfitController extends Controller
{
    /**
     * コーディネート一覧
     * 
     * @param Request $request
     * @param Outfit $outfit
     * @return Response
     */
    public function index(Request $request, Outfit $outfit)
    {
        // 全てのコーディネートを取得
        $outfits = $request->user()->outfits()->get();

        return view('outfits.index', [
            'outfits' => $outfits
        ]);
    }
    
    /**
     * コーディネート登録フォーム
     * 
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        // すべてのタグを取得
        $items = $request->user()->items()->get();
        $outfits = $request->user()->tags()->get();

        $selected_items = array();

        return view('outfits.create', [
            'items' => $items,
            'outfits' => $outfits,
            'selected_items' => $selected_items
        ]);
    }
    /**
     * コーディネート登録
     * 
     * @param OutfitRequest $request
     * @return Response
     */
    public function store(OutfitRequest $request)
    {
        // コーディネート作成(Requestsでバリデーション済)
        $request->user()->outfits()->create([
            'name' => $request->name
        ]);

        return redirect('/outfits');
    }

    /**
     * コーディネートに追加するアイテムの選択
     * 
     * @param Request $request
     * @return Response
     */
    public function select(Request $request)
    {
        // 全アイテムを取得
        $items = $request->user()->items()->get();

        return view('outfits.select', [
            'items' => $items
        ]);
    }

    /**
     * 選択したアイテムを登録フォームに渡す
     * 
     * @param Request $request
     * @return Response
     */
    public function set(Request $request)
    {
        // 全アイテムを取得
        $items = $request->user()->items()->get();
        // チェックされたアイテムのIDを配列として取得
        $selected_items = $request->item;

        return view('outfits.create', [
            'items' => $items,
            'selected_items' => $selected_items
        ]);
    }

    /**
     * コーディネート削除
     * 
     * @param Request $request
     * @param Outfit $outfit
     * @return Response
     */
    public function destroy(Request $request, Outfit $outfit)
    {
        // コーディネート削除
        $outfit->delete();

        // リダイレクト
        return redirect('outfits');
    }

    /**
     * コーディネート詳細
     * 
     * @param Request $request
     * @param Outfit $outfit
     * @return Response
     */
    public function detail(Request $request, Outfit $outfit)
    {
        // アイテム情報だけを抽出
        $items = $outfit->items;

        return view('outfits.detail', [
            'items' => $items,
            'outfit' => $outfit
        ]);
    }
}
