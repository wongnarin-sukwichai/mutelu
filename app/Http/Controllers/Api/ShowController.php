<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Collap;
use App\Models\Post;
use App\Models\Map;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showCollap()
    {
        $data = Collap::all();

        return response()->json($data);
    }

    public function showPost()
    {
        $data = Post::orderBy('id', 'DESC')->limit(6)->get();

        return response()->json($data);
    }

    public function showMap()
    {
        $data = Map::inRandomOrder()->limit(3)->get();

        return response()->json($data);
    }

    public function postAll()
    {

        $data = Post::orderBy('id', 'DESC')->paginate(12);
        
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function postDetail(string $id)
    {
        $data = Post::find($id);

        return response()->json($data);
    }

    public function mapDetail(string $id)
    {
        $data = Map::find($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
