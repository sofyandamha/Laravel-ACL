@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show komda</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('komdas.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wilayah:</strong>
                {{ $komda->wilayah }}
            </div>
        </div>
    </div>
@endsection