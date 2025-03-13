<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="row">
        <div class="col-lg-4 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">FORM DEVISI</h4>

                    {{-- Pesan error dan sukses (sweetalert2) --}}
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    @if (session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: '{{ session('success') }}',
                                showConfirmButton: true
                            });
                        </script>
                    @endif


                    <form class="forms-sample" method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" autocomplete="off"
                                required>
                        </div>

                        <div class="form-group ">
                            <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-12">
                                <select class="form-select" name="pegawai_id">
                                    @foreach ($pegawai as $data)
                                        <option value="{{ $data->nip }}"> {{ $data->nama }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                autocomplete="new-password">
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 col-form-label" id="role">Role</label>
                            <div class="col-sm-12">
                                <select class="form-select" id="role" name="role">
                                    <option>Admin</option>
                                    <option>User</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-lg-8 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div style="width: 100%; display:flex; justify-content: space-between">
                        <h3 class="card-title">Data Pengguna</h3>

                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ route('users.index') }}"
                            method="GET">
                            <input type="text" class="form-control" name="search" placeholder="Search"
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary " style="width: 50px; height: 40px">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Username</th>
                                    <th> Nama Pegawai</th>
                                    <th> Email</th>

                                    <th style="width: 20px"> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->username }} </td>
                                        <td>{{ $data->pegawai->nama }} </td>
                                        <td>{{ $data->email }}</td>


                                        <td style="display: flex">
                                            <a href="{{ route('users.edit', $data->id) }}" class="btn btn-success"
                                                style="margin-right: 5px">
                                                Edit
                                            </a>

                                            <form action="{{ route('users.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-4">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
