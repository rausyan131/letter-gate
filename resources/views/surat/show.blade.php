<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/lg.png') }}" />

</head>
<body>
    <div class="container mt-5">
        <div class="text-center border-bottom pb-3 mb-4">
            <h3 class="text-uppercase">Pemerintah Kota Karang Baru</h3>
            <h4>Departemen {{$nama_devisi}}</h4>
            <p>Jl. Jenderal Sudirman No.12, Langsa, Aceh</p>
            <p>Email: admin@karangbaru.go.id | Telepon: (0641) 123ublic function show(){}456</p>
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <p>Nomor Surat :  {{$surat->nomor_surat}}</p>
                <p>Perihal : {{$surat->perihal}}</p>
                <p>Lampiran : {{$surat->lampiran}}</p>
            </div>
            <div class="col-6 text-end">
                <p><strong>Tanggal:</strong> {{$surat->tanggal_surat}}</p>
            </div>
        </div>

        <div class="mb-3">
            <p>Kepada</p>
            <p>Yth {{$nama_penerima}}</p>
        </div>

        <!-- Isi Surat -->
        <div class="isi-surat mb-4">
            <p style="text-align: justify">
                {!! $surat->isi_surat !!}
            </p>
        </div>

        <!-- Penutup Surat -->
        <div class="footer-surat text-end" style="margin-top: 100px">
            <p>Hormat kami,</p>
            <div class="tanda-tangan" style="margin-top: 100px">
                <p><strong>{{$nama_pengirim}}</strong></p>
                <p><strong>Departemen {{$nama_devisi}}</strong></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
