@extends('template/frame')
@section('content-wrapper')
    {{-- coding dari chat GPT --}}
    <div class="container">
        <h2>Manajemen Pengguna</h2>

        <!-- Tombol Tambah User -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-tambah-user">
            Tambah User
        </button>

        <!-- Tabel -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIK</th>
                    <th>Telepon</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->telp }}</td>
                        <td>
                            @if ($row->role == 0)
                                Super Admin
                            @elseif($row->role == 1)
                                Admin
                            @else
                                User
                            @endif
                        </td>
                        <td>
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-warning btn-sm btn-edit-user" data-bs-toggle="modal"
                                data-bs-target="#modal-edit-user" data-id="{{ $row->id }}"
                                data-name="{{ $row->name }}" data-email="{{ $row->email }}"
                                data-nik="{{ $row->nik }}" data-tgl_lahir="{{ $row->tgl_lahir }}"
                                data-jenis_kelamin="{{ $row->jenis_kelamin }}" data-telp="{{ $row->telp }}"
                                data-alamat="{{ $row->alamat }}" data-status_pegawai="{{ $row->status_pegawai }}"
                                data-tgl_masuk="{{ $row->tgl_masuk }}" data-role="{{ $row->role }}">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah User -->
    <div class="modal fade" id="modal-tambah-user" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form action="{{ url('user/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row">
                        @include('user.form') {{-- form partial bisa juga dimasukkan langsung di sini --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit User -->
    <div class="modal fade" id="modal-edit-user" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form action="{{ url('user/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row">

                        <div class="col-md-6 mb-2">
                            <label>Nama</label>
                            <input type="text" name="name" id="edit-name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Email</label>
                            <input type="email" name="email" id="edit-email" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Password <small>(kosongkan jika tidak diganti)</small></label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>NIK</label>
                            <input type="text" name="nik" id="edit-nik" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="edit-tgl_lahir" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="edit-jenis_kelamin" class="form-control">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>No. Telp</label>
                            <input type="text" name="telp" id="edit-telp" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        <div class="col-md-12 mb-2">
                            <label>Alamat</label>
                            <textarea name="alamat" id="edit-alamat" class="form-control"></textarea>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Status Pegawai</label>
                            <input type="text" name="status_pegawai" id="edit-status_pegawai" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tgl_masuk" id="edit-tgl_masuk" class="form-control">
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>Role</label>
                            <select name="role" id="edit-role" class="form-control">
                                <option value="0">Super Admin</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
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
                $('#edit-alamat').val(data.alamat);
                $('#edit-status_pegawai').val(data.status_pegawai);
                $('#edit-tgl_masuk').val(data.tgl_masuk);
                $('#edit-role').val(data.role);
            });
        });
    </script>
@endsection
