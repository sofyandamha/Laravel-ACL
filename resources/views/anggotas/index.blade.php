@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>anggotas</h2>
            </div>
            <div class="pull-right">
                @can('anggota-create')
                <a class="btn btn-success" href="{{ route('anggotas.create') }}"> Create New anggota</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

	<br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Komda</th>
			<th>Nama</th>
			<th>jabatan</th>
			<th>Alamat</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($anggotas as $anggota)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $anggota->komdas_id }}</td>
			<td>{{ $anggota->nama }}</td>
			<td>{{ $anggota->jabatan }}</td>
			<td>{{ $anggota->alamat }}</td>
	        <td>
                <form action="{{ route('anggotas.destroy',$anggota->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('anggotas.show',$anggota->id) }}">Show</a>
                    @can('anggota-edit')
                    <a class="btn btn-primary" href="{{ route('anggotas.edit',$anggota->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('anggota-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $anggotas->links() !!}

@endsection