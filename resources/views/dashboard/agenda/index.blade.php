@extends('master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Semua Data Agenda</h4>
                <a href="{{ route('create-agenda') }}" class="btn btn-primary mb-3 text-white">Tambah Data Agenda</a>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <tr>
                                <th>No</th>
                                <th>Judul agenda</th>
                                <th>foto agenda</th>
                                <th>Aksi</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agenda as $key => $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td style="width: 100px">{{ $item->judul }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="">
                                    </td>
                                    <td style="width: 50px">
                                        <form action="{{ route('delete-agenda', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('edit-agenda', $item->id) }}"
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
            table = $('.table').DataTable();
        })
    </script>
@endpush
