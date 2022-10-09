<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function index()
    {
        $databuku = DB::table('databukus')
                ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databukus.KodeKategori')
                ->where('databukus.Status', 'OPN')
                ->get();

        return view('frontend.index', ['databuku'=>$databuku]);
    }
}
