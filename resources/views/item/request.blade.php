@extends('layouts.app')
 
@section('content')
 
 <h4>商品編集 商品ID:{{ $item->id }}</h4>
<div class="hidden-center main_request">
    <form class=  "mx-auto" action="{{ url('/items/request/'.$item->id) }}" method="POST">
    @csrf
    <!-- <div class="col-md-6">
        <input type="hidden" class="form-control" id="" name="name" value="{{$item->name }}">
    </div>
    <div>
        <input type="hidden" class="form-control" id="" name="tel" value="{{$item->tel }}">
    </div>
    <div>
        <input type="hidden" class="form-control" id="" name="email" value="{{$item->email }}">
    </div>
</div> -->
<div class="mb-3">
    品番: {{$item->id }}
    <input type="hidden" class="form-control" id="" name="id" value="{{$item->id }}">
  </div>

  <div class="mb-3">
    商品名: {{$item->name }}
    <input type="hidden" class="form-control" id="" name="name" value="{{$item->name }}">
  </div>

  <div class="mb-3">
    カテゴリー: {{$item->type_id }}
    <input type="hidden" class="form-control" id="exampleInputPassword1" name="type_id" value="{{$item->type_id }}">
  </div>

  <div class="mb-3">
   値段: {{$item->price }}
    <input type="hidden" class="form-control" id="exampleInputPassword1" name="price" value="{{$item->price }}">
  </div>

  <div class="mb-3">
   セット内容: {{$item->detail }}
    <input type="hidden" class="form-control" id="exampleInputPassword1" name="detail" value="{{$item->detail }}">
  </div>

  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">個数</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="count" value="1">
  </div>



<div class="hidden-center">
<input type="submit" value="注文">
</form>

</div>

@endsection