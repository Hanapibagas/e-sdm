@extends('frontend2.master')
@section('content')
    <div class="container-fluid hero-header  py-5 mb-5" style="background-color: #4B49AC ">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-10">
                    <h1 class="display-4 mb-3 animated slideInDown text-white">Survei Layanan Kepuasan Masyarakat Terhadap
                        Aplikasi E-Layanan</h1>
                    <p class="font-weight-bold ml-5 text-white"> <img width="40px" src="{{ asset('frontend/dishub.png') }}"
                            alt="">
                        DISHUB Sulawesi-Selatan
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container position-relative zindex-5 pt-5">
        <div class="row " style="padding:50px;">

            <h4>Data Diri</h4>

            <form action="{{ route('store-survei') }}" method="POST" id="form" class="needs-validation  pb-3 pb-lg-4">
                @csrf

                <div class="mb-4">
                    <label for="fn" class="form-label fs-base">Nama Lengkap <span class="text-danger">*</span>
                    </label>
                    <input type="text" id="fn" class="form-control form-control-lg" name="nama_lengkap"
                        autocomplete="off">
                    <div class="invalid-feedback">Required Field !</div>
                </div>
                <div class="mb-4">
                    <label for="fn" class="form-label fs-base">Email
                    </label>
                    <input type="email" id="fn" class="form-control form-control-lg" name="email"
                        autocomplete="off">
                    <div class="invalid-feedback">Required Field !</div>
                </div>

                <div class="mb-4">
                    <label for="fn" class="form-label fs-base">Jenis Kelamin <span class="text-danger">*</span>
                    </label>
                    <select name="jenis_klm" class="form-control form-control-lg" id="">
                        <option value="">Pilih</option>
                        <option value="laki-laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>


                <hr>

                <h4 class="mt-4">Form Pertanyaan</h4>
                <span class="mb-4">Silakan isi semua form berikut : </span>


                <div class="questions mt-5">
                    <h6>1. Bagaimana pendapat Saudara tentang kemudahan persyaratan dalam mendapatkan pelayanan? * <span
                            class="text-danger">*</span> </h6>
                    <div class="response">
                        <p> <input type="radio" value="Sangat Baik" name="jawab1" required> Sangat Baik </p>
                        <p> <input type="radio" value="Baik" name="jawab1" required> Baik </p>
                        <p> <input type="radio" value="Cukup Baik " name="jawab1" required> Cukup Baik </p>
                        <p> <input type="radio" value="Tidak Baik" name="jawab1" required> Tidak Baik </p>
                    </div>
                </div>


                <div class="questions mt-5">
                    <h6>2. Bagaimana menurut saudara tentang ketersediaan informasi yang jelas dan lengkap mengenai
                        prosedur pelayanan ? * <span class="text-danger">*</span> </h6>
                    <div class="response">
                        <p> <input type="radio" value="Sangat Baik" name="jawab2" required> Sangat Baik </p>
                        <p> <input type="radio" value="Baik" name="jawab2" required> Baik </p>
                        <p> <input type="radio" value="Cukup Baik " name="jawab2" required> Cukup Baik </p>
                        <p> <input type="radio" value="Tidak Baik" name="jawab2" required> Tidak Baik </p>
                    </div>
                </div>


                <div class="questions mt-5">
                    <h6>3. Bagaimana pendapat Saudara tentang kemudahan prosedur pelayanan? * <span
                            class="text-danger">*</span> </h6>
                    <div class="response">
                        <p> <input type="radio" value="Sangat Baik" name="jawab3" required> Sangat Baik </p>
                        <p> <input type="radio" value="Baik" name="jawab3" required> Baik </p>
                        <p> <input type="radio" value="Cukup Baik " name="jawab3" required> Cukup Baik </p>
                        <p> <input type="radio" value="Tidak Baik" name="jawab3" required> Tidak Baik </p>
                    </div>
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
