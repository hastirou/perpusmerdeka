<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DatabukuController extends Controller 
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
        
        $databuku = DB::table('databukus')
                ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databukus.KodeKategori')
                ->where('databukus.Status', 'OPN')
                ->get();

        return view('backend.databuku.index', ['databuku'=>$databuku]);
        
    }

    public function detail()
    {      
        $users = Auth::id();
        
        $databuku = DB::table('databukus')
                ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databukus.KodeKategori')
                ->where('databukus.Status', 'OPN')
                ->get();

        return view('backend.databuku.detail', ['databuku'=>$databuku]);
        
    }

    public function create(Request $request)
    {   

        $kategori = DB::table('masterkategoris')
                ->where('Status', 'OPN')
                ->get();
        $last_id = DB::select('SELECT * FROM databukus ORDER BY KodeBuku DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "BOOK-001";
        } else {
            $string = $last_id[0]->KodeBuku;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "BOOK-" . $new;
        }

        return view('backend.databuku.create', [
            'newID' => $newID,
            'kategori' => $kategori
        ]);
        
    }

    public function store(Request $request)
    {   
        
        $this->validate($request,[

            'KodeBuku' => 'required',
            'JudulBuku' => 'required',
            'TentangBuku' => 'required',
            'KodeKategori' => 'required',
            'Jumlah' => 'required',
            'file' => 'required',

        ],[

            'JudulBuku.required' => 'Judul Buku Tidak Boleh Kosong!',
            'TentangBuku.required' => 'Tentang Buku Tidak Boleh Kosong!',
            'KodeKategori.required' => 'Kategori Tidak Boleh Kosong!',
            'Jumlah.required' => 'Jumlah Tidak Boleh Kosong!',
            'file.required' => 'Foto Tidak Boleh Kosong!',          

        ]
    );

        $file = $request->file('file');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
        $tujuan_upload = 'data_buku';
        $file->move($tujuan_upload,$nama_file);

        DB::table('databukus')->insert([
            'KodeBuku' => $request->KodeBuku,
            'JudulBuku' => $request->JudulBuku,
            'TentangBuku' => $request->TentangBuku,
            'KodeKategori' => $request->KodeKategori,
            'Jumlah' => $request->Jumlah,
            'File' => $nama_file,
            'Status' => 'OPN',
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah buku ' . $request->KodeBuku,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        $pesan = 'Data Buku ' . $request->KodeBuku . ' berhasil ditambahkan';
        return redirect('/admin/databuku')->with(['created' => $pesan]);
        
    }

    public function searchDataKATByCustId($id)
     {  
              
        $id = DB::table('databukus')
                ->where('KodeBuku', $id)
                ->get();

        if($id != null){
            return response()->json($id);
        } else {
            return response()->json([]);
        }
        
     }

    public function edit($id)
    {   
        
        $databuku = DB::table('databukus')
                ->join('masterkategoris', 'masterkategoris.KodeKategori', '=', 'databukus.KodeKategori')
                ->where('databukus.KodeBuku', $id)
                ->get();
        $kategori = DB::table('masterkategoris')
                ->where('Status', 'OPN')
                ->get();
        return view('backend.databuku.edit', [
            'databuku' => $databuku,
            'kategori' => $kategori
        ]);
        
    }

    public function update(Request $request)
    {

        if($request->file != null)
        {
            $file = $request->file('file');

            $nama_file = time()."_".$file->getClientOriginalName();

            $tujuan_upload = 'data_buku';
            $file->move($tujuan_upload,$nama_file);

            $ItemLama = DB::table('databukus')->where('KodeBuku',$request->KodeBuku)->get();
            $GambarLama = $ItemLama[0]->File;
            rename('data_buku/'.$GambarLama,'data_buku/recycle/'.$GambarLama);
            
            DB::table('databukus')->where('KodeBuku', $request->KodeBuku)->update([
            'KodeBuku' => $request->KodeBuku,
            'JudulBuku' => $request->JudulBuku,
            'TentangBuku' => $request->TentangBuku,
            'KodeKategori' => $request->KodeKategori,
            'Jumlah' => $request->Jumlah,
            'File' => $nama_file,
            'Status' => 'OPN',
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        } else {
            DB::table('databukus')->where('KodeBuku', $request->KodeBuku)->update([
            'KodeBuku' => $request->KodeBuku,
            'JudulBuku' => $request->JudulBuku,
            'TentangBuku' => $request->TentangBuku,
            'KodeKategori' => $request->KodeKategori,
            'Jumlah' => $request->Jumlah,
            'Status' => 'OPN',
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        }  

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update properti ' . $request->KodeProperti,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data Buku ' . $request->KodeBuku . ' berhasil diubah';
        return redirect('/admin/databuku')->with(['edited' => $pesan]);
            
    }

    public function hapus($id)
    {

        $ItemLama = DB::table('databukus')->where('KodeBuku',$id)->get();
        $GambarLama = $ItemLama[0]->File;
        rename('data_buku/'.$GambarLama,'data_buku/recycle/'.$GambarLama);

        DB::table('databukus')->where('KodeBuku',$id)->update([
            'Status' => 'DEL',
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'updated_at' => \Carbon\Carbon::now() 

                ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus Data Buku ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data Buku ' . $id . ' berhasil dihapus';
        return redirect('/admin/databuku')->with(['deleted' => $pesan]);
            }

}