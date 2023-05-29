@extends('layouts.app')
@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4]">
<div class="card p-4">
<h1>Name :: <b>{{$product->name}}</b></h1>
<h1>Description :: <b>{{$product->description}}</b></h1>
<img src="/products/{{$product->image}}" alt="image" class="rounded" width="100%">
</div>
        </div>
    </div>
</div>


@endsection