@extends('dashboard.layout')

@section('title', 'Account | ')

@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Akun</li>
@stop

@section('content')
<div class="card card-accent-blue">
    <div class="card-header">Akun</div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12">
            <a href="{{route('accounts.create')}}"><button class="btn btn-succcess"> Tambah Akun</button></a>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12">
                <table class="table" id="accounts-table">
                    <thead>
                        <tr>
                            <th>Nomor Akun</th>
                            <th>Nama</th>
                            <th>Normal Balance</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('additional-scripts')

<script>
    $(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $('#accounts-table').DataTable({
            processing:true,
            serverSide:true,
            ajax:'{{ route('accounts.getAccountsDatatable') }}',
            columns: [
                { data: 'account_number', name: 'account_number' },
                { data: 'name', name: 'name' },
                { data: 'normal_balance', name: 'normal_balance' },
            ],
            responsive: {
                breakpoints: [
                    { name: 'desktop', width: Infinity },
                    { name: 'tablet',  width: 1024 },
                    { name: 'fablet',  width: 768 },
                    { name: 'phone',   width: 480 }
                ]
            },
            pagingType: "numbers",
        });
    });
</script>
@endsection
