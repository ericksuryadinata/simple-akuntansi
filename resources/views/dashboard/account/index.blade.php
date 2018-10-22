@extends('dashboard.layout')

@section('title', 'Income | ')

@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Rekening</li>
@stop

@section('content')
<div class="card card-accent-blue">
    <div class="card-header">Akun</div>
    <div class="card-body">
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
