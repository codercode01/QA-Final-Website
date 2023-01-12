<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    //
    public function Add_Content()
    {
        $about = About::first();
        if(!$about)
        $about=[];
        return view('About.AboutContent', compact('about'));
    }

    public function Save_Content(Request $request)
    {
        $about = About::first();
        if(!$about){
        $about = new About;
        }
        else{
            
        }

        $about->description = $request->input('description');
        
        if($request->hasfile('Org_image'))
        {
            $destination = 'uploads/Org/'.$about->Org_image;
            if(file::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('Org_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/Org/', $filename);
            $about->Org_image = $filename;
        }

        $about->save();
        return redirect()->back()->with('message','Org Picture Upload Successfully');
    }
    public function Quality_About()
    {
        $abouts = About::first();
        return view('About.about', compact('abouts'));
    }
   
    
}
