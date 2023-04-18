<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Publication;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PublicationController extends Controller
{
    public function createImage($img, $name){
        $image = Image::make($img);
        $image->resize(null, 250, function ($constraint) {
            $constraint->aspectRatio();
        });
        $photo_name = Str::slug($name) . "-" . strtotime(now()) . '.' . $img->extension();
        $path = 'images/publication/' . $photo_name;
        $image->save($path, 60);
        return $path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */


    public function index()
    {
        try{
            $publications = Publication::orderByDesc('id')->where('status', 1)->get();
            return view('admin.publication.index', compact('publications'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        try{
            $types = Type::all();
            $owners = Publication::pluck('owner');
            return view('admin.publication.create', compact('types', 'owners'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(PublicationRequest $request)
    {
        try{
            $publication = Publication::create([
                'image' => $request->image ? $this->createImage($request->image, $request->name) : null,
                'index' => $request->index,
                'name' => $request->name,
                'owner' => $request->owner,
                'type_id' => $request->type,
            ]);
            return redirect()->route('publication.show', $publication->id);
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Publication $publication)
    {
        return view('admin.publication.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Publication $publication)
    {
        try{
            $types = Type::all();
            $owners = Publication::pluck('owner');
            return view('admin.publication.edit', compact('types', 'owners', 'publication'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
//        try{
            $publication->update([
                'image' => $request->image ? $this->createImage($request->image, $request->name) : $publication->image,
                'index' => $request->index,
                'name' => $request->name,
                'owner' => $request->owner,
                'type_id' => $request->type,
            ]);
            return redirect()->route('publication.show', $publication->id);
//        }
//        catch(\Exception $e){
//            return redirect()->back()->withErrors($e->getMessage());
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        try {
//            if(File::exists($publication->image)) {
//                File::delete($publication->image);
//            }
            $publication->update(['status' => false]);;
            return redirect()->back()->with("success", "Neşir üstünlikli pozuldy.");
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
