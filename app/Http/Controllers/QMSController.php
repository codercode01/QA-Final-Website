<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QMS;
use App\Models\Quality;
use App\Models\Qualitycert;
use Illuminate\Support\Facades\File;

class QMSController extends Controller
{
    //
    public function Add_Content()
    {
        $qms = QMS::first();
        if(!$qms)
        $qms=[];
        return view('QMS.qualityContent', compact('qms'));
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
 
           $image_name= "/uploads/qms_function/" . time().$k.'.png';
            
           $path = public_path() . $image_name;
 
           file_put_contents($path, $data);
 
           $img->removeAttribute('src');
 
           $img->setAttribute('src', $image_name);

    }
        $function = $dom->saveHTML();
        $summernote = QMS::first();
        if(!$summernote){
         $summernote = new QMS;
         }
         else{
             
         }
  
        $summernote->function = $function;
        $summernote->description = $description;
        $summernote->save();
        return redirect('/Quality-Assurance/Admin/Quality-Management-System');  
    }
    public function Quality_Management_System()
    {
        $qms= QMS::first();
        $status_description = Qualitycert::first();
        $qms_status = Quality::all();
        return view('QMS.qualitySystem', compact('qms','qms_status','status_description'));
    }
    
    public function Quality_Management_Systems()
    {
        $qms= QMS::first();
        $status_description = Qualitycert::first();
        $qms_status = Quality::all();
        return view('QMS.adminqualitySystem', compact('qms','qms_status','status_description'));
    }

    public function Add_Status(Request $request)
    {
        return view('QMS.addStatus');
    }

    public function store(Request $request)
    {
        $qms_status = new Quality;
        $qms_status->description = $request->input('description');
        

        if($request->hasfile('qms_image_status'))
        {
            $file = $request->file('qms_image_status');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/qms_certificate/', $filename);
            $qms_status->qms_image_status = $filename;
        }

        $qms_status->save();
        return redirect('/Quality-Assurance/Admin/Quality-Management-System');  
    }

    public function delete_status(Request $request)
    {
        $response = Quality::find($request->id)->delete();
        return $response;
    }
    public function Edit_Status($id)
    {
        $qms_status = Quality::find($id);
        return view('QMS.editStatus', compact('qms_status'));
    }
    public function Save_Edit_Status(Request $request, $id)
    {
        $qms_status = Quality::find($id);
        $qms_status->description = $request->input('description');
        

        if($request->hasfile('qms_image_status'))
        {
            $destination = 'uploads/qms_certificate/'.$qms_status->qms_image_status;
            if(file::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('qms_image_status');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/qms_certificate/', $filename);
            $qms_status->qms_image_status = $filename;
        }

        $qms_status->update();
        return redirect("/Quality-Assurance/Admin/Quality-Management-System");
    }

    public function Add_Description()
    {
        $status_description = Qualitycert::first();
        if(!$status_description)
        $status_description=[];
        return view('QMS.descriptionQMS', compact('status_description'));
    }

    public function Save_Description(Request $request)
    {
        $status_description = Qualitycert::first();
        if(!$status_description){
        $status_description= new Qualitycert;
        }
        else{
            
        }
        $status_description->description = $request->input('description');
        $status_description->save();
        return redirect('/Quality-Assurance/Admin/Quality-Management-System');  
    }
}
