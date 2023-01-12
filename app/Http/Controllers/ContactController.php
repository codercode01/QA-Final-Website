<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function Add_Contact()
    {
        $contacts = Contact::first();
        if(!$contacts)
        $contacts=[];
        return view('Contact.contactContent', compact('contacts'));
    }

    public function Save_Contact(Request $request)
    {
        $contacts = Contact::first();
        if(!$contacts){
        $contacts= new Contact;
        }
        else{
            
        }
        $contacts->contacts = $request->input('contacts');
        $contacts->save(); 
        return redirect('/Quality-Assurance/Contact/Add-Contact');  
    }
   
    public function View_Contact()
    {
        $contacts = Contact::first();
        return view('Contact.contacts', compact('contacts'));
    }
}
