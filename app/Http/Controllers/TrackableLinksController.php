<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TrackableLink;
use App\Http\Requests;

class TrackableLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TrackableLink::with('clicks')->with('signUps')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(TrackableLink $trackable_link)
    {
        $pastSevenDays = [];
        $today = \Carbon\Carbon::now();
        $index = 7;
        while($index > 0){
            $index--;
            $pastSevenDays[] = $today->subDays($index);
            $today = \Carbon\Carbon::now();
        }
        $clicks = $trackable_link->clicks;
            dd($trackable_link);
        $daysWithClicks = array_map(function($item) use ($clicks){

            $iClicks = $clicks->map(function($click){
                if($click->created_at > $item->format('Y-m-d 00:00:00') && $click->created_at < $item->format('Y-m-d 23:59:59')){
                    return $click;
                }
            });

            // return ;
        }, $pastSevenDays);

        return $daysWithClicks;

        // return $trackable_link->load('clicks')->load('signUps');
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
