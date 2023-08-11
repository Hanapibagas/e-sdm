@extends('master')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Semua Data Kritik Dan Saran</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kritik</th>
                                <th>Saran</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kritiksaran as $key => $krisan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $krisan->kritik }}</td>
                                    <td>{!! $krisan->saran !!}</td>
                                    <td>
                                        <form action="{{ route('delete-kritik', $krisan->id) }}" method="post">
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
