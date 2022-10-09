<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DatapinjamanController extends Controller 
{
    
    public function index()
    {      
        $users = Auth::id();
        
        $datapinjaman = DB::table('datapinjamans')
                ->where('datapinjamans.Status', 'OPN')
                ->get();

        return view('backend.datapinjaman.index', ['datapinjaman'=>$datapinjaman]);
        
    }

    public function detail()
    {      
        $users = Auth::id();
        
        $datapinjaman = DB::table('datapinjamans')
                ->where('datapinjamans.Status', 'OPN')
                ->get();

        return view('backend.datapinjaman.detail', ['datapinjaman'=>$datapinjaman]);
        
    }

    public function tolak($id)
    {

        DB::table('datapinjamans')->where('KodePinjaman', $id)->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Menolak Peminjaman ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            $pesan = 'Peminjaman buku ' . $id . ' telah ditolak';
        return redirect('/admin/datapinjaman')->with(['deleted' => $pesan]);
    }

    public function prosesselesai($id)
    {

        DB::table('datapinjamans')->where('KodePinjaman', $id)->update([
            'Status' => 'CMF',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Selesai Peminjaman ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            $pesan = 'Peminjaman buku ' . $id . ' telah selesai';
        return redirect('/admin/datapinjaman/diterima')->with(['created' => $pesan]);
    }

    public function terima($id)
    {

        DB::table('datapinjamans')->where('KodePinjaman', $id)->update([
            'Status' => 'STA',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Menerima Peminjaman ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            $pesan = 'Peminjaman buku ' . $id . ' telah diterima';
        return redirect('/admin/datapinjaman')->with(['created' => $pesan]);
    }

    public function diterima()
    {      
        $users = Auth::id();
        
        $datapinjaman = DB::table('datapinjamans')
                ->where('datapinjamans.Status', 'STA')
                ->get();

        return view('backend.datapinjaman.diterima', ['datapinjaman'=>$datapinjaman]);
        
    }

    public function ditolak()
    {      
        $users = Auth::id();
        
        $datapinjaman = DB::table('datapinjamans')
                ->where('datapinjamans.Status', 'DEL')
                ->get();

        return view('backend.datapinjaman.ditolak', ['datapinjaman'=>$datapinjaman]);
        
    }

    public function selesai()
    {      
        $users = Auth::id();
        
        $datapinjaman = DB::table('datapinjamans')
                ->where('datapinjamans.Status', 'CMF')
                ->get();

        return view('backend.datapinjaman.selesai', ['datapinjaman'=>$datapinjaman]);
        
    }

}