<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="row">

        <div class="col-md-12 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <div class="d-flex align-items-center align-self-start">
                                <h1 class="mb-0 ">Dashboard </h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-xl-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5>Profil</h5>
                    <div class="row mt-5 d-flex justify-content-between">
                        <div class="col-4 col-sm-12 col-xl-4 text-center">
                          

                            <img src="{{ Auth::user()->pegawai->foto && file_exists(public_path('storage/foto/' . Auth::user()->pegawai->foto))
                                ? asset('storage/foto/' . Auth::user()->pegawai->foto)
                                : asset('assets/images/profile.jpg') }}"
                                alt="Foto Pegawai" class="rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover;" />
                        </div>

                        <div class="col-8 col-sm-12 col-xl-8 my-auto text-end">
                            <h4>{{ Auth::user()->pegawai->nama }}</h4>
                            <p class="text-muted">Devisi/ Departmen {{ Auth::user()->pegawai->devisi->nama_devisi }}</p>
                            <p class="font-weight-medium">{{ Auth::user()->role }}</p>
                            <a href="{{ route('pegawai.edit', Auth::user()->pegawai->nip) }}"
                                class="btn btn-warning btn-sm">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title">Surat Masuk Hari Ini</h4>
                        
                        <a href="{{route('surat.index')}}" class="btn btn-primary" style="text-decoration: none">Semua Surat</a>
                    </div>

                    <div class="preview-list">
                      <p class="text-muted mb-1 small">{{$today->format('d-M-Y')}}</p>  

                        @forelse ($suratHariIni as $surat)
                        <div class="preview-item border-bottom">
                            @php
                            $pengirim = App\Models\Pegawai::where('nip', $surat->pengirim_id)->first();
                            @endphp
                            <div class="preview-thumbnail">
                                <img id="foto-preview"
                                    src="{{ $pengirim->foto && file_exists(public_path('storage/foto/' . $pengirim->foto))
                                        ? asset('storage/foto/' . $pengirim->foto)
                                        : asset('assets/images/profile.jpg') }}"
                                    alt="Foto Pegawai" class="rounded-circle"
                                    style="width: 50px; height: 50px; object-fit: cover;" />
                            </div>
                            <div class="preview-item-content d-flex flex-grow">
                                <div class="flex-grow">
                                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                        <h6 class="preview-subject">{{ $pengirim->nama }}</h6>
                                         <a href="{{route('surat.show', $surat->id )}}" class="btn btn-dark" style="text-decoration: none">Lihat Surat</a>

                                    </div>
                                    <p class="text-muted">{{ $surat->judul }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center mt-5">Belum ada pesan yang masuk hari ini</p>
                    @endforelse
                    

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">



        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">To do list</h4>
                    <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                        <button class="add btn btn-primary todo-list-add-btn">Add</button>
                    </div>
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout>
