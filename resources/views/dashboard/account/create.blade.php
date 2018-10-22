@extends('dashboard.layout')

@section('title', 'Akun | ')

@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Akun</li>
@stop

@section('content')
<div class="card card-accent-blue">
    <div class="card-header">Tambah Akun</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form method="post" action="{{route('accounts.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Nomor Akun</label>
                        <input name="account_number" class="form-control {{$errors->has('account_number') ? 'is-invalid' : ''}}" type="text" placeholder="Saldo" value="{{old('account_number')}}">
                        @if ($errors->has('account_number'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('account_number') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nama Akun</label>
                        <input name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" placeholder="Saldo" value="{{old('name')}}">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Parent</label>
                        <select name="parent_id" class="form-control {{$errors->has('parent_id') ? 'is-invalid' : ''}}">
                            <option disabled {{old('parent_id') ? '' : 'selected'}}>Pilih Akun</option>

                            @foreach($accounts as $account)
                            <option value="{{$account->id}}" {{old('parent_id') == $account->id ? 'selected' : ''}}>{{$account->account_number." - ".$account->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('parent_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('parent_id') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Saldo Normal</label>
                        <select name="normal_balance" class="form-control {{$errors->has('normal_balance') ? 'is-invalid' : ''}}">
                            <option value="D"  {{old('normal_balance')=='D' ? 'selected' : '' }}>Debit</option>
                            <option value="K"  {{old('normal_balance')=='K' ? 'selected' : '' }}>Kredit</option>
                        </select>
                        @if ($errors->has('normal_balance'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('normal_balance') }}</strong>
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
