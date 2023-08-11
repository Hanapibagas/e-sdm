@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-12 mb-xl-0">
                    <h3 class="font-weight-bold">Selamat Datang</h3>
                    <h6 class="font-weight-normal mb-0">DI Dashboard DISHUB SULSEL
                        <span class="text-primary">Sulawesi-Selatan</span>
                    </h6>
                </div>

            </div>

        </div>
    </div>
    <div class="col-md-12 grid-margin transparent">
        <div class="row ">

            <div class="bg-primary text-white col-md-4 mb-2" style="width: 24rem; margin-button: 5px;">
                <div class="card-body">
                    <h5 class="card-title text-white">Survei</h5>
                    <h5 class="card-title text-white">{{ $survei }}</h5>
                    <p class="card-text">Semua Data Isi Survei</p>
                    <a href="{{ route('index-survei') }}" class="btn btn-light btn-sm">Selanjutnya</a>
                </div>
            </div>
            <div class="bg-primary text-white col-md-4 mb-2" style="width: 24rem; margin-button: 5px;">
                <div class="card-body">
                    <h5 class="card-title text-white">Kritik Saran</h5>
                    <h5 class="card-title text-white">{{ $kritiksaran }}</h5>
                    <p class="card-text">Semua Data Isi Kritik Saran</p>
                    <a href="{{ route('index-kritik') }}" class="btn btn-light btn-sm">Selanjutnya</a>
                </div>
            </div>
            <div class="bg-primary text-white col-md-4 mb-2" style="width: 24em; margin-button: 5px;">
                <div class="card-body">
                    <h5 class="card-title text-white">Buku Tamu</h5>
                    <h5 class="card-title text-white">{{ $bukutamu }}</h5>
                    <p class="card-text">Semua Data Isi Buku Tamu</p>
                    <a href="{{ route('index-bukutamu') }}" class="btn btn-light btn-sm">Selanjutnya</a>
                </div>
            </div>
        </div>
    </div>
@endsection
