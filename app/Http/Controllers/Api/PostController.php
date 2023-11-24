<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level == null) {
            $data = Post::where('uid', Auth::user()->id)->orderBy('id', 'DESC')->get();
        } else {
            $data = Post::orderBy('id', 'DESC')->get();
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
            'title' => 'required',
            'detail' => 'required'
        ]);

        $data = new Post();
        $data->pic = $request['pic'];
        $data->title = $request['title'];
        $data->detail = $request['detail'];
        $data->like = null;
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
        $data = Post::find($id);

        if (Auth::user()->level == null && $data->uid != Auth::user()->id) 
        {
            return response()->json([
                'message' => 'ไม่มีสิทธิ์ลบข้อมูล กรุณาติดต่อเจ้าหน้าที่'
            ]);
        } else {
            Post::find($id)->delete();
            return response()->json('delete complete');
        }
    }
}
