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

                    <form class="forms-sample" method="POST" action="{{ route('devisi.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nama_devisi">Nama Devisi</label>
                            <input type="text" class="form-control" id="nama_devisi" name="nama_devisi" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon">
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
                    <h3 class="card-title">Data Devisi</h3>

                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{route('devisi.index')}}" method="GET">
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
                                    <th> Nama Devisi</th>
                                    <th> Deskripsi </th>
                                    <th> Telepon </th>
                                    <th style="width: 20px"> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($devisi as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_devisi }} </td>

                                        <td style="width: 40%; white-space: normal; word-break: break-word;">
                                            {{ $data->deskripsi }}
                                        </td>

                                        <td>{{ $data->telepon }}</td>

                                        <td style="display: flex">
                                            
                                            <a href="{{route('devisi.edit', $data->id)}}" class="btn btn-warning" style="margin-right: 5px">
                                                Edit
                                            </a>

                                            <form action="{{route('devisi.destroy', $data->id )}}" method="POST" >
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
                                        <td colspan="5" class="text-center">Data Belum Ada</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                      
                        <div class="mt-4">
                            {{ $devisi->links('pagination::bootstrap-5') }}
                            
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
