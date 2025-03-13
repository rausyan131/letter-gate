<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="col-lg-4 col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">UBAH DATA DEVISI</h4>

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

                <form class="forms-sample" method="POST" action="{{ route('devisi.update', $devisi->id) }}">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="nama_devisi">Nama Devisi</label>
                        <input type="text" class="form-control" id="nama_devisi" name="nama_devisi" value="{{$devisi->nama_devisi}}" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control">{{$devisi->deskripsi}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{$devisi->telepon}}">
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('devisi.index') }}" class="btn btn-dark">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>