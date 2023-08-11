@extends('master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Semua Data Survei Pengunjung</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>email</th>
                                <th>jenis kelamin</th>
                                <th>jawaban 1</th>
                                <th>jawaban 2</th>
                                <th>jawaban 3</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_survei as $key => $survei)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $survei->nama_lengkap }}</td>
                                    <td>{{ $survei->email }}</td>
                                    <td>{{ $survei->jenis_klm }}</td>
                                    <td>{{ $survei->jawab1 }}</td>
                                    <td>{{ $survei->jawab2 }}</td>
                                    <td>{{ $survei->jawab3 }}</td>
                                    <td>
                                        <form action="{{ route('delete-survei', $survei->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm text-white">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection

@push('scripts')
    <script>
        let table;
        $(function() {
            table = $('.table').DataTable();
        })
    </script>
@endpush
