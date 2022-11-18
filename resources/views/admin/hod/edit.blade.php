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
            <h2>Add New Product
                <a class="btn btn-primary float-end" href="{{ route('admin.hod') }}"> Back</a></h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.hod.store') }}" method="POST" enctype="multipart/form-data" name="product_form" id="product_form" >
                @csrf
                <h4>Basic Information</h4>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
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