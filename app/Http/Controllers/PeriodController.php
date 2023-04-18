<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodRequest;
use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(PeriodRequest $request)
    {
        try {
            Period::create([
                "publication_id" => $request->publication,
                "year" => $request->year,
                "month" => $request->month,
                "price" => $request->price,
                "sale_from" => strtotime($request->sale_from),
                "sale_to" => strtotime($request->sale_to),
            ]);
            return redirect()->back()->with('success', "Üstünlikli goşuldy");
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(PeriodRequest $request, Period $period)
    {
        try {
            $period->update([
                "publication_id" => $request->publication,
                "year" => $request->year,
                "month" => $request->month,
                "price" => $request->price,
                "sale_from" => strtotime($request->sale_from),
                "sale_to" => strtotime($request->sale_to),
            ]);
            return redirect()->back()->with('success', "Üstünlikli goşuldy");
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        try {
            $period->update(['status' => false]);
            return redirect()->back()->with('success', "Üstünlikli pozuldy");
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
