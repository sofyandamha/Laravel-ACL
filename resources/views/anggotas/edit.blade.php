@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit anggota</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('anggotas.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('anggotas.update',$anggota->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Komda:</strong>
		            <input type="text" name="komdas_id" value="{{ $anggota->komdas_id }}" class="form-control" placeholder="Komda">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama:</strong>
		            <input type="text" name="nama" value="{{ $anggota->nama }}" class="form-control" placeholder="Nama">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Jabatan:</strong>
		            <input type="text" name="jabatan" value="{{ $anggota->jabatan }}" class="form-control" placeholder="Jabatan">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Alamat:</strong>
		            <input type="text" name="alamat" value="{{ $anggota->alamat }}" class="form-control" placeholder="Alamat">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection