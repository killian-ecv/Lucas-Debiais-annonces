<?php

namespace App\Http\Controllers;

use App\Enums\Categories;
use App\Enums\Deliveries;
use App\Enums\States;
use App\Enums\Trades;
use App\Http\Requests\AdRequest;
use App\Models\Ad;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdController extends Controller
{
    public function create(): View
    {
        $categories = Categories::cases();
        $states = States::cases();
        $deliveries = Deliveries::cases();
        $trades = Trades::cases();
        return view('ads.create')
            ->with('categories', $categories)
            ->with('states', $states)
            ->with('deliveries', $deliveries)
            ->with('trades', $trades);
    }

    public function store(AdRequest $request): RedirectResponse
    {
        $datas = $request->all();
        $datas['user_id'] = Auth::id();
        $ad = Ad::create($datas);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $path = $image->store('images');

                Image::create([
                    'ad_id' => $ad->id,
                    'img_url' => $path,
                ]);
            }
        }

        return redirect()->route('ads.show', $ad->id);
    }

    public function show(Ad $ad): View
    {
        return view('ads.show')->with('ad', $ad);
    }

    public function index(): View
    {
        $ads = Ad::where('user_id', Auth::user()->id)->get();
        return view('ads.index')->with('ads', $ads);
    }

    public function edit(Ad $ad): View
    {
        // Vérifiez si l'utilisateur est autorisé à effectuer cette action
        $this->authorize('update', $ad);

        $users = User::all();
        $categories = Categories::cases();
        $states = States::cases();
        $deliveries = Deliveries::cases();
        $trades = Trades::cases();
        return view('ads.edit')
            ->with('ad', $ad)
            ->with('categories', $categories)
            ->with('states', $states)
            ->with('deliveries', $deliveries)
            ->with('trades', $trades);
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
