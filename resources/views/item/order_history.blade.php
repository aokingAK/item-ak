@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>注文一覧</h1>
@stop

<div class="panel panel-default">
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    
                     <!-- 検索画面表示 -->
                     <div class="text-center">
                     <form class="search" action="/items/order_history" method="GET">
                            <input type="text" name="search">
                                <button type="submit">検索</button>
                        </form>
                        </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>注文者</th>
                                <th>名前</th>
                                <th>カテゴリー</th>
                                <th>詳細</th>
                                <th>金額</th> 
                                <th>個数</th> 
                                <th>注文日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->username }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ App\Models\Item::TYPES[$order->type_id] }}</td>
                                    <td>{{ $order->detail }}</td>
                                    <td>{{ $order->price }}</td>  
                                    <td>{{ $order->count }}</td>      
                                    <td>{{ $order->created_at }}</td>      
                                    <td>
                                        @if(Auth::user()->id ===$order->user_id)
                                         <form action="{{ url('items/order_history/delete/'.$order->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input class="btn btn-danger" type="submit" id="delete-items-{{ $order->id }}"  value="削除">
                                        </form>
                                        @endif
                                     </td>
                                     @can('admin')
                                    <td>
                                    <form action="{{ url('items/confirm/'.$order->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input class="btn btn-primary" type="submit" id="confirm-items-{{ $order->id }}"  value="発注">
                                        </form>
                                    </td> 
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            <!-- ページネート機能 -->
        {{ $orders->links() }}

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
