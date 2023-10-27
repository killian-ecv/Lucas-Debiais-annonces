<?php

namespace App\Http\Controllers;

use App\Enums\Categories;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Categories::cases();
        $query = Ad::query();

        if ($request->has('date') && $request->date == 'created_at') {
            $query->orderBy('created_at');
        } elseif ($request->has('date') && $request->date == 'expiration_date') {
            $query->orderBy('expiration_date');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        if ($request->has('category') && !$request->category == '') {
            $query->where('category', $request->category);
        }

        $ads = $query->get();

        return view('public.index')->with('ads', $ads)->with('categories', $categories);
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
