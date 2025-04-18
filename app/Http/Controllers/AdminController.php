<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;

class AdminController extends Controller
{
    //

    public function index()
    {
         $data['page'] = "Beranda";
         $data['sub'] = "";

        // $role=Auth::user()->role;
        // $id_user=Auth::user()->id;

        // if ($role=='0') {
        // $data['total']=Transaksi::all()->count();
        // $data['baru']=Transaksi::where('status', 'Antrian')->count();
        // $data['proses'] = DB::table('transaksis')
        // ->select('transaksis.*')
        // ->whereNot('transaksis.status','Antrian')
        // ->whereNot('transaksis.status','Selesai')
        // ->count();
        // $data['selesai']=Transaksi::where('status', 'Selesai')->count();
        // $data['jmluser']=User::all()->count();
        // return view('dashboard_admin',$data);
        // }
        // else{
        //     $data['total'] = DB::table('transaksis')
        //     ->join('users', 'transaksis.id_user', '=', 'users.id')
        //     ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        //     ->select('transaksis.*')
        //     ->where('laundries.id_user',$id_user)
        //     ->count();

        //     $data['baru'] = DB::table('transaksis')
        //     ->select('transaksis.*')
        //     ->join('users', 'transaksis.id_user', '=', 'users.id')
        //     ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        //     ->where('transaksis.status','Antrian')
        //     ->where('laundries.id_user',$id_user)
        //     ->count();
            
        //     $data['proses'] = DB::table('transaksis')
        //     ->select('transaksis.*')
        //     ->join('users', 'transaksis.id_user', '=', 'users.id')
        //     ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        //     ->whereNot('transaksis.status','Antrian')
        //     ->whereNot('transaksis.status','Selesai')
        //     ->where('laundries.id_user',$id_user)
        //     ->count();

        //     $data['selesai'] = DB::table('transaksis')
        //     ->join('users', 'transaksis.id_user', '=', 'users.id')
        //     ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        //     ->select('transaksis.*')
        //     ->where('laundries.id_user',$id_user)
        //     ->where('transaksis.status','Selesai')
        //     ->count();

        //     $data['jmluser']=User::all()->count();
            return view('dashboard',$data);
            // return view('user/create_user',$data);
            // return view('dashboard');
        }
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {

        //validasi
      $validated =  $request->validate(
        [
            'name' => 'required',
            'email' => 'required|unique:user',
            'password' => 'required',
            'telp' => 'required',
            'nik' => 'required',
            'tgl_masuk' => 'required',
            'role' => 'required',
        ],
        [
            'name.required' => 'Nama Wajib Diisi',
                'email.required' => 'E-mail Wajib Diisi',
                'password.required' => 'Password Wajib Diisi',
                'telp.required' => 'No HP Wajib Diisi',
                'nik.required' => 'NIK Wajib Diisi',
                'tgl_masuk.required' => 'Tanggal Masuk Wajib Diisi',
                'role.required' => 'Role Wajib Diisi',
            
        ]);

        //fungsi upload file
        $file = $request->file('image');
        $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();

        Storage::disk('local')->put('public/'.$path, file_get_contents($file));


       $validated['password'] = Hash::make($validated['password']);

        Users::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            // 'foto'      => $request->foto,
            'nik'       => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'telp'      => $request->telp,
            'foto'      => $path,
            'alamat'    => $request->alamat,
            'status_pegawai'=> $request->status_pegawai,
            'tgl_masuk' => $request->tgl_masuk,
            'role'      => $request->role,
        ]);

        return Redirect::route('create_user')->withSucces(['Berhasil Menambahkan Data !']);
        
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
