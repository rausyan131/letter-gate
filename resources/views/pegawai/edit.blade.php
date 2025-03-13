<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">UBAH DATA PEGAWAI</h4>

              

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form class="form-sample" action="{{route('pegawai.update', $pegawai->nip)}}" method="POST" enctype="multipart/form-data" >
                    @method('PUT')
                    @csrf

                    <div class="row">

                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <div>
                                <img 
                                id="foto-preview"
                                src="{{ $pegawai->foto && file_exists(public_path('storage/foto/' . $pegawai->foto)) 
                                    ? asset('storage/foto/' . $pegawai->foto) 
                                    : asset('assets/images/profile.jpg') }}" 
                                alt="Foto Pegawai" 
                                class="rounded-circle" 
                                style="width: 180px; height: 180px; object-fit: cover;" 
                            />
                            </div>
                        </div>
                        <div class="col-md-6">

                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="foto" id="foto-upload" class="file-upload-default">
                                    <div class="input-group col-xs-12 d-flex align-items-center">
                                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Foto">
                                      <span class="input-group-append ms-2">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                      </span>
                                    </div>
                                  </div>
                            <small class="text-muted">* Maksimal ukuran file: 2MB, format: jpeg, png, jpg, gif</small>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" id="nama">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{$pegawai->nama}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" id="nip">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nip" id="nip" value="{{$pegawai->nip}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" id="gender">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="gender" id="gender">
                                        <option value="pria" {{ $pegawai->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                                        <option value="wanita" {{ $pegawai->gender == 'wanita' ? 'selected' : '' }}>Wanita</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-md-6"> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" id="status">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="status" name="status">
                                        <option value="menikah" {{ $pegawai->status == 'menikah' ? 'selected' : '' }}>Menikah</option>
                                        <option value="belum menikah" {{ $pegawai->gender == 'belum menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Devisi</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="devisi_id">
                                        @foreach ($devisi as $data)
                                            <option value="{{ $data->id }}" {{ $pegawai->devisi_id == $data->id ? 'selected' : '' }}>
                                                {{ $data->nama_devisi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" id="alamat">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{$pegawai->alamat}}"/>
                                </div>
                            </div>
                        </div>

                     
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" id="tanggal_lahir">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{$pegawai->tanggal_lahir}}"/>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" id="telepon">Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="telepon" id="telepon" value="{{$pegawai->telepon}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" id="tempat_lahir">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{$pegawai->tempat_lahir}}" />
                                </div>
                            </div>
                        </div>
                       
                    </div>

                  
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-dark">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <script>
    document.getElementById('foto-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('foto-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
    
</x-layout>
