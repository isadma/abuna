<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityRequest;
use App\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        try{
            $states = State::all();
            $cities = City::all();
            return view('admin.address.city', compact('states', 'cities'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        try{
            City::create([
                'state_id' => $request->state,
                'name' => $request->name,
                'slug' => City::makeSlug($request->name)
            ]);
            return redirect()->back()->with('success', 'Üstünlikli goşuldy.');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        try{
            $city->update([
                'state_id' => $request->state,
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Üstünlikli üýtgedildi.');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        try {
            $city->delete();
            return redirect()->back()->with('success', 'Üstünlikli pozuldy.');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
