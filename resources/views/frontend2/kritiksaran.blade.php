@extends('frontend2.master')
@section('content')
    <div class="container-fluid hero-header py-5 mb-5" style="background-color: #4B49AC">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown text-white">Kritik dan Saran</h1>
                    <p class="font-weight-bold ml-5 text-white"> <img width="40px" src="{{ asset('frontend/dishub.png') }}"
                            alt="">
                        DISHUB Sulawesi-Selatan
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="container position-relative zindex-5 pt-2">
        <div class="row " style="padding:50px;">



            <form action="{{ route('store-kritik') }}" method="POST" id="form" class="needs-validation  pb-3 pb-lg-4">
                @csrf

                <div class="mb-4">
                    <label for="fn" class="form-label fs-base">Kritik
                    </label>
                    <input type="text" id="fn" class="form-control form-control-lg" name="kritik">
                    <div class="invalid-feedback">Required Field !</div>
                </div>

                <div class="mb-4">
                    <label for="fn" class="form-label fs-base">Saran
                    </label>
                    <textarea name="saran" id="editor" cols="30" rows="10" name="keterangan" placeholder="silahkan isi saran"
                        class="form-control form-control-lg" autocomplete="off"></textarea>

                    <div class="invalid-feedback">Required Field !</div>
                </div>

                <div class="alert alert-warning" role="alert">
                    <p class="mb-0">Perhatian, Pastikan semua isian telah diisi.</p>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn text-white" style="background-color: #4B49AC"> Kirim Jawaban </button>
                </div>
            </form>
        </div>
    </div>
@endsection
