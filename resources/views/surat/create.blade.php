<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="col-12 grid-margin"  style="overflow: hidden;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tulis Surat</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-sample" action="{{ route('surat.store') }}" method="POST">
                    @csrf


                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pengirim_id" class="col-sm-3 col-form-label">Pengirim (anda)</label>
                                <input type="text" value="{{Auth::user()->pegawai->nip}}" name="pengirim_id" id="pengirim_id" hidden>
                                <input type="text" class="form-control" value="{{ Auth::user()->pegawai->nama }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penerima_id" class="col-sm-3 col-form-label">Penerima</label>
                                <div class="col-sm-12">
                                    <select class="form-select" name="penerima_id" id="penerima_id">
                                        @foreach ($pegawai as $data)
                                            <option value="{{ $data->nip }}"> {{ $data->nama }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_surat" class="col-sm-3 col-form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lampiran" class="col-sm-3 col-form-label">Lampiran</label>
                                <input type="text" class="form-control" id="lampiran" name="lampiran"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                                <input type="text" class="form-control" id="perihal" name="perihal"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    required>
                            </div>
                        </div>

                      
                    </div>

                        <div class="row">
                            <div class="form-group" >
                                <label for="isi_surat" class="col-sm-3 col-form-label">Isi Surat</label>
                                <textarea class="form-control" id="isi_surat" name="isi_surat"></textarea>
                            </div>
                        </div>
                      

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{route('surat.index')}}" class="btn btn-warning me-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

    
    <script>
        ClassicEditor
            .create(document.querySelector('#isi_surat'), {
                toolbar: ['bold', 'italic', 'underline', 'link', 'undo', 'redo']
               
            })
            .then(editor => {
                
                editor.editing.view.change(writer => {
                    writer.setStyle('color', 'black', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    

    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>


  
</x-layout>
