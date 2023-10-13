<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function index(): View
    {
        $ads = Ad::all();
        return view('public.index')->with('ads', $ads);
    }

    public function show($id): View
    {
        $ad = Ad::find($id);

        if (!$ad) {
            abort(404, 'Annonce non trouvée');
        }

        return view('public.ad.show')->with('ad', $ad);
    }
}
