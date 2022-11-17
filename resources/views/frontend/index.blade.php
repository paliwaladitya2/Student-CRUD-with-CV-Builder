@extends('frontend.layouts.main')
@push('title')Home @endpush

@section('content')


<div class="container-fluid brif">

	<div class="site-title main-div main-div2" align="center">
		<h1> CV builder</h1>
		<h5>For offlicial use case.</h5>
	</div>


	<div align="center">
		<p>
			We are here to help those people who wants to build there CV as fast as possible. If you need any help
			you can <a href="{{ route('contact') }}" class="contact">contact us</a>
		</p>
	</div>

	<div align="center">
		<a href="{{ route('cv_builder') }}" class="btn btn-primary">Build Now !</a>
	</div>

</div>

@include('frontend.layouts.footer')
@endsection