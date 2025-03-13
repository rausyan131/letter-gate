<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="row">

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

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: '{{ session('error') }}',
                    showConfirmButton: true
                });
            </script>
        @endif

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Data Pegawai</h3>

                    <div style="width: 100%; justify-content: space-between; display:flex;">

                    <a href="{{route('pegawai.create')}}" class="btn btn-primary btn-fw mb-4"> Tambah Data</a>
                    
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{route('pegawai.index')}}" method="GET">
                        <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request('search') }}" >
                        <button type="submit" class="btn btn-primary " style="width: 50px; height: 40px">
                            <i class="fa fa-search"></i> 
                        </button>
                    </form>
                </div>

                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Foto </th>
                                    <th> NIP</th>
                                    <th> Nama</th>
                                    <th> Alamat</th>
                                    <th> Jenis Kelamin </th>
                                    <th> Status </th>
                                    <th> Devisi </th>
                                    <th> Telepon </th>
                            
                                    <th style="width: 20px"> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawai as $data)
                                    <tr>
                                       
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img 
                                            src="{{ $data->foto && file_exists(public_path('storage/foto/' . $data->foto)) 
                                                ? asset('storage/foto/' . $data->foto) 
                                                : asset('assets/images/profile.jpg') }}" 
                                            alt="image" 
                                            class="rounded-circle" 
                                            style="width: 60px; height: 60px; object-fit: cover;" 
                                        />
                                        </td>

                                        <td>{{ $data->nip }} </td>
                                        <td>{{ $data->nama }} </td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->gender }}</td>
                                        <td>{{ $data->status}}</td>
                                        <td>{{ $data->devisi->nama_devisi}}</td>
                                        <td>{{ $data->telepon}}</td>



                                        <td style="display: flex">

                                            <a href="{{route('pegawai.edit', $data->nip )}}" class="btn btn-success" style="margin-right: 5px">
                                                Edit
                                            </a>

                                            <form action="{{route('pegawai.destroy',$data->nip )}}" method="POST">
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
                                        <td colspan="9" class="text-center">Data Tidak Ditemukan</td>
                                    </tr>

                                
                                @endforelse

                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $pegawai->links('pagination::bootstrap-5') }}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
