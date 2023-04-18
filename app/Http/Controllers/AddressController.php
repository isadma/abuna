<?php

namespace App\Http\Controllers;

use App\Address;
use App\Branch;
use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        try{
            $addresses = [];
            if ($request->branch || $request->street){
                $addresses = Address::all();
                if ($request->branch)
                    $addresses = $addresses->where('branch_id', $request->branch);
                if ($request->street){
                    $search = $request->street;
                    $addresses = $addresses->filter(function ($item) use ($search) {
                        return false !== stristr($item->street, $search);
                    });
                }
            }
            $branches = Branch::all();
            return view('admin.address.address', compact('addresses', 'branches'));
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
    public function store(AddressRequest $request)
    {
        try{
            Address::create([
                'branch_id' => $request->branch,
                'street' => $request->street,
                'home' => $request->home,
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
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(AddressRequest $request, Address $address)
    {
        try{
            $address->update([
                'branch_id' => $request->branch,
                'street' => $request->street,
                'home' => $request->home,
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
     * @param  \App\Address  $address
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        try {
            $address->delete();
            return redirect()->back()->with('success', 'Üstünlikli pozuldy.');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
