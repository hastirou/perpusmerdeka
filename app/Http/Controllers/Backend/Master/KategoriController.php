<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class KategoriController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {      
        $users = Auth::id();
        
        $masterkategori = DB::table('masterkategoris')
                ->where('Status', 'OPN')
                ->get();

        return view('backend.master.kategori.index', ['masterkategori'=>$masterkategori]);
        
    }

    public function create()
    {   
        $users = Auth::id();

        $last_id = DB::select('SELECT * FROM masterkategoris ORDER BY KodeKategori DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "KAT-001";
        } else {
            $string = $last_id[0]->KodeKategori;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "KAT-" . $new;
        }

        return view('backend.master.kategori.create', ['newID' => $newID]);
        
    }

    public function store(Request $request)
    {
        $users = Auth::id();
        
        $this->validate($request, 
        [
            'KodeKategori' => 'required',
            'NamaKategori' => 'required|unique:masterkategoris,NamaKategori'
        ],[

            'NamaKategori.required' => 'Nama Kategori Tidak Boleh Kosong!',
            'NamaKategori.unique' => 'Nama Kategori Sudah Ada!'

        ]
    );

        DB::table('masterkategoris')->insert([
            'KodeKategori' => $request->KodeKategori,
            'NamaKategori' => $request->NamaKategori,
            'Status' => 'OPN',
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah Kategori ' . $request->KodeKategori,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Kategori ' . $request->NamaKategori . ' berhasil ditambahkan';
        return redirect('/admin/master/kategori')->with(['created' => $pesan]);
        
    }

    public function searchDataKLAByCustId($id)
     {
        $users = Auth::id();
        
       $kla = DB::table('masterkategori')->where('KodeKategori', $id)->where('Status', 'OPN')->get();
       if ($kla != null) {
         return response()->json($kla);
       } else {
         return response()->json([]);
       }
       
     }

    public function edit($id)
    {   
        $users = Auth::id();

        $kategori = DB::table('masterkategoris')
                ->where('KodeKategori', $id)
                ->get();
        return view('backend.master.kategori.edit', compact('kategori'));
        
    }

    public function update(Request $request)
    {

        $users = Auth::id();

        $this->validate($request, 
        [
            'KodeKategori' => 'required',
            'NamaKategori' => 'required'
        ],[

            'NamaKategori.required' => 'Nama Kategori Tidak Boleh Kosong!',

        ]
    );

        DB::table('masterkategoris')->where('KodeKategori', $request->KodeKategori)->update([
            'NamaKategori' => $request->NamaKategori,
            'Status' => 'OPN',
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update Kategori ' . $request->KodeKategori,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Kategori ' . $request->NamaKategori . ' berhasil diubah';
        return redirect('/admin/master/kategori')->with(['edited' => $pesan]);

    }

    public function hapus($id)
            {

            $users = Auth::id();

            DB::table('masterkategoris')->where('KodeKategori',$id)->update([
            'Status' => 'DEL',
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'updated_at' => \Carbon\Carbon::now() 

        ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus kategori ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

                $pesan = 'Kategori ' . $id . ' berhasil dihapus';
        return redirect('/admin/master/kategori')->with(['deleted' => $pesan]);
            }    

}