<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Http\Requests\StoreMarketRequest;
use App\Http\Requests\UpdateMarketRequest;
use App\Http\Resources\MarketResource;
use App\Services\MarketService;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(
        protected MarketService $marketService
    ) {
    }
    public function index()
    {
        $pageTitle = 'Tambah Market';
        $markets = $this->marketService->getAllMarkets();
        return view('market.index', compact('markets', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $pageTitle = 'Admin';
        // $markets = $this->marketService->getAllMarkets();
        // return view('market.index', compact('markets', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMarketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarketRequest $request)
    {
        $validatedData = $request->validate([
            'store_name' => 'required',
            'owner' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $this->marketService->create($validatedData);
        return redirect('/markets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Market';

        $market = $this->marketService->getMarketById($id);

        if (!$market) {
            return redirect()->route('markets.index')->with('error', 'Market not found.');
        }

        return view('market.edit', compact('market', 'pageTitle'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarketRequest  $request
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'store_name' => 'required',
            'owner' => 'required',
            'photo' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $market = $this->marketService->update($validatedData, $id);

        return redirect('/markets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->marketService->delete($id);
        return redirect('/markets');
    }
}
