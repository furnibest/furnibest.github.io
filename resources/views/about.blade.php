@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>About Cacam Furniture</h1>
            <p class="lead">We are passionate about creating beautiful and functional furniture for your home.</p>
            <p>Since our establishment, we have been dedicated to providing high-quality furniture that combines style, comfort, and durability. Our team of skilled craftsmen and designers work tirelessly to create pieces that will enhance your living space.</p>
            <p>At Cacam Furniture, we believe that every home deserves beautiful furniture that reflects the personality and lifestyle of its inhabitants. That's why we offer a wide range of styles, from classic to contemporary, to suit every taste and preference.</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/about.png') }}" class="img-fluid rounded" alt="Our Workshop">
        </div>
    </div>

   
</div>
@endsection 