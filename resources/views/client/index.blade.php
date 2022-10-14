@extends('layouts.clientTemplate')
@section('body')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="fw-bold">Post a Task</h1>
        <p class="col-md-8">Using a series of utilities, you can create this jumbotron, just like the one in
            previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your
            liking.</p>
        <button class="btn btn-success btn-lg" type="button" href="#" data-bs-toggle="modal"
            data-bs-target="#post-question">Post a Task</button>
    </div>
</div>

@include ('client.price')

@include ('client.tasks')
@endsection