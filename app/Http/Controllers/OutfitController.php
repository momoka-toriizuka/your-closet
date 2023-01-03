<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OutfitRequest;
use App\Models\Outfit;

class OutfitController extends Controller
{
    /**
     * コーディネート一覧
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $outfits = $request->user()->outfits()->get();
        return view('outfits.index', [
            'outfits' => $outfits,
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
        $outfits = $request->user()->tags()->get();

        return view('outfits.create', [
            'outfits' => $outfits,
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
            'name' => $request->name,
        ]);

        return redirect('/outfits');
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
        return view('outfits.detail', [
            'outfit' => $outfit,
        ]);
    }
}
