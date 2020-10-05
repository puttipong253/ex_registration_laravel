<?php

namespace App\Exports;

use App\Models\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ListUsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('users')
                ->select('Prefix','F_Name','L_Name','Rank','Province')
                ->orderBy('Province','ASC')
                ->get();
    }
    public function headings(): array {
        return [
            'คำนำหน้า',
            'ชื่อจริง',
            'นามสกุล',
            'ตำแหน่ง',
            'จังหวัด',
        ];
    }
}
