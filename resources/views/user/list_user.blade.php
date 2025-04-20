@extends('template/frame')
@section('content-wrapper')
    {{-- start source code adit --}}
    {{-- <div class="container-xxl flex-grow-1">
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal Menambahkan Data!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if (session()->has('success'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        @if (is_array(session('success')))
        @foreach (session('success') as $message)
        {{ $message }}
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </button>
    @else
    {{ session('success') }}
    @endif
</div>
@endif

@php
               $datarole=Auth::user()->role;   
               $hidden_class="";
               $hidden_style="";
               if ($datarole==1) {
                   $hidden_class="hidden";
                   $hidden_style="d-none";
                }
                @endphp


<h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Pengguna</h4>
<!-- DataTable with Buttons -->
<div class="card p-4">
    <div class="card-datatable table-responsive pt-0">
        <div class="row">
            <div class="col"><p>Daftar Pengguna Aplikasi</p></div>
            <div class="col">
                <p align="right" {{$hidden_class}}>  
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span><i class="mdi mdi-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah User Baru</span></span></button>
                </p>
            </div>
        </div>       
        
        <hr>
        <table class="table table-bordered" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th {{$hidden_class}}>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $data)
                @php
                 $roles=$data->role;
                 $tampil_role="";
                 $tampil_class="";
                 if ($roles==0) {
                     $tampil_role="Super Admin";
                    }elseif ($roles==1) {
                        $tampil_role="Admin";
                    }else{
                        $tampil_role="User";
                    }   
                    if ($roles==0) {
                        $tampil_class="btn btn-sm btn-danger";
                    }elseif ($roles==1) {
                        $tampil_class="btn btn-sm btn-success";
                    }else{
                        $tampil_class="";
                    }   
                    
                    @endphp
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->no_hp}}</td>
                <td {{$hidden_class}} class="text-center"><div class="w-100 {{$tampil_class}}">{{$tampil_role}}</div></td>
                <td class="text-center"><a class="btn btn-warning btn-sm mb-1 w-100" href="{{url('pengguna/detail/'.$data->id)}}" >Edit</a><br><a class="btn btn-danger btn-sm w-100 {{$hidden_style}}" href="{{url('pengguna/'.$data->id)}}" onclick="return confirm('Yakin Menghapus Data?')">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<!--/ DataTable with Buttons -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/pengguna')}}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" maxlength="200" value="{{old('nama')}}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="font-weight-bold">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="E-mail" maxlength="200" value="{{old('email')}}">
                    </div>
                    <div class="form-group mb-2">
                        <label class="font-weight-bold">No HP</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="No HP" maxlength="15" value="{{old('no_hp')}}" minlength="10">
                    </div>
                    <div class="form-group mb-2">
                        <label class="font-weight-bold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" maxlength="200">
                    </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Role</label>
                <select name="role" class="form-control">
                    <option hidden selected value="">-- Role --</option>
                    <option value="0">Super Admin</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
</div>
</div>
end source code adit --}}
    {{-- ################################################################################################### --}}



    <div class="container-xxl flex-grow-1">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal Menambahkan Data!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- @if (session()->has('success'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        @if (is_array(session('success')))
        @foreach (session('success') as $message)
        {{ $message }}
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </button>
    @else
    {{ session('success') }}
    @endif
</div>
@endif --}}

        @php
            //    $datarole=Auth::user()->role;
            $datarole = '0';
            $hidden_class = '';
            $hidden_style = '';
            if ($datarole == 1) {
                $hidden_class = 'hidden';
                $hidden_style = 'd-none';
            }
        @endphp


        <h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Pengguna</h4>
        <!-- DataTable with Buttons -->
        <div class="card p-4">
            <div class="card-datatable table-responsive pt-0">
                <div class="row">
                    <div class="col">
                        <p>Daftar Pengguna Aplikasi</p>
                    </div>
                    <div class="col">
                        <p align ="right" {{ $hidden_class }}>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><span><i class="mdi mdi-plus me-sm-1"></i> <span
                                        class="d-none d-sm-inline-block">Tambah User Baru</span></span></button>
                        </p>
                    </div>
                </div>

                <hr>
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>NIK</th>
                            <th>Tgl Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor HP</th>
                            <th>Foto</th>
                            <th>Alamat</th>
                            <th>Status Pegawai</th>
                            <th>Tgl Masuk</th>
                            <th {{ $hidden_class }}>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $data)
                            @php
                                $roles = $data->role;
                                $tampil_role = '';
                                $tampil_class = '';
                                if ($roles == 0) {
                                    $tampil_role = 'Super Admin';
                                } elseif ($roles == 1) {
                                    $tampil_role = 'Admin';
                                } else {
                                    $tampil_role = 'User';
                                }
                                if ($roles == 0) {
                                    $tampil_class = 'btn btn-sm btn-danger';
                                } elseif ($roles == 1) {
                                    $tampil_class = 'btn btn-sm btn-success';
                                } else {
                                    $tampil_class = '';
                                }

                            @endphp
                            <tr>
                                <td class="control" tabindex="0">{{ $loop->iteration }}</td>

                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                {{-- <td>{{ $data->password }}</td> --}}
                                <td>
                                    <span class="password-text"
                                        style="display:none;">{{ substr($data->password, 0, 5) . '...' . substr($data->password, -5) }}</span>
                                    <span class="password-hidden">••••••••</span>
                                    <button class="btn btn-sm btn-link toggle-password">
                                        <i class="menu-icon tf-icons mdi mdi-eye"></i>
                                    </button>
                                </td>
                                <td>{{ $data->nik }}</td>
                                {{-- <td>{{ $data->tgl_lahir }}</td> --}}
                                <td>{{ \Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d F Y') }}</td>

                                <td>{{ $data->jenis_kelamin }} </td>
                                <td>
                                    <div class="row mb-2">
                                        <div class="col-5 fw-bold"></div>
                                        <div class="col-7">{{ $data->telp }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row mb-2">
                                        <div class="col-5 fw-bold"></div>
                                        <div class="col-7">
                                            {{-- <img src="{{ $data->foto }}" alt="Foto" width="60" height="60"
                                                class="rounded"> --}}
                                            @if (Str::startsWith($data->foto, 'http'))
                                                <img src="{{ $data->foto }}" alt="Foto" width="60" height="60"
                                                    class="rounded">
                                            @else
                                                <img src="{{ asset('uploads/' . $data->foto) }}" alt="Foto"
                                                    width="60" height="60" class="rounded">
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                {{-- <td>{{ $data->alamat }}</td> --}}

                                <td>
                                    <div class="row mb-2">
                                        <div class="col-5 fw-bold"></div>
                                        <div class="col-7">{{ $data->alamat }}</div>
                                    </div>
                                </td>

                                <td>
                                    <div class="row mb-2">
                                        <div class="col-5 fw-bold"></div>
                                        <div class="col-7 text-start">{{ $data->status_pegawai }}</div>
                                    </div>
                                </td>
                                {{-- <td>{{ $data->tgl_masuk }}</td> --}}
                                <td>
                                    <div class="row mb-2">
                                        <div class="col-5 fw-bold"></div>
                                        <div class="col-7">{{ \Carbon\Carbon::parse($data->tgl_masuk)->format('d M Y') }}
                                        </div>
                                    </div>
                                </td>

                                <td {{ $hidden_class }} class="text-center">
                                    <div class="row mb-2">

                                        <div class="col-5 fw-bold "></div>
                                        <div class="col-7"{{ $tampil_class }}>{{ $tampil_role }}</div>
                                    </div>
                                </td>

                                <td class="text-center">
                                    <!-- start Tombol Edit -->

                                    <button type="button" class="btn btn-warning btn-sm mb-1 w-100 btn-edit-user"
                                        data-bs-toggle="modal" data-bs-target="#modal-edit-user{{ $data->id }}"
                                        data-id="{{ $data->id }}" data-name="{{ $data->name }}"
                                        data-email="{{ $data->email }}" data-nik="{{ $data->nik }}"
                                        data-tgl_lahir="{{ $data->tgl_lahir }}"
                                        data-jenis_kelamin="{{ $data->jenis_kelamin }}" data-telp="{{ $data->telp }}"
                                        data-foto="{{ asset('uploads/' . $data->foto) }}"
                                        data-alamat="{{ $data->alamat }}"
                                        data-status_pegawai="{{ $data->status_pegawai }}"
                                        data-tgl_masuk="{{ $data->tgl_masuk }}" data-role="{{ $data->role }}">
                                        Edit
                                    </button>

                                    <!-- end Tombol Edit -->
                                    {{-- <a class="btn btn-warning btn-sm mb-1 w-100 data-*" data-bs-toggle="modal"
                                        data-bs-target="#Modaledituser"
                                        href="{{ url('user/detail/' . $data->id) }}">Edit</a>
                                        <br> --}}
                                    <a class="btn btn-danger btn-sm w-100 {{ $hidden_style }}"
                                        href="{{ url('user/' . $data->id) }}"
                                        onclick="return confirm('Yakin Menghapus Data?')">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!--/ DataTable with Buttons -->
    </div>




    <!-- Modal Tambah User -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/user/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name" class="font-weight-bold">Nama</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nama"
                                maxlength="200" value="{{ old('nama') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="email" class="font-weight-bold">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="E-mail" maxlength="200" value="{{ old('email') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input id="password" type="text" name="password" class="form-control"
                                placeholder="Password" maxlength="15" value="{{ old('password') }}" minlength="8">
                        </div>

                        <div class="form-group mb-2">
                            <label for="nik" class="font-weight-bold">NIK</label>
                            <input id="nik" type="number" name="nik" class="form-control" placeholder="NIK"
                                maxlength="200" value="{{ old('nik') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="tgl_lahir" class="font-weight-bold">Tanggal Lahir</label>
                            <input id="tgl_lahir" type="date" name="tgl_lahir" class="form-control"
                                placeholder="Tgl Lahir" value="{{ old('tgl_lahir') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                <option hidden selected value="">-- Jenis Kelamin --</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                                {{-- <option value="2">User</option> --}}
                            </select>
                        </div>

                        {{-- <div class="form-group mb-2">
                            <label class="font-weight-bold">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin"
                                value="{{ old('jenis_kelamin') }}">
                        </div> --}}

                        <div class="form-group mb-2">
                            <label for="telp" class="font-weight-bold">No. Hp</label>
                            <input id="telp" type="number" name="telp" class="form-control"
                                placeholder="Nomer Handphone" value="{{ old('telp') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="foto" class="font-weight-bold">Foto</label>
                            <input id="foto" type="file" name="foto" class="form-control" placeholder="Foto"
                                value="{{ old('foto') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="alamat" class="font-weight-bold">Alamat</label>
                            <input id="alamat" type="textarea" name="alamat" class="form-control"
                                placeholder="Alamat" maxlength="200">
                        </div>

                        <div class="form-group mb-2">
                            <label for="status_pegawai" class="font-weight-bold">Status Pegawai</label>
                            <input id="status_pegawai" type="text" name="status_pegawai" class="form-control"
                                placeholder="Status Pegawai">
                        </div>

                        <div class="form-group mb-2">
                            <label for="tgl_masuk" class="font-weight-bold">Tanggal Masuk</label>
                            <input id="tgl_masuk" type="date" name="tgl_masuk" class="form-control"
                                placeholder="Tanggal Masuk">
                        </div>

                        <div class="form-group mb-2">
                            <label for="role" class="font-weight-bold">Role</label>
                            <select id="role" name="role" class="form-control">
                                <option hidden selected value="">-- Role --</option>
                                <option value="0">Super Admin</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit User -->
    @foreach ($users as $data)
        <div class="modal fade" id="modal-edit-user{{ $data->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ url('user/update/') . $data->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit-id" value="{{ $data->id }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body row">

                            <div class="col-md-6 mb-2">
                                <label>Nama</label>
                                <input type="text" value="{{ $data->name }}" name="name" id="edit-name"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label>Email</label>
                                <input type="email" value="{{ $data->email }}" name="email" id="edit-email"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label>NIK</label>
                                <input type="text" value="{{ $data->nik }}" name="nik" id="edit-nik"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label>Password <small>(kosongkan jika tidak diganti)</small></label>
                                <input type="password" value="{{ $data->password }}" name="password"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="edit-jenis_kelamin" class="form-control">
                                    @if ($data->jenis_kelamin == 'Pria')
                                        <option value="Pria" selected>Pria</option>
                                    @elseif ($data->jenis_kelamin == 'Wanita')
                                        <option value="Wanita" selected>Wanita</option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label>No. Telp</label>
                                <input type="text" value="{{ $data->telp }}" name="telp" id="edit-telp"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label>Tanggal Lahir</label>
                                <input type="date" value="{{ $data->tgl_lahir }}" name="tgl_lahir"
                                    id="edit-tgl_lahir" class="form-control">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label>Tanggal Masuk</label>
                                <input type="date" value="{{ $data->tgl_masuk }}" name="tgl_masuk"
                                    id="edit-tgl_masuk" class="form-control">
                            </div>

                            <div class="col-md-12
                                mb-2">
                                <label>Foto</label>
                                <img id="edit-preview-foto" width="100" class="mt-2" style="display: none;">
                                <input type="file" name="foto" class="form-control">
                            </div>

                            <div class="col-md-12 mb-2">
                                <label>Alamat</label>
                                <textarea name="alamat" id="edit-alamat" class="form-control">{{ $data->alamat }}</textarea>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label>Status Pegawai</label>
                                <select name="status_pegawai" id="edit-status_pegawai" class="form-control">
                                    @if ($data->status_pegawai == 'Kontrak')
                                        <option value="Kontrak" selected>Kontrak</option>
                                    @elseif ($data->status_pegawai == 'PNS')
                                        <option value="PNS" selected>PNS</option>
                                    @elseif ($data->status_pegawai == 'Honor')
                                        <option value="Honor" selected>Honor</option>
                                    @else
                                        <option value="Karyawan Tetap">Karyawan Tetap</option>
                                    @endif
                                </select>
                            </div>


                            <div class="col-md-6 mb-2">
                                <label>Role</label>
                                <select name="role" id="edit-role" class="form-control">
                                    @if ($data->role == '0')
                                        <option value="0" selected>Super Admin</option>
                                    @elseif ($data->role == '1')
                                        <option value="1">Admin</option>
                                    @else
                                        <option value="2">User</option>
                                    @endif
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection


{{-- Script Ambil Data yang sudah ada ke form --}}
@section('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('.btn-edit-user').on('click', function() {
                const data = $(this).data();
                $('#edit-id').val(data.id);
                $('#edit-name').val(data.name);
                $('#edit-email').val(data.email);
                $('#edit-nik').val(data.nik);
                $('#edit-tgl_lahir').val(data.tgl_lahir);
                $('#edit-jenis_kelamin').val(data.jenis_kelamin);
                $('#edit-telp').val(data.telp);
                $('#edit-preview-foto').attr('src', data.foto).show();
                $('#edit-alamat').val(data.alamat);
                $('#edit-status_pegawai').val(data.status_pegawai);
                $('#edit-tgl_masuk').val(data.tgl_masuk);
                $('#edit-role').val(data.role);
            });
        });
    </script> --}}
@endsection
