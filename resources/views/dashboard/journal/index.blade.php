@extends('dashboard.layout')

@section('title', 'Jurnal | ')

@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Jurnal</li>
@stop

@section('content')
<div class="card card-accent-blue">
    <div class="card-header">Jurnal</div>
    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-primary">
            {!!session('message')!!}
            </div>
        @endif
        <div class="col-md-12 col-sm-12">
            <a href="{{route('journals.create')}}"><button class="btn btn-succcess"> Tambah Transaksi</button></a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-sm-12">
                <table class="table" id="incomes-table">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Akun</th>
                            <th>Debit</th>
                            <th>Kredit</th>
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
            ajax:'{{ route('journals.getJournalsDatatable') }}',
            columns: [
                { data: 'transact_date', name: 'transact_date' },
                { data: 'account_id', name: 'account_id' },
                { data: 'debt', name: 'debt' },
                { data: 'credit', name: 'credit' },
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
