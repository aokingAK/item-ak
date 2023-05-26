@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>発注一覧</h1>
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
                            @foreach ($confirms as $confirm)
                                <tr>
                                    <td>{{ $confirm->user_id }}</td>
                                    <td>{{ $confirm->name }}</td>
                                    <td>{{ App\Models\Item::TYPES[$confirm->type_id] }}</td>
                                    <td>{{ $confirm->detail }}</td>
                                    <td>{{ $confirm->price }}</td>  
                                    <td>{{ $confirm->count }}</td>      
                                    <td>{{ $confirm->created_at }}</td>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            <!-- ページネート機能 -->
        {{ $confirms->links() }}

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
