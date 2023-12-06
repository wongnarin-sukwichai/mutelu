<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Record;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'id' => 'required',
            'number' => 'required',
            'type' => 'required'
        ]);

        $data = new Record();

        $data->ref_id = $request['id'];
        $data->type = $request['type'];
        $data->number = $request['number'];
        $data->uid = Auth::user()->id;
        $data->created_by = Auth::user()->name . ' ' . Auth::user()->surname;
        $data->email = Auth::user()->email;

        $data->save();

        return response()->json($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data = Record::where('ref_id', $id)->get();

        $count_1 = Record::where('ref_id', $id)
        ->where('type', 2)
        ->select('number')
        ->selectRaw('count(number) as qty')
        ->groupBy('number')
        ->orderBy('qty', 'DESC')
        ->take(2)
        ->get();

        $count_2 = Record::where('ref_id', $id)
        ->where('type', 3)
        ->select('number')
        ->selectRaw('count(number) as qty')
        ->groupBy('number')
        ->orderBy('qty', 'DESC')
        ->get();

        return response()->json([
            'count_1' => $count_1,
            'count_2' => $count_2
        ]);
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
