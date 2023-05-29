@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3>Products Edit#{{$product->id}}</h3>
                <form action="/products/{{$product->id}}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$product->name)}}">
                        @if($errors->has('name'))
                        <span class="text-danger"> {{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id=""  rows="4" >{{old('description',$product->description)}}</textarea>
                        @if($errors->has('description'))
                        <span class="text-danger"> {{$errors->first('description')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" value="{{old('image')}}">
                        @if($errors->has('image'))
                        <span class="text-danger"> {{$errors->first('image')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark" >Submit</button>
                </form>
                </div>
               
            </div>
        </div>
    </div>
@endsection