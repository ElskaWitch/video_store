<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('updated_at', 'desc')->paginate(8);
        return view('pages.home', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        // dd($request->all()); 

        $request->validate([
            'title' => 'required|min:5|max:180|string|unique:videos,title',
            'description' => 'required|min:20|max:350|string',
            'url_img' => 'required|image|mimes:png,jpg,jpeg,jfif|max:2000',
            'nationality' => 'required|min:5|max:180|string',
            'actor' => 'required|min:5|max:180|string',
            'year_created' => 'required|min:2|max:6|string'
        ]);

        $validateImg = $request->file('url_img')->store('videos');

        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url_img' => $validateImg,
            'nationality' => $request->nationality,
            'actor' => $request->actor,
            'year_created' => $request->year_created,
            'created_at' => now()
        ]);
        return redirect()
            ->route('home')
            ->with('status', 'Le post a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('pages.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('pages.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        if ($request->hasFile('url_img')) {
            Storage::delete($video->url_img);
            $video->url_img = $request->file('url_img')->store('videos');
        }

        $request->validate([
            'title' => 'required|min:5|max:180|string',
            'description' => 'required|min:20|max:350|string',
            'url_img' => 'required|image|sometimes|mimes:png,jpg,jpeg,jfif|max:2000',
            'nationality' => 'required|min:5|max:180|string',
            'actor' => 'required|min:5|max:180|string',
            'year_created' => 'required|min:2|max:6|string'
        ]);

        $video->update([
            'title' => $request->title,
            'description' => $request->description,
            'url_img' => $video->url_img,
            'nationality' => $request->nationality,
            'actor' => $request->actor,
            'year_created' => $request->year_created,
            'updated_at' => now()
        ]);

        return redirect()
            ->route('videos.show', $video->id)
            ->with('status', 'Le post a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()
            ->route('home')
            ->with('status', "L'article a bien été supprimé");
    }
}
