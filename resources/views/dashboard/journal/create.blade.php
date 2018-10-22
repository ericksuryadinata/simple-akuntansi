@extends('dashboard.layout')

@section('title', 'Pemasukkan | ')

@section('breadcrumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">Pemasukkan</li>
@stop

@section('content')
<div class="card card-accent-blue">
    <div class="card-header">Tambah Pemasukkan</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form method="post" action="{{route('journals.store')}}">
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
                    <div id="reserved-form">
                        <div class="form-inline">
                            <div class="form-group mr-5">
                                <label class="mr-2">Akun</label>
                                <select name="account_id[]" class="form-control {{$errors->has('account_id') ? 'is-invalid' : ''}}">
                                    <option disabled {{old('account_id') ? '' : 'selected'}}>Pilih Akun</option>

                                    @foreach($accounts as $account)
                                    <option value="{{$account->id}}" {{old('account_id') == $account->id ? 'selected' : ''}}>{{$account->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mr-5">
                                <label class="mr-2">Debit</label>
                                <input name="debt[]" class="form-control" type="text" placeholder="Debit">
                            </div>
                            <div class="form-group mr-5">
                                <label class="mr-2">Kredit</label>
                                <input name="credit[]" class="form-control" type="text" placeholder="Kredit">
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button class="add-form"><i class="fa fa-plus"></i></button>
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

@section('additional-scripts')

<script>

$(document).ready(function () {
    $(".add-form").on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: '{{route('api.accounts')}}',
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                let option = "";
                $.each(response, function (i, v) {
                    $.each(v, function (index,value) {
                        option += "<option value="+value.id+">"+value.name+"</option>";
                    });
                });
                let lastField = $("#reserved-form div:last");
                let intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                let fieldWrapper = $("<div class=\"form-inline mt-2\" id=\"field" + intId + "\"/>");
                fieldWrapper.data("idx", intId);
                let account = "<div class=\"form-group mr-5\"><label class=\"mr-2\">Akun</label><select name=\"account_id[]\" class=\"form-control\" id=\"fieldSelect" + intId + "\"><option value=\"\">Pilih Akun</option>"+option+"</select></div>";
                let debt = "<div class=\"form-group mr-5\"><label class=\"mr-2\">Debit</label><input name=\"debt[]\" class=\"form-control\" type=\"text\" placeholder=\"Debit\"></div>";
                let credit = "<div class=\"form-group mr-5\"><label class=\"mr-2\">Kredit</label><input name=\"credit[]\" class=\"form-control\" type=\"text\" placeholder=\"Kredit\"></div>";
                let removeButton = $("<div class=\"form-group mr-5\"><button class=\"remove-form\"><i class=\"fa fa-minus\"></i></button></div>");
                removeButton.click(function(e) {
                    e.preventDefault();
                    $(this).parent().remove();
                });
                fieldWrapper.append(account);
                fieldWrapper.append(debt);
                fieldWrapper.append(credit);
                fieldWrapper.append(removeButton);
                $("#reserved-form").append(fieldWrapper);
            }
        });
    });
});

</script>

@endsection
