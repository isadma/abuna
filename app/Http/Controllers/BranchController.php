<?php

namespace App\Http\Controllers;

use App\Branch;
use App\City;
use App\Http\Requests\BranchRequest;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        try{
            $cities = City::all();
            $branches = Branch::all();
            return view('admin.address.branch', compact('branches', 'cities'));
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
    public function store(BranchRequest $request)
    {
        try{
            Branch::create([
                'city_id' => $request->city,
                'name' => $request->name,
                'index' => $request->index,
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
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        try{
            $branch->update([
                'city_id' => $request->city,
                'name' => $request->name,
                'index' => $request->index,
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
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        try {
            $branch->delete();
            return redirect()->back()->with('success', 'Üstünlikli pozuldy.');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
