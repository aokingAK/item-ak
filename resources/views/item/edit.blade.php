@extends('layouts.app')
 
@section('content')
 
 <h4 class="main_edit text-center">商品編集 商品ID:{{ $item->id }}</h4>
<div class="main_edit">
 <div class="text-center" >
    <form class=  "mx-auto" action="{{ url('/items/edit/'.$item->id) }}" method="POST">
    @csrf
  
  <div class="mb-3">
    <label class="form-label">商品名</label>
    <input type="text" class="form-control" id="" name="name" value="{{$item->name }}">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">カテゴリー</label>
      <select type="text" class="form-control" id="exampleInputPassword1" name="type_id" value="{{$item->type_id }}">
        <option value='1'>文房具</option>
        <option value='2'>洗面・風呂</option>
        <option value='3'>客室</option> 
      </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">値段</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="price" value="{{$item->price }}">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">詳細</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="detail" value="{{$item->detail }}">
  </div>


<div class="text-center text-danger">
  @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error) 
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
<input type="submit" value="更新">
</form>

 <form action="{{ url('items/delete/'.$item->id) }}" method="POST">
     {{ csrf_field() }}
     <input type="submit" id="delete-items-{{ $item->id }}"  value="削除">
 </form>
</div>
</div>
@endsection