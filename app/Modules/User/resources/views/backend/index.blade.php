@extends('backend.layouts.app')
@push('header-css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <span class="card-title"><i class="fa fa-users"></i> User Management</span>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="{{ route('users.create') }}"
                        class="btn btn-xm btn-success ml-1"
                        data-toggle="tooltip"
                        title="Create new user"
                        data-original-title="Create New">
                        <i class="fa-solid fa-file-circle-plus"></i> Create
                        </a>
                    </div>
                </div><!--col-->
            </div>
        </div>
    <div class="card-body">
        <div class="row mt-4">
            <div class="col">
                    {{ $dataTable->table() }} 
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    {!! Html::script('/assets/backend/js/bootstrap-datepicker.min.js') !!}

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