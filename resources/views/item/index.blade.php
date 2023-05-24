@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

<div class="panel panel-default">
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   
                     <!-- 検索画面表示 -->
                     <div class="text-center">
                     <form class="search" action="/items" method="GET">
                            <input type="text" name="search">
                                <button type="submit">検索</button>
                        </form>
                        </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th scope="col">@sortablelink ('id','品番')</th>
                                <th scope="col">@sortablelink ('name','名前')</th>
                                <th scope="col">@sortablelink('type','種別')</th>
                                <th scope="col">@sortablelink('detail','詳細')</th>
                                <th scope="col">@sortablelink('price','金額')</th>      
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td scope="row">{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>{{ $item->price }}</td>    
                                    <!-- 管理者のみに表示 -->
                                    @can('admin') 
                                    <td><a class="btn btn-info" href="/items/edit/{{ $item->id }}">編集</a></td>
                                    @endcan
                                    <td><a class="btn btn-primary" href="/items/request/{{ $item->id }}">注文</a></td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            <!-- ページネート機能 -->
        {{ $items->links() }}

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
