@extends('dashboard.layout')

@section('title', 'Pengeluaran | ')

@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Pengeluaran</li>
@stop

@section('content')
<div class="card card-accent-blue">
    <div class="card-header">Tambah Pengeluaran</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form method="post" action="{{route('outcomes.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="transact_date" class="form-control {{$errors->has('transact_date') ? 'is-invalid' : ''}}" placeholder="Tanggal Transaksi" value="{{old('transact_date')}}">
                        @if ($errors->has('transact_date'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('transact_date') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Akun</label>
                        <select name="account_id" class="form-control {{$errors->has('account_id') ? 'is-invalid' : ''}}">
                            <option disabled {{old('account_id') ? '' : 'selected'}}>Pilih Akun</option>

                            @foreach($accounts as $account)
                            <option value="{{$account->id}}" {{old('account_id') == $account->id ? 'selected' : ''}}>{{$account->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('account_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('account_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Saldo</label>
                        <input name="amount" class="form-control {{$errors->has('amount') ? 'is-invalid' : ''}}" type="text" placeholder="Saldo" value="{{old('amount')}}">
                        @if ($errors->has('amount'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select name="payment_method" class="form-control {{$errors->has('payment_method') ? 'is-invalid' : ''}}">
                            <option value="D"  {{old('payment_method')=='D' ? 'selected' : '' }}>Debit</option>
                            <option value="K"  {{old('payment_method')=='K' ? 'selected' : '' }}>Kredit</option>
                        </select>
                        @if ($errors->has('payment_method'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('payment_method') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="text-right">
                      <button class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@stop
