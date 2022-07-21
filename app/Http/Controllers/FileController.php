<?php

namespace App\Http\Controllers;

use App\file;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        $files = file::all();
        return view("files.index")->with("files",$files);
    }


    public function create()
    {
        return view("files.create");
    }


    public function store(Request $request)
    {
        $fileds = $request->validate([
            "title" => "required|min:3",
            "description" =>"required|min:5",
            "file" => "required|max:3072|mimes:png,jpg,pdf"
        ]);

        $file = new file;
        $file->title = $request->title;
        $file->description = $request->description;

        //file code
        $allFileData =$request->file("file");
        $file_name = $allFileData->getClientOriginalName();
        $allFileData->move(public_path() . "/file/", $file_name);

        $file->file = $file_name;
        $file->save();
        return redirect()->back()->with("done", "Uploaded File Done");

    }


    public function show($id)
    {
        $file = file::find($id);
        return view("files.show")->with("file",$file);
    }


    public function edit($id)
    {
        $file = file::find($id);
        return view("files.edit")->with("file",$file);
    }


    public function update(Request $request,$id)
    {
        $fileds = $request->validate([
            "title" => "required|min:3",
            "description" =>"required|min:5",
            "file" => "required|max:3072|mimes:png,jpg,pdf"
        ]);

        $file = file::find($id);
        $file->title = $request->title;
        $file->description = $request->description;

        //file code
        $allFileData =$request->file("file");
        $file_name = $allFileData->getClientOriginalName();
        $allFileData->move(public_path() . "/file/", $file_name);

        $file->file = $file_name;
        $file->save();
        return redirect("/allfiles")->with("done", "Update File Done");
    }


    public function destroy($id)
    {
        $file = file::find($id);
        $file->delete();
        return redirect("/allfiles")->with("done", "Delete File Done");

    }

    public function download($id)
    {
        $file = File::where("id", "=", $id)->firstOrFail();
        $filePath = public_path() . "/file/" . $file->file;
        return response()->download($filePath);
    }
}
