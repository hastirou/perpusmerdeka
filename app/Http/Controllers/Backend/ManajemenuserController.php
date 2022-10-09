<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManajemenuserController extends Controller
{

public function index()
    {
        $user = DB::table('users')
                    ->where('users.roleid', '1')
                    ->where('users.Status', 'OPN')
                    ->get();
        return view('backend.manajemenuser.index', compact('user'));
    }

public function create()
    {
        return view('backend.manajemenuser.create');
    }

public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'alpha_dash'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'roleId' => '1',
        ]);

        $pesan = 'User ' . $request->Username . ' berhasil ditambahkan';
        return redirect('/admin/manajemenuser')->with(['created' => $pesan]);
    }

public function edit($id)
    {   
               
        $user = DB::table('users')
                    ->where('users.id', $id)
                    ->get();
        return view('backend.manajemenuser.edit', compact('user'));        
    }


public function update(Request $request)
    {

        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'roleId' => $request->roleId,
            'email'=> $request->email,
            'Status' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()

        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Ubah data ' . $request->id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data User Id ' . $request->id . ' berhasil diubah';
        return redirect('/admin/manajemenuser')->with(['edited' => $pesan]);

    }

    public function hapus($id)
    {

        DB::table('users')->where('id',$id)->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now() 

                ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Illuminate\Support\Facades\Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus User ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'User Id ' . $id . ' berhasil dihapus';
        return redirect('/admin/manajemenuser')->with(['deleted' => $pesan]);
            }
}
