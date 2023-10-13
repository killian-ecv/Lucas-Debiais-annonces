<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdController extends Controller
{
    public function create(): View
    {
        $users = User::all();
        return view('ads.create')->with('users', $users);
    }

    public function store(AdRequest $request): RedirectResponse
    {
        $datas = $request->all();
        $datas['user_id'] = Auth::id();
        $ad = Ad::create($datas);
        return redirect()->route('ads.show', $ad->id);
    }

    public function show(Ad $ad): View
    {
        return view('ads.show')->with('ad', $ad);
    }


    public function index(Request $request): View
    {
        $ads = Ad::all();
        return view('ads.index')->with('ads', $ads);
    }

    public function edit(Ad $ad): View
    {
        $users = User::all();
        return view('ads.edit')->with('ad', $ad)->with('users', $users);
    }

    public function update(AdRequest $request, string $id): RedirectResponse
    {
        $datas = $request->all();
        $ad = Ad::find($id);
        $ad->update($datas);
        return redirect()->route('ads.show', $ad->id);
    }

    public function destroy(Ad $ad): RedirectResponse
    {
        $ad->delete();
        return redirect()->route('ads.index');
    }
}
