@extends('master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Semua Data Kegiatan</h4>
                <a href="{{ route('create-galery') }}" class="btn btn-primary mb-3 text-white">Tambah Data kegiatan</a>
                <div class="table-responsive pt-3">
                    <table class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>foto kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galery as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="">
                                    </td>
                                    <td style="width: 50px">
                                        <form action="{{ route('delete-galery', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('edit-galery', $item->id) }}"
                                                class="btn btn-warning btn-sm text-white">Edit</a>
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
            table = $('.display').DataTable();
        })
    </script>
@endpush
