<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RoomExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('rooms')
                ->leftjoin('users as u1','u1.User_ID','=','rooms.User_1_ID')
                ->leftjoin('users as u2','u2.User_ID','=','rooms.User_2_ID')
                ->select('rooms.Room_ID','u1.Prefix as PF1','u1.F_Name as F1','u1.L_Name as L1','u1.Province as PV1','u1.Phone as P1','u2.Prefix as PF2','u2.F_Name as F2','u2.L_Name as L2','u2.Province as PV2','u2.Phone as P2')
                ->orderBy('rooms.Room_ID','ASC')
                ->get();
    }
    public function headings(): array {
        return [
            'id',
            'คำนำหน้า',
            'ชื่อจริง',
            'นามสกุุล',
            'จังหวัด',
            'โทรศัพท์',
            'คำนำหน้า',
            'ชื่อจริง',
            'นามสกุุล',
            'จังหวัด',
            'โทรศัพท์',
        ];
    }
}
