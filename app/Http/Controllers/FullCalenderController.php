<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class FullCalenderController extends Controller
{
    public function calendar(Request $request)
    {
        $events= array();
    	$calendar_event = Event::all();
        foreach($calendar_event as $event){
            $events[] = [
                'id' => $event->id,
                'title' =>  $event->title,
                'description'   =>  $event->description,
                'start' =>  $event->start,
                'end'   =>  $event->end,
                
            ];
        }
        
    	return view('Calendar.full-calender',['events'=> $events]);
    }
    public function calendars(Request $request)
    {
        $events= array();
    	$calendar_event = Event::all();
        foreach($calendar_event as $event){
            $events[] = [
                'id' => $event->id,
                'title' =>  $event->title,
                'description'   =>  $event->description,
                'start' =>  $event->start,
                'end'   =>  $event->end,
                
            ];
        }
        
    	return view('Calendar.admincalender',['events'=> $events]);
    }



    public function store(Request $request){
        $calendar_event = Event::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'start'=> $request->start,
            'end'=> $request->end,
        ]);
        return response()->json($calendar_event);
    }

    public function update(Request $request ,$id)
    {
        $calendar_event = Event::find($id);
        if(! $calendar_event) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $calendar_event->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);
        return response()->json('Event updated');
    }
    
    public function destroy($id)
    {
        $calendar_event = Event::find($id);
        if(! $calendar_event) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $calendar_event->delete();
        return $id;
    }
    
}
?>
