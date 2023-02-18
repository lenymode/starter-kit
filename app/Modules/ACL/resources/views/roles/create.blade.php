@extends('backend.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title "><i class="fa fa-user mr-2"></i> Create Role</span>
    </div>
    <!-- /.card-header -->
{!! Form::open(array('route' => 'roles.store','method'=>'POST','id="productForm"','name="productForm"')) !!}
<div class="card-body">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name','Name : ',['class'=>'required-star']) !!}
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('permission','Permissions : ',['class'=>'required-star']) !!}
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('roles.index') }}" class="btn btn-dark"><i class="fa fa-backward mr-1"></i>
            Back</a>
        <button type="submit" class="btn float-right btn-success"><i class="fa-solid fa-square-plus mr-1" id="saveBtn" value="create"></i>Save </button>
    </div>
    {!! Form::close() !!}
      </div>  
    </div>
</div>
@endsection

@push('scripts')
    <script>
         /*------------------------------------------
    --------------------------------------------
    Create Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
      
        $.ajax({
          data: $('#productForm').serialize(),
          url: "{{ route('permissions.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
       
              $('#productForm').trigger("reset");
              table.draw();
           
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    </script>
@endpush