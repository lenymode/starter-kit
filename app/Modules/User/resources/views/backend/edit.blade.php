@extends('backend.layouts.app')
@push('header-css')
    {!! Html::style('/assets/backend/dist/css/bootstrap-datepicker3.css') !!}
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title "><i class="fa fa-user mr-2"></i> Edit User</span>
    </div>
    <!-- /.card-header -->
    {!! Form::open(['route'=>['users.update',($user->id)], 'method'=>'patch','id'=>'dataForm']) !!}
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('name','Name : ',['class'=>'required-star']) !!}
                    {!! Form::text('name',$user->name,['class'=>$errors->has('name')?'form-control is-invalid':'form-control required','placeholder'=>'Name']) !!}
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('email','Email : ') !!}
                    {!! Form::text('email',$user->email,['class'=>$errors->has('email')?'form-control is-invalid':'form-control','placeholder'=>'Email']) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('role','Role : ') !!}
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
            </div>

            <div class="row">  
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('address','Address : ',['class'=>'required-star']) !!}
                        {!! Form::textarea('address','',['class'=>$errors->has('address')?'form-control is-invalid':'form-control ','placeholder'=>'Permanent address','rows'=>'5']) !!}
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        {{ Form::label('photo', 'Profile Image :',['class'=>'required-star']) }}
                        <br/>
                        <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                        <div>
                            <img class="img img-responsive img-thumbnail"
                                 src="{{ (!empty($user->photo)? url('/uploads/profile/'.$user->photo):url('/assets/backend/img/photo.png')) }}" id="photoViewer"
                                 height="150" width="130">
                        </div>
                        <label class="btn btn-block btn-info btn-sm border-0">
                            <input onchange="changePhoto(this)" type="file" name="photo"
                                   style="display: none" required>
                            <i class="fa fa-image"></i> Browse
                        </label>
                    </div>
                </div>
            </div>
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class="btn btn-dark"><i class="fa fa-backward mr-1"></i>Back</a>
            <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-save"></i> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('scripts')
<script type="text/javascript">
    function changePhoto(input) {
        if (input.files && input.files[0]) {
            $("#photo_err").html('');
            var mime_type = input.files[0].type;
            if (!(mime_type == 'image/jpeg' || mime_type == 'image/jpg' || mime_type == 'image/png')) {
                $("#photo_err").html("Image format is not valid. Only PNG or JPEG or JPG type images are allowed.");
                return false;
            }
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#photoViewer').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function () {
        $('#birthDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        /********************
         VALIDATION START HERE
         ********************/
        $('#dataForm').validate({
            errorPlacement: function () {
                return false;
            }
        });
    });
</script>
@endpush