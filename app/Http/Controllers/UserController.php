<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    //

    public function index()
    {
        $data['page'] = "Pengguna";
        $data['sub'] = "";
        $data['users'] = Users::all()->sortBy('role');
        return view('user/list_user', $data);
    }

    public function store(Request $request)
    {

        //validasi
        $validated =  $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'telp' => 'required',
                'nik' => 'required',
                'tgl_masuk' => 'required',
                'role' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ],
            [
                'name.required' => 'Nama Wajib Diisi',
                'email.required' => 'E-mail Wajib Diisi',
                'password.required' => 'Password Wajib Diisi',
                'telp.required' => 'No HP Wajib Diisi',
                'nik.required' => 'NIK Wajib Diisi',
                'tgl_masuk.required' => 'Tanggal Masuk Wajib Diisi',
                'role.required' => 'Role Wajib Diisi',
                'foto.image' => 'File harus berupa gambar',
                'foto.mimes' => 'Format gambar yang diterima: jpg, jpeg, png',
                'foto.max' => 'Ukuran gambar maksimal 2MB',

            ]
        );

        //fungsi upload file
        // $file = $request->file('image');
        // $path = time().'_'.$request->name.'.'.$file->getClientOriginalExtension();

        // Storage::disk('local')->put('public/'.$path, file_get_contents($file));

        //chat gpt
        // if ($request->hasFile('foto')) {
        //     $file = $request->file('foto');
        //     $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();
        //     // Storage::disk('local')->put('public/Image' . $path, file_get_contents($file));
        //     Storage::disk('public')->put('Image/' . $path, file_get_contents($file));
        // } else {
        //     // bisa pakai default image atau handle error sesuai kebutuhan
        //     $path = 'Image/avatar.png'; // misalnya gambar default
        // }


        ///koding dari chat GPT
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = date('Ymd_His') . '_' . $request->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $path);
            $data['foto'] = $path;
        } else {
            // bisa pakai default image atau handle error sesuai kebutuhan
            $path = 'Image/avatar.png'; // misalnya gambar default
        }



        $validated['password'] = Hash::make($validated['password']);

        Users::create([
            'name'      => $request->name,
            'email'     => $request->email,
            // 'password'  => $request->password,
            'password' => $validated['password'], // password yang sudah di-hash

            // 'password'  => Hash::make($request->password),


            // 'foto'      => $request->foto,
            'foto'          => $path,
            'nik'           => $request->nik,
            'tgl_lahir'     => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telp'          => $request->telp,
            'alamat'        => $request->alamat,
            'status_pegawai' => $request->status_pegawai,
            'tgl_masuk'     => $request->tgl_masuk,
            'role'          => $request->role,
        ]);

        // return Redirect::route('create_user')->withSucces(['Berhasil Menambahkan Data !']);
        return Redirect::route('create_user')->with('success', 'Berhasil Menambahkan Data!');
    }


    //fungsi edit user
    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('user.edit_user', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'              => 'required|exists:users,id',
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email,' . $request->id,
            'password'        => 'nullable|string|min:6',
            'nik'             => 'required|unique:users,nik,' . $request->id,
            'tgl_lahir'       => 'required|date',
            'jenis_kelamin'   => 'required|in:Pria,Wanita',
            'telp'            => 'required|string',
            'alamat'          => 'required|string',
            'status_pegawai'  => 'required|string',
            'tgl_masuk'       => 'required|date',
            'role'            => 'required|in:0,1,2',
            'foto'            => 'nullable|image|max:2048',
        ]);

        $user = Users::findOrFail($request->id);
        $user->name           = $request->name;
        $user->email          = $request->email;
        $user->nik            = $request->nik;
        $user->tgl_lahir      = $request->tgl_lahir;
        $user->jenis_kelamin  = $request->jenis_kelamin;
        $user->telp           = $request->telp;
        $user->alamat         = $request->alamat;
        $user->status_pegawai = $request->status_pegawai;
        $user->tgl_masuk      = $request->tgl_masuk;
        $user->role           = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {

            if ($user->foto && File::exists(public_path('uploads/' . $user->foto))) {
                File::delete(public_path('uploads/' . $user->foto));
            }
            $file = $request->file('foto');
            $filename = date('Ymd_His') . '_' . $request->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $user->foto = $filename;
        }

        $user->save();

        return redirect('/users')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $data = Users::find($id);
        $data->delete();
        return redirect('/users')->with('success', 'User berhasil diperbarui.');
    }
}
