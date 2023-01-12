<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    //php
    public function Add_gallery(Request $request)
    {
        return view('gallery.addGallery');
    }

    public function store(Request $request)
    {
        $gallery = new Gallery;
        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/gallery/', $filename);
            $gallery->image = $filename;
        }

        $gallery->save();
        return redirect('/Quality-Assurance/Admin/Gallery');
    }
    public function View_Gallery(Request $request)
    {
        $search = $request ['search'] ?? "";
        if ($search != ""){
            //where
            $galleries = Gallery::where('title','LIKE', "%$search%")->orWhere('description','LIKE', "%$search%")->paginate(2);
        }else {
            $galleries = Gallery::orderBy("created_at", "desc")->Paginate(4);
        }
        $gallery=  compact('galleries', 'search');
        return view('gallery.gallery')->with($gallery);
    }

    public function Admin_Gallery(Request $request)
    {
        $search = $request ['search'] ?? "";
        if ($search != ""){
            //where
            $galleries = Gallery::where('title','LIKE', "%$search%")->orWhere('description','LIKE', "%$search%")->paginate(2);
        }else {
            $galleries = Gallery::orderBy("created_at", "desc")->get();
        }
        $gallery=  compact('galleries', 'search');
        return view('gallery.adminGallery')->with($gallery);
    }

    public function delete_gallery(Request $request)
    {
        $response = Gallery::find($request->id)->delete();
        return $response;
    }

    public function Edit_Gallery($id)
    {
        $edit_gallery = Gallery::find($id);
        return view('gallery.editGallery', compact('edit_gallery'));
    }
    public function Save_Edit_Gallery(Request $request, $id)
    {
        $edit_gallery = Gallery::find($id);;
        $edit_gallery->title = $request->input('title');
        $edit_gallery->description = $request->input('description');
        

        if($request->hasfile('image'))
        {
            $destination = 'uploads/gallery/'.$edit_gallery->image;
            if(file::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/gallery/', $filename);
            $edit_gallery->image = $filename;
        }

        $edit_gallery->update();
        return redirect('/Quality-Assurance/Admin/Gallery');
    }
}
