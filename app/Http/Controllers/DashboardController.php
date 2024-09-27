<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $pengunjung = DB::table('paket_destinasi')
        // ->select(DB::raw("count(id) as jumlah, month(updated_at) as bulan"))
        // ->groupBy(DB::raw("MONTH(updated_at)"))
        // ->get();

        $pengunjung = DB::table('pengunjung')
        ->select(DB::raw("
        SUM(CASE WHEN MONTH(created_at) = 1 THEN 1 ELSE 0 END) AS 'Jan',
        SUM(CASE WHEN MONTH(created_at) = 2 THEN 1 ELSE 0 END) AS 'Feb',
        SUM(CASE WHEN MONTH(created_at) = 3 THEN 1 ELSE 0 END) AS 'Mar',
        SUM(CASE WHEN MONTH(created_at) = 4 THEN 1 ELSE 0 END) AS 'Apr',
        SUM(CASE WHEN MONTH(created_at) = 5 THEN 1 ELSE 0 END) AS 'May',
        SUM(CASE WHEN MONTH(created_at) = 6 THEN 1 ELSE 0 END) AS 'June',
        SUM(CASE WHEN MONTH(created_at) = 7 THEN 1 ELSE 0 END) AS 'July',
        SUM(CASE WHEN MONTH(created_at) = 8 THEN 1 ELSE 0 END) AS 'Aug',
        SUM(CASE WHEN MONTH(created_at) = 9 THEN 1 ELSE 0 END) AS 'Sep',
        SUM(CASE WHEN MONTH(created_at) = 10 THEN 1 ELSE 0 END) AS 'Oct',
        SUM(CASE WHEN MONTH(created_at) = 11 THEN 1 ELSE 0 END) AS 'Nov',
        SUM(CASE WHEN MONTH(created_at) = 12 THEN 1 ELSE 0 END) AS 'Dec'"))
        ->get();
        foreach ($pengunjung as $objects) {
            $jumlah[] = intval($objects->Jan);
            $jumlah[] = intval($objects->Feb);
            $jumlah[] = intval($objects->Mar);
            $jumlah[] = intval($objects->Apr);
            $jumlah[] = intval($objects->May);
            $jumlah[] = intval($objects->June);
            $jumlah[] = intval($objects->July);
            $jumlah[] = intval($objects->Aug);
            $jumlah[] = intval($objects->Sep);
            $jumlah[] = intval($objects->Oct);
            $jumlah[] = intval($objects->Nov);
            $jumlah[] = intval($objects->Dec);
        }

        // $jumlah = array($pengunjung->jan,$pengunjung->feb);

        // foreach ($pengunjung->toArray() as $row) {
        //     $data[] = array(
        //         'jan'=>$row->jan,
        //         'feb'=>$row->feb,
        //         'mar'=>$row->mar,
        //         'apr'=>$row->apr,
        //         'may'=>$row->may,
        //         'jun'=>$row->jun,
        //         'jul'=>$row->jul,
        //         'aug'=>$row->aug,
        //     );
        // }
        // $data = json_decode(json_encode($pengunjung),true);
        // $test = $data[0];
        // $new = array_merge($test->jan,$test->feb);

        // dd(json_encode($pengunjung));
        // dd($pengunjung[0]);
        // return $jumlah;
        return view('dashboard.index',['jumlah'=>$jumlah]);
    }

}
