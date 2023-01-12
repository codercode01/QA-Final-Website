<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutional;
use App\Models\Instistatus;

class InstitutionalController extends Controller
{
    //
    public function Add_Content()
    {
        $institutionals = Institutional::first();
        if(!$institutionals)
        $institutionals=[];
        return view('Institutional.InstitutionalContent', compact('institutionals'));
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
 
           $image_name= "/uploads/international_function/" . time().$k.'.png';
            
           $path = public_path() . $image_name;
 
           file_put_contents($path, $data);
 
           $img->removeAttribute('src');
 
           $img->setAttribute('src', $image_name);

    }
        $function = $dom->saveHTML();
        $summernote = Institutional::first();
        if(!$summernote){
         $summernote = new Institutional;
         }
         else{
             
         }
  
        $summernote->function = $function;
        $summernote->description = $description;
        $summernote->save();
        return redirect('/Quality-Assurance/Admin/Institutional-Accreditation');  
    }
    public function Institutional_accreditation()
    {
        $institutionals = Institutional::first();
        $institutionals_status = Instistatus::first();
        return view('Institutional.InstitutionalAccreditation', compact('institutionals','institutionals_status'));
    }
    public function Add_Status()
    {
        $institutionals_status = Instistatus::first();
        if(!$institutionals_status)
        $institutionals_status=[];
        return view('Institutional.InstitutionalStatus', compact('institutionals_status'));
    }
    public function Save_Status(Request $request)
    {

        $this->validate($request, [

            'status' => 'required'

       ]);

       $status = $request->status;
 
       $dom = new \DomDocument();
 
       @$dom->loadHtml($status, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
 
       $images = $dom->getElementsByTagName('img');
 
       foreach($images as $k => $img){
 

           $data = $img->getAttribute('src');
        
           if (strpos($data, 'data:image')!==false){
                continue;
           }
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
 
           $data = base64_decode($data);
 
           $image_name= "/uploads/international_function/" . time().$k.'.png';
            
           $path = public_path() . $image_name;
 
           file_put_contents($path, $data);
 
           $img->removeAttribute('src');
 
           $img->setAttribute('src', $image_name);

    }
        $status = $dom->saveHTML();
        $summernote = Instistatus::first();
        if(!$summernote){
         $summernote = new Instistatus;
         }
         else{
             
         }
  
        $summernote->status = $status;
  
        $summernote->save(); 
        return redirect('/Quality-Assurance/Admin/Institutional-Accreditation');  
    }
    public function Institutional_accreditations()
    {
        $institutionals = Institutional::first();
        $institutionals_status = Instistatus::first();
        return view('Institutional.adminInstitutionalAccreditation', compact('institutionals','institutionals_status'));
    }

}
