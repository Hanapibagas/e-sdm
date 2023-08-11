@extends('master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Semua Data Pengumuman</h4>
                <a href="{{ route('create-berita') }}" class="btn btn-primary mb-3 text-white">Tambah Data Pengumuman</a>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20px">title</th>
                                <th style="width: 100px">description</th>
                                <th>photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $key => $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td style="width: 100px">{{ $item->description }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="">
                                    </td>
                                    <td style="width: 50px">
                                        <form action="{{ route('delete-berita', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('edit-berita', $item->id) }}"
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
