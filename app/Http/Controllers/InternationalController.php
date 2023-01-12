<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\International;
use App\Models\Interstatus;
use App\Models\Intercert;
use Illuminate\Support\Facades\File;

class InternationalController extends Controller
{
    public function Add_Content()
    {
        $internationals = International::first();
        if(!$internationals)
        $internationals=[];
        return view('International.InternationalContent', compact('internationals'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Save_Content(Request $request)
    {
        $this->validate($request, [

            'function' => 'required',
            'description' => 'required'

       ]);

       $function = $request->function;
       $description = $request->description;
 
       $dom = new \DomDocument();
 
       @$dom->loadHtml($function, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
 
       $images = $dom->getElementsByTagName('img');
 
       foreach($images as $k => $img){
 

           $data = $img->getAttribute('src');
        
           if (strpos($data, 'data:image')!==false){
                continue;
           }
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
 
           $data = base64_decode($data);
 
           $image_name= "/uploads/institution_function/" . time().$k.'.png';
            
           $path = public_path() . $image_name;
 
           file_put_contents($path, $data);
 
           $img->removeAttribute('src');
 
           $img->setAttribute('src', $image_name);

    }
        $function = $dom->saveHTML();
        $summernote = International::first();
        if(!$summernote){
         $summernote = new International;
         }
         else{
             
         }
  
        $summernote->function = $function;
        $summernote->description = $description;
        $summernote->save();
        return redirect('/Quality-Assurance/Admin/International-Accreditation');  
    }
    public function International_accreditation()
    {
        $internationals = International::first();
        $internStatus = Interstatus::all();
        $status_description = Intercert::first();
        return view('International.INAccreditation', compact('internationals','internStatus','status_description'));
    }
    public function International_accreditations()
    {
        $internationals = International::first();
        $internStatus = Interstatus::all();
        $status_description = Intercert::first();
        return view('International.adminINAccreditation', compact('internationals','internStatus','status_description'));
    }
    public function Add_Status(Request $request)
    {
        return view('International.addStatus');
    }

    public function store(Request $request)
    {
        $internStatus = new Interstatus;
        $internStatus->description = $request->input('description');
        

        if($request->hasfile('international_image_status'))
        {
            $file = $request->file('international_image_status');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/internationa_certificate/', $filename);
            $internStatus->international_image_status = $filename;
        }

        $internStatus->save();
        return redirect("/Quality-Assurance/Admin/International-Accreditation");
    
    }
    public function delete_status(Request $request)
    {
        $response = Interstatus::find($request->id)->delete();
        return $response;
    }
    public function Edit_Status($id)
    {
        $internStatus = Interstatus::find($id);
        return view('International.editStatus', compact('internStatus'));
    }

    public function Save_Edit_Status(Request $request, $id)
    {
        $internStatus = Interstatus::find($id);
        $internStatus->description = $request->input('description');
        

        if($request->hasfile('international_image_status'))
        {
            $destination = 'uploads/internationa_certificate/'.$internStatus->international_image_status;
            if(file::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('international_image_status');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/internationa_certificate/', $filename);
            $internStatus->international_image_status = $filename;
        }

        $internStatus->update();
        return redirect("/Quality-Assurance/Admin/International-Accreditation");
    }

    public function Add_Description()
    {
        $status_description = Intercert::first();
        if(!$status_description)
        $status_description=[];
        return view('International.Internationalstatus', compact('status_description'));
    }

    public function Save_Description(Request $request)
    {
        $status_description = Intercert::first();
        if(!$status_description){
        $status_description= new Intercert;
        }
        else{
            
        }
        $status_description->description = $request->input('description');
        $status_description->save();
        return redirect('/Quality-Assurance/Admin/International-Accreditation');  
    }

}
