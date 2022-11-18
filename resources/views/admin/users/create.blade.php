@extends('admin.dashboard.main')

@section('content')
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
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h2>Add New User
                <a class="btn btn-primary float-end" href="{{ route('admin.users') }}"> Back</a></h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" name="product_form" id="product_form" >
                @csrf
                <h4>Basic Information</h4>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs12 col-sm-12 col-md-6 mt-2">
                        <div class="form-group">
                            <strong>Role:</strong>
                            <select name="role" id="role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="hod">HOD</option>
                                <option value="faculty">Faculty</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs12 col-sm-12 col-md-6 mt-2">
                        <div class="form-group">
                            <strong>Campus:</strong>
                            <select name="campus" id="campus" class="form-control">
                                <option value="">Select Campus</option>
                                @foreach($campus as $cmp)
                                    <option value="{{ $cmp->id }}">{{ $cmp->campus_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs12 col-sm-12 col-md-6 mt-2">
                        <div class="form-group">
                            <strong>Department:</strong>
                            <select name="department" id="department" class="form-control">
                                <option value="">Select Department</option>
                                @foreach($department as $dpt)
                                    <option value="{{ $dpt->id }}">{{ $dpt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    
                </div>
                
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary text-center">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection
{{-- @section('jscontent')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#description' ) ).catch
        ( error => {
                        console.error( error );
                    } 
        );
        ClassicEditor
            .create( document.querySelector( '#meta_description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ProductFormRequest','#product_form') !!}
@endsection --}}