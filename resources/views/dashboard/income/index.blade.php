@extends('dashboard.layout')

@section('title', 'Pemasukkan | ')

@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Pemasukkan</li>
@stop

@section('content')
<div class="card card-accent-blue">
    <div class="card-header">Pemasukkan</div>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {!!session('success')!!}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {!!session('error')!!}
            </div>
        @endif
        <div class="col-md-12 col-sm-12">
            <a href="{{route('incomes.create')}}"><button class="btn btn-succcess"> Tambah Transaksi</button></a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-sm-12">
                <table class="table" id="incomes-table">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Akun</th>
                            <th>Saldo</th>
                            <th>Jenis</th>
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

        $('#incomes-table').DataTable({
            processing:true,
            serverSide:true,
            ajax:'{{ route('incomes.getIncomesDatatable') }}',
            columns: [
                { data: 'transact_date', name: 'transact_date' },
                { data: 'account_id', name: 'account_id' },
                { data: 'amount', name: 'amount' },
                { data: 'payment_method', name: 'payment_method' },
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
