@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>komdas</h2>
            </div>
            <div class="pull-right">
                @can('komda-create')
                <a class="btn btn-success" href="{{ route('komdas.create') }}"> Create New Komda</a>
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
            <th>Wilayah</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($komdas as $komda)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $komda->wilayah }}</td>
	        <td>
                <form action="{{ route('komdas.destroy',$komda->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('komdas.show',$komda->id) }}">Show</a>
                    @can('komda-edit')
                    <a class="btn btn-primary" href="{{ route('komdas.edit',$komda->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('komda-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $komdas->links() !!}

@endsection