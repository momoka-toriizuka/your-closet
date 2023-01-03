<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\OutfitRequest;
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
}
