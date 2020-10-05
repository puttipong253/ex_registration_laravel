<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\ListUsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::orderBy('User_ID', 'ASC')->get();
    }
    public function checkPhone(Request $request)
    {
        return DB::table('users')
                    ->where('Phone',$request->Phone)
	                ->count();
    }
    public function countAllUser(Request $request)
    {
        return DB::table('users')->count();
    }
    public function countUserMatch(Request $request)
    {
        return DB::table('users')
                    ->where('Status','=',0)
                    ->count();
    }
    public function countUserNotMatch(Request $request)
    {
        return DB::table('users')
                    ->where('Status','=',1)
                    ->count();
    }
    public function tracking(Request $request)
    {
        return DB::table('users')
                    ->join('hotels','hotels.User_ID','=','users.User_ID')
                    ->join('training','training.User_ID','=','users.User_ID')
                    ->leftjoin('rooms','rooms.Room_ID','=','hotels.Room_ID')
                    ->select('Prefix','F_Name','L_Name','Gender','Rank','Email','Phone','Province','Food_Group','Food_Allergy','ALOHA','I_Factory','I_SingleForm','E_Payment','Check_In','Check_Out','Partner_ID','Room_Number')
                    ->where('Phone',$request->Phone)
                    ->get();
    }
    public function matching()
    {
        return DB::table('users')
                    ->where('Status','=',1)
                    ->select('User_ID','Prefix','F_Name','L_Name','Gender','Rank','Email','Phone','Province','Food_Group','Food_Allergy','Status')
                    ->orderBy('User_ID', 'ASC')
                    ->get();
    }
    public function usersTraining()
    {
        return DB::table('users')
                    ->select('training.T_ID','users.User_ID','users.Prefix','users.F_Name','users.L_Name','users.Province','training.ALOHA','training.I_Factory','training.E_Payment','training.I_SingleForm')
                    ->join('training','training.User_ID','=','users.User_ID')
                    ->orderBy('training.T_ID', 'ASC')
                    ->get();
    }

    public function usersHotel()
    {
        return DB::table('users')
                    ->leftjoin('hotels as h','users.User_ID','=','h.User_ID')
                    ->select('h.Hotel_ID','users.Prefix','users.User_ID','users.F_Name as F_1','users.L_Name as L_1','users.Province','h.Check_In','h.Check_Out','h.Room_ID','Note')
                    ->orderBy('h.Hotel_ID', 'ASC')
                    ->get();
    }
    public function usersRoom()
    {
        return DB::table('rooms')
                    ->join('users as u1','u1.User_ID','=','rooms.User_1_ID')
                    ->join('users as u2','u2.User_ID','=','rooms.User_2_ID')
                    ->select('rooms.Room_ID','u1.User_ID as UID1','u1.Prefix as PF_1','u1.F_Name as F_1','u1.L_Name as L_1','u1.Province as PV_1','u2.User_ID as UID2','u2.Prefix as PF_2','u2.F_Name as F_2','u2.L_Name as L_2','u2.Province as PV_2','rooms.Room_Number')
                    ->orderBy('Room_ID', 'ASC')
                    ->get();
    }
    public function provinceUserRoom1(Request $request){
        return User::where('Province',$request->Province_1)->get();
    }
    public function provinceUserRoom2(Request $request){
        return User::where('Province',$request->Province_2)->get();
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
            'Prefix' => 'required',
            'F_Name' => 'required',
            'L_Name' => 'required',
            'Gender' => 'required',
            'Rank' => 'required',
            'Email' => 'required',
            'Phone' => 'required',
            'Province' => 'required',
            'Food_Group' => 'required',
            'Status' => 'required',
        ]);
        $user = User::create($request->all());
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    public function exportUser()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
        "Export succesfuly";
    }
    public function exportListUser()
    {
        return Excel::download(new ListUsersExport, 'listUsers.xlsx');
        "Export succesfuly";
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
        $user = User::find($id);
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->destroy($id);
        return 'delete successfuly';
    }
}
