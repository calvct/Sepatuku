<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   </head>
<body>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show m-5" role="alert">
    <div>
        {{ session()->get('success') }}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show m-5" role="alert">
    <div>
        @foreach ($errors->all() as $e)
        {{ $e }} <br>
        @endforeach
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show m-5" role="alert">
    <div>
        {{ session()->get('error') }}
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

