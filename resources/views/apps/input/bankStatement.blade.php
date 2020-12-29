@extends('apps.layouts.main')
@section('header.title')
Better Work Indonesia | Import Bank Statement
@endsection  
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Import Statement</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Reconcile</a></li>
                    <li class="breadcrumb-item active">Import Statement</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="callout callout-info">
        <h5><i class="fas fa-info"></i> Note:</h5>
        Use <a class="btn btn-danger btn-xs" href="{{ asset('BankStatement.xlsx') }}">This</a> excel file to upload statement data. Only input number into the sheet, not formula.<br>
        Upload maximum of 100 bank statement lines at a time.
    </div>
    <div class="row">
        <div class="col-12">
            {!! Form::open(array('route' => 'statementFile.import','method'=>'POST','files'=>'true')) !!}
            @csrf
            <label for="name" class="col-sm-12 col-form-label">Bank Statement File</label>
                <div class="col-sm-12">
                    {!! Form::file('statement', null, array('placeholder' => 'Bank Statement File','class' => 'form-control')) !!}
                </div>
            <br>
            <label for="name" class="col-sm-12 col-form-label">Bank Account</label>
                <div class="col-2">
                    {!! Form::select('bank_id', [null=>'Please Select'] + $bank,[], array('class' => 'form-control')) !!}
                </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button id="register" type="submit" class="btn btn-sm btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
