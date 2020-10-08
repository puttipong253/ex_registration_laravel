<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\User;
use DB;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::get();
        return $hotel;
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
        $request->validate([
            'Check_In' => 'required',
            'Check_Out' => 'required'
        ]);
        $hotel = Hotel::create($request->all());
        return $hotel;
    }
    public function partnerProvince(Request $request){
        return User::select('User_ID','F_Name','L_Name','Province','Status')
                ->where('Province',$request->Partner_Province)
                ->where('Status',1)
                ->get();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Hotel::find($id);
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
        $hotel = Hotel::find($id);
        $hotel->update($request->all());
        return $hotel;
    }

    public function RoomUpdate1()
    {
        return DB::table('hotels')
                    ->join('rooms as r1','r1.User_1_ID','=','hotels.User_ID')
                    ->select('hotels.User_ID','r1.User_1_ID')
                    ->update(['hotels.Room_ID' => DB::raw('r1.Room_ID')]);
    }
    public function RoomUpdate2()
    {
        return DB::table('hotels')
                    ->join('rooms as r2','r2.User_2_ID','=','hotels.User_ID')
                    ->select('hotels.User_ID','r2.User_2_ID')
                    ->update(['hotels.Room_ID' => DB::raw('r2.Room_ID')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->destroy($id);
        return 'delete successfuly';
    }
}
