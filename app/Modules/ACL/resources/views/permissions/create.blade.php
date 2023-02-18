@extends('backend.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title "><i class="fa fa-user mr-2"></i> Create Permission</span>
    </div>
    <!-- /.card-header -->
{!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
<div class="card-body">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name','Name : ',['class'=>'required-star']) !!}
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('roles.index') }}" class="btn btn-dark"><i class="fa fa-backward mr-1"></i>
            Back</a>
        <button type="submit" class="btn float-right btn-success"><i class="fa-solid fa-square-plus mr-1"></i>Save </button>
    </div>
    {!! Form::close() !!}
      </div>  
    </div>
</div>
@endsection