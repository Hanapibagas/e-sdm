@extends('master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Semua Data pengunjung</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>waktu</th>
                                <th>Nama</th>
                                <th>alamat</th>
                                <th>Keterangan</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku_tamu as $key => $tamu)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tamu->waktu }}</td>
                                    <td>{{ $tamu->nama }}</td>
                                    <td>{{ $tamu->alamat }}</td>
                                    <td>{!! $tamu->keterangan !!}</td>
                                    <td>
                                        <form action="{{ route('delete-bukutamu', $tamu->id) }}" method="post">
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
            <div class="d-flex">
                {!! $buku_tamu->links() !!}
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
