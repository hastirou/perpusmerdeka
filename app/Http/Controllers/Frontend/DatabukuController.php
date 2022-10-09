<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DatabukuController extends Controller 
{
    public function detail($id)
    {      
        
        $databuku = DB::table('databukus')
                ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databukus.KodeKategori')
                ->where('databukus.KodeBuku', $id)
                ->get();

        return view('frontend.databuku.detail', ['databuku'=>$databuku]);
        
    }

    public function pinjambuku($id)
    {      
        $databuku = DB::table('databukus')
                ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databukus.KodeKategori')
                ->where('databukus.KodeBuku', $id)
                ->get();
        $last_id = DB::select('SELECT * FROM datapinjamans ORDER BY KodePinjaman DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "PIN-001";
        } else {
            $string = $last_id[0]->KodePinjaman;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "PIN-" . $new;
        }

        return view('frontend.databuku.pinjambuku', ['newID' => $newID, 'databuku' => $databuku]);
        
    }

    public function store(Request $request)
    {   
        $last_id = DB::select('SELECT * FROM datapinjamans ORDER BY KodePinjaman DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "PIN-001";
        } else {
            $string = $last_id[0]->KodePinjaman;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "PIN-" . $new;
        }

        DB::table('datapinjamans')->insert([
            'KodePinjaman' => $request->KodePinjaman,
            'KodeBuku' => $request->KodeBuku,
            'NamaLengkap' => $request->NamaLengkap,
            'NomerTelepon' => $request->NomerTelepon,
            'AlamatLengkap' => $request->AlamatLengkap,
            'WaktuPinjam' => $request->TanggalPinjam.' '.$request->JamPinjam,
            'WaktuKembalikan' => $request->TanggalKembalikan.' '.$request->JamKembalikan,
            'Status' => 'OPN',
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah lelang ' . $request->KodeLelang,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Pinjaman ' . $request->KodePinjaman . ' dalam proses persetujuan';
        return redirect('/datapinjamanuser')->with(['created' => $pesan]); 
    }

    public function datapinjamanuser()
    {
        $datapinjaman = DB::table('users')
                    ->join('datapinjamans', 'datapinjamans.KodeUser', '=', 'users.id')
                    ->where('id', Auth::id())
                    ->get();
        return view('frontend.datapinjaman', compact('datapinjaman'));
    }

    public function detailpinjaman($id)
    {      
        $users = Auth::id();
        
        $datapinjaman = DB::table('datapinjamans')
                ->where('datapinjamans.KodePinjaman', $id)
                ->get();

        return view('frontend.detailpinjaman', ['datapinjaman'=>$datapinjaman]);
        
    }


}