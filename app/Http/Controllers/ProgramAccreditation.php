<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Programa;

class ProgramAccreditation extends Controller
{
    public function Add_Program(Request $request)
    {
        return view('Program.add');
    }
    
    public function View_Program(Request $request)
    {
        $programs = Program::all();
        return view('Program.programstatus', compact('programs'));
    }

    public function Save_Program(Request $request)
    {
        $new_programs = new Program;
        $new_programs->program_name = $request->program_name;
        $new_programs->level_accreditation = $request->level_accreditation;
        $new_programs->from_date = $request->from_date;
        $new_programs->to_date = $request->to_date;
        $new_programs->remarks = $request->remarks;
        $new_programs->campus = $request->campus;
        $new_programs->level = $request->level;
        $new_programs->Save();
        return redirect('/Quality-Assurance/Admin/Program-Accreditations');
    }

    public function delete_program(Request $request)
    {
        $response = Program::find($request->id)->delete();
        return $response;
    }

    public function Edit_Program($id)
    {
        $Edit_Program = Program::find($id);
        return view('Program.edit', compact('Edit_Program'));
    }
    public function Save_Edit_Program(Request $request)
    {
        $Edit_Program = Program::find($request->id);
        $Edit_Program->program_name = $request->program_name;
        $Edit_Program->level_accreditation = $request->level_accreditation;
        $Edit_Program->from_date = $request->from_date;
        $Edit_Program->to_date = $request->to_date;
        $Edit_Program->remarks = $request->remarks;
        $Edit_Program->campus = $request->campus;
        $Edit_Program->level = $request->level;
        $Edit_Program->Save();
        return redirect('/Quality-Assurance/Admin/Program-Accreditations');
    }

    public function Add_Content()
    {
        $program_function = Programa::first();
        if(!$program_function)
        $program_function=[];
        return view('Program.ProgramContent', compact('program_function'));
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
 
           $image_name= "/uploads/function/" . time().$k.'.png';
            
           $path = public_path() . $image_name;
 
           file_put_contents($path, $data);
 
           $img->removeAttribute('src');
 
           $img->setAttribute('src', $image_name);

    }
        $function = $dom->saveHTML();
        $summernote = Programa::first();
        if(!$summernote){
         $summernote = new Programa;
         }
         else{
             
         }
  
        $summernote->function = $function;
        $summernote->description = $description;
        $summernote->save();
        return redirect('/Quality-Assurance/Admin/Program-Accreditations');
    }
    public function Program_Accreditation()
    {
        $program_function = Programa::first();
        $programs = Program::all();
        return view('Program.programAccreditation', compact('program_function','programs'));
        
    }
    public function Program_Accreditations()
    {
        $program_function = Programa::first();
        $programs = Program::all();
        return view('Program.adminProgram', compact('program_function','programs'));
        
    }

    
}
