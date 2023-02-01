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
        // すべてのアイテムを取得
        $items = $request->user()->items()->get();
        // 現在紐づけられているアイテムを取得(ないので空。登録処理に使う)
        $selected_items = array();

        return view('outfits.create', [
            'items' => $items,
            'selected_items' => $selected_items
        ]);
    }

    /**
     * コーディネートに追加するアイテムの選択
     * 
     * @param Request $request
     * @return Response
     */
    public function selectToStore(Request $request)
    {
        // 全アイテムを取得
        $items = $request->user()->items()->get();

        return view('outfits.select_to_store', [
            'items' => $items
        ]);
    }

    /**
     * 選択したアイテムを登録フォームに渡す
     * 
     * @param OutfitRequest $request
     * @return Response
     */
    public function setToStore(OutfitRequest $request)
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
     * コーディネート登録
     * 
     * @param OutfitRequest $request
     * @return Response
     */
    public function store(OutfitRequest $request)
    {
        // コーディネート作成(Requestsでバリデーション済)
        $new_outfit = $request->user()->outfits()->create([
            'name' => $request->name
        ]);

        // 取得したコーディネート(outfit)IDとアイテムIDを、items_outfitsに登録
        $new_outfit->items()->sync($request->item, false);

        return redirect('outfits');
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

    /**
     * コーディネート編集フォーム
     * 
     * @param Request $request
     * @param Outfit $outfit
     * @return Response
     */
    public function edit(Request $request, Outfit $outfit)
    {
        // 全アイテムを取得
        $items = $request->user()->items()->get();
        // 既に紐づけられているアイテムを取得
        $selected_items = $outfit->items->pluck('id')->toArray();

        return view('outfits.update', [
            'items' => $items,
            'selected_items' => $selected_items,
            'outfit' => $outfit
        ]);
    }

    /**
     * コーディネートに追加するアイテムの選択
     * 
     * @param Request $request
     * @param Outfit $outfit
     * @return Response
     */
    public function selectToUpdate(Request $request, Outfit $outfit)
    {
        // 全アイテムを取得
        $items = $request->user()->items()->get();
        
        // 既に紐づけられているアイテムを取得
        $selected_items = $outfit->items->pluck('id')->toArray();

        return view('outfits.select_to_update', [
            'items' => $items,
            'outfit' => $outfit,
            'selected_items' => $selected_items
        ]);
    }

    /**
     * 選択したアイテムを登録フォームに渡す
     * 
     * @param OutfitRequest $request
     * @param Outfit $outfit
     * @return Response
     */
    public function setToUpdate(OutfitRequest $request, Outfit $outfit)
    {
        // 全アイテムを取得
        $items = $request->user()->items()->get();
        // チェックされたアイテムのIDを配列として取得
        $selected_items = $request->item;

        return view('outfits.update', [
            'items' => $items,
            'outfit' => $outfit,
            'selected_items' => $selected_items
        ]);
    }

    /**
     * コーディネート編集
     * 
     * @param OutfitRequest $request
     * @param Outfit $outfit
     * @return Response
     */
    public function update(OutfitRequest $request, Outfit $outfit)
    {
        // コーディネート作成(Requestsでバリデーション済)
        $renewed_outfit = $outfit->update([
            'name' => $request->name
        ]);

        // 現在のアイテムの紐づけを解除
        $selected_items = $outfit->items()->get();
        $outfit->items()->detach($selected_items);

        // 新しくアイテムを紐づける
        $outfit->items()->attach($request->item);

        return redirect('outfits');
    }
}