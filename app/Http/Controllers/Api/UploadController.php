<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function uploadPicCollap(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('file');                                                 //ดึงไฟล์รูปภาพ 
        $thumbnail = Image::make($image)->resize(319, 319);                             //Resize รูปภาพ
        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();            //ตั้งชื่อใหม่ให้รูปภาพ / ข้างหลังคือการดึงชื่อนามสกุลไฟล์เดิมมาต่อท้าย

        $serv_path = "storage/collaps/";                                                 //สร้าง Path สำหรับ save file 
        $serv_thumb = "storage/collaps/thumbnails/";

        $chkPath = public_path($serv_path);                                             //public_path ตือ folder public
        $chkThumb = public_path($serv_thumb);

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);         //Check ว่ามี folder ไหม ถ้าไม่มีให้สร้าง folder ขึ้นมาใหม่
        if (!File::exists($chkThumb)) File::makeDirectory($chkThumb, 0777, true);

        $image->move($chkPath, $image_name);                                           //ถ้าไม่ได้ resize ให้ใช้คำสั่ง move และ , พร้อมตั้งชื่อไฟล์
        $thumbnail->save($chkThumb . $image_name);                                     //ถ้า resize ให้ใช้ save และ

        return response()->json($image_name);
    }

    public function uploadPicPost(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('file');                                                 //ดึงไฟล์รูปภาพ 
        $thumbnail = Image::make($image)->resize(319, 319);                             //Resize รูปภาพ
        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();            //ตั้งชื่อใหม่ให้รูปภาพ / ข้างหลังคือการดึงชื่อนามสกุลไฟล์เดิมมาต่อท้าย

        $serv_path = "storage/posts/";                                                 //สร้าง Path สำหรับ save file 
        $serv_thumb = "storage/posts/thumbnails/";

        $chkPath = public_path($serv_path);                                             //public_path ตือ folder public
        $chkThumb = public_path($serv_thumb);

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);         //Check ว่ามี folder ไหม ถ้าไม่มีให้สร้าง folder ขึ้นมาใหม่
        if (!File::exists($chkThumb)) File::makeDirectory($chkThumb, 0777, true);

        $image->move($chkPath, $image_name);                                           //ถ้าไม่ได้ resize ให้ใช้คำสั่ง move และ , พร้อมตั้งชื่อไฟล์
        $thumbnail->save($chkThumb . $image_name);                                     //ถ้า resize ให้ใช้ save และ

        return response()->json($image_name);
    }

    public function uploadPicMap(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('file');                                                 //ดึงไฟล์รูปภาพ 
        $thumbnail = Image::make($image)->resize(319, 319);                             //Resize รูปภาพ
        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();            //ตั้งชื่อใหม่ให้รูปภาพ / ข้างหลังคือการดึงชื่อนามสกุลไฟล์เดิมมาต่อท้าย

        $serv_path = "storage/maps/";                                                 //สร้าง Path สำหรับ save file 
        $serv_thumb = "storage/maps/thumbnails/";

        $chkPath = public_path($serv_path);                                             //public_path ตือ folder public
        $chkThumb = public_path($serv_thumb);

        if (!File::exists($chkPath)) File::makeDirectory($chkPath, 0777, true);         //Check ว่ามี folder ไหม ถ้าไม่มีให้สร้าง folder ขึ้นมาใหม่
        if (!File::exists($chkThumb)) File::makeDirectory($chkThumb, 0777, true);

        $image->move($chkPath, $image_name);                                           //ถ้าไม่ได้ resize ให้ใช้คำสั่ง move และ , พร้อมตั้งชื่อไฟล์
        $thumbnail->save($chkThumb . $image_name);                                     //ถ้า resize ให้ใช้ save และ

        return response()->json($image_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
