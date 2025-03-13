<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="col-lg-6 col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Ubah Data Pengguna</h4>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form class="forms-sample" method="POST" action="{{ route('users.update', $user->id) }}">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username', $user->username) }}" placeholder="Masukkan username" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $user->email) }}" placeholder="Masukkan email" required>
                    </div>

                    <div class="form-group">
                        <label for="pegawai_id">Nama Pegawai</label>
                        <select class="form-select" id="pegawai_id" name="pegawai_id" required>
                            <option value="" disabled selected>Pilih pegawai</option>
                            @foreach ($pegawai as $data)
                                <option value="{{ $data->nip }}"
                                    {{ old('pegawai_id', $user->pegawai_id) == $data->nip ? 'selected' : '' }}>
                                    {{ $data->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="User" {{ old('role', $user->role) == 'User' ? 'selected' : '' }}>User
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan password baru (opsional)">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('users.index') }}" class="btn btn-dark">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
