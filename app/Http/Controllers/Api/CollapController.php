<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collap;

class CollapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Collap::all();
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
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'detail' => 'required'
        ]);

        $data = new Collap();
        if(!empty($request['pic'])){
            $data->pic = $request['pic'];
        }
        $data->name = $request['name'];
        $data->surname = $request['surname'];
        $data->detail = $request['detail'];

        $data->save();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        Collap::find($id)->delete();

        return response()->json('delete complete');
    }
}
