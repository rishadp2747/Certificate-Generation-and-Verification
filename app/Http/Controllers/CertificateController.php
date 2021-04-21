<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Intervention\Image\Facades\Image as Image;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = DB::table('event')->get();

        return view('pages.certificate',['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $request->validate([
            'event' => 'required|min:1|not_in:0'
        ]);


        $partcipants =  DB::table('contacts')->select('name', 'email','id') ->where('eventId', $request->event)->get();
        $event = DB::table('event')->select('name', 'code') ->where('id', $request->event)->get();

        if(!is_dir($event[0]->code)){

            mkdir($event[0]->code, 0755, true);
        }
        

        foreach ($partcipants as $user) {
            $img = Image::make('images/certificate.jpg');

            $verify = $event[0]->code.'-'.$user->id*1000;
            $img->text($user->email, 576, 371, function($font) {  
                $font->file('font/f.ttf');  
                $font->size(28);  
                $font->color('#4285F4');  
                $font->align('center');  
                $font->valign('bottom');  
                $font->angle(0);  
            });  

            $img->text('Verification Code:'.$verify, 125, 41, function($font) {  
                $font->file('font/f.ttf');  
                $font->size(15);  
                $font->color('#4285F4');  
                $font->align('left');  
                $font->valign('bottom');  
                $font->angle(0);  
            });

            
            $img->save(''.$event[0]->code.'/'.$user->email.'.jpg'); 

            $affected = DB::table('contacts')->where('id', $user->id)->update(['verify' => $verify]);
        }

        return back()->with('success','Successfully generated certificates   ');

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
