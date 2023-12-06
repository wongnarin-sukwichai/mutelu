<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Map;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level == null) {
            $data = Map::where('uid', Auth::user()->id)->orderBy('id', 'DESC')->get();
        } else {
            $data = Map::all();
        }

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
            'pic' => 'required',
            'type' => 'required',
            'title' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'gmap' => 'required'
        ]);

        $data = new Map();
        $data->pic = $request['pic'];
        $data->type = $request['type'];
        $data->icon = $request['icon'];
        $data->call = $request['call'];
        $data->title = $request['title'];
        $data->lat = $request['lat'];
        $data->lon = $request['lon'];
        $data->detail = $request['detail'];
        $data->gmap = $request['gmap'];
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
        $data = Map::find($id);

        $data->pic = $request['pic'];
        $data->type = $request['type'];
        $data->icon = $request['icon'];
        $data->call = $request['call'];
        $data->title = $request['title'];
        $data->lat = $request['lat'];
        $data->lon = $request['lon'];
        $data->detail = $request['detail'];
        $data->gmap = $request['gmap'];

        $data->update();

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Map::find($id);

        if (Auth::user()->level == null && $data->uid != Auth::user()->id) 
        {
            return response()->json([
                'message' => 'ไม่มีสิทธิ์ลบข้อมูล กรุณาติดต่อเจ้าหน้าที่'
            ]);
        } else {
            Map::find($id)->delete();
            return response()->json('delete complete');
        }
    }
}
