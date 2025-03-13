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


        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Daftar Semua Surat</h3>

                    <div style="width: 100%; justify-content: space-between; display:flex;">

                        <div class="dflex">
                            <a href="{{ route('surat.create') }}" class="btn btn-primary btn-fw mb-4"> Tulis Surat </a>
                        </div>

                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ route('surat.index') }}"
                            method="GET">
                            <input type="text" class="form-control" name="search" placeholder="Search"
                                value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary " style="width: 50px; height: 40px">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="table-responsive">

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> nomor_surat</th>
                                    <th> Judul</th>
                                    <th> Pengirim</th>
                                    <th> Penerima</th>

                                    <th style="width: 20px"> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($surat as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nomor_surat }} </td>
                                        <td>{{ $data->judul }} </td>
                                        <td>
                                            {{ DB::table('pegawai')->where('nip', $data->pengirim_id)->value('nama') ?? 'Tidak ada penerima' }}
                                        </td>
                                        <td>
                                            {{ DB::table('pegawai')->where('nip', $data->penerima_id)->value('nama') ?? 'Tidak ada penerima' }}

                                        </td>

                                        <td style="display: flex">

                                            <a href="{{ route('surat.edit', $data->id) }}" class="btn btn-success"
                                                style="margin-right: 5px">
                                                Edit
                                            </a>

                                            <a href="{{ route('surat.show', $data->id) }}" class="btn btn-primary"
                                                style="margin-right: 5px">
                                                Detail
                                            </a>

                                            <form action="{{ route('surat.destroy', $data->id) }}" method="POST">
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
                                        <td colspan="9" class="text-center">Data Kosong</td>
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
