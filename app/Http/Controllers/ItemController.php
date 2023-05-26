<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use Illuminate\Auth\RequestGuard;
use Whoops\Run;

class ItemController extends Controller
{
    // public function create()
    // {
    //     $script = "<script>window.alert('hello world')</script>";
    //     return view('posts.create',compact(
    //         'script'
    //     ));
    // }

    // {{ $script }} // エスケープされるためalertは実行されない
    // {{!! $script !!}} // ちなみに両端「!!」の場合は、alertが実行されますので注意です


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sortable()
    {
        $posts = Item::sortable()->get(); //sortable() を先に宣言
        return view('item.index')->with('posts', $posts);
    }
    /**
     * 商品一覧
     */
    public function index(Request $request)
    {

        // $items = Item
        //     ::where('items.status', 'active')
        //     ->select()
        //     ->get();

        // return view('item.index', compact('items'));
        // 商品一覧取得 検索機能
        $search = $request->input('search');
        $query = Item::query();
        if ($search) {
            $query->where('name','like', '%'.$search.'%');
            $query->orwhere('id','like', '%'.$search.'%');
            $query->orwhere('type_id','like', '%'.$search.'%');
            $query->orwhere('detail','like', '%'.$search.'%');
        }

        $items = $query->sortable()->paginate(10)->appends([
            'search'=>$search,
            'sort'=>$request->input('sort'),
            'direction'=>$request->input('direction')
        ]);

        return view("item.index" , [
            "items" => $items,
        ]);
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'type_id' => $request->type_id,
                'detail' => $request->detail,
                'price' => $request->price,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    // public function search(Request $request)
    // {
    //     //検索機能
    //     $Items = Item::orderBy("created_at" , "asc")->paginate(20);
    //     $search = $request->input('search');
    //     $query = Item::query();
    //     if ($search) {
    //         $query->where('name','like', '%'.$search.'%');
    //         $query->orwhere('id','like', '%'.$search.'%');
    //         $query->orwhere('content','like', '%'.$search.'%');
    //         $query->orwhere('price','like', '%'.$search.'%');
    //         $query->orwhere('detail','like', '%'.$search.'%');
    //     }
    //     $Items = $query->paginate(20);
        
    //     return view("items.items" , [
    //         "items" => $Items,
    //     ]);
    // }
// 編集画面への遷移
    public function edit($id)
    {
        $item = Item::find($id);
        return view("item.edit" ,  [
            "item" => $item,
        ]);
    }
// 編集処理
    public function update(Request $request , $id)
    {
        $Items = Item::find($id);
        $Items -> name =$request -> name;
        $Items -> type_id = $request -> type_id;
        $Items -> price = $request -> price;
        $Items -> detail = $request -> detail;
        $Items -> save();
           
        return redirect('/items');
    }

   /**
        * 削除処理
        *
        * @param Request $request
        * @param Item $Items
        * @return Response
        */
        public function delete(Request $request,$id )
        {
            $item = Item::find($id);
            $item->delete();
            return redirect('/items');
        }

       //注文画面に遷移
        public function order($id)
        {
            $item = Item::find($id);
            return view("item.request" ,  [
                "item" => $item,
            ]);
        }

        // 注文処理
        public function request(Request $request ,$id)
        {
            $Items = Item::find($id);

                // 注文登録(カートに入れる)
                \App\Models\Request::create([
                    'user_id' => Auth::id(),
                    'name' => $request->name,
                    'type_id' => $request->type_id,
                    'detail' => $request->detail,
                    'price' => $request->price,
                    'count' => $request->count,
                    ]);
    
                return redirect('/items');
            }
    
    ////////////////////*** 注文一覧////////////////////////////

    public function order_history(Request $request)
    {

        // $items = Item
        //     ::where('items.status', 'active')
        //     ->select()
        //     ->get();

        // return view('item.index', compact('items'));
        // 注文一覧取得 検索機能
        $search = $request->input('search');
        $query = \App\Models\Request::select(['requests.*','users.name as username'])
        ->join('users','users.id','=','requests.user_id');
        if ($search) {
            $query->where('name','like', '%'.$search.'%');
            $query->orwhere('id','like', '%'.$search.'%');
            $query->orwhere('type_id','like', '%'.$search.'%');
            $query->orwhere('detail','like', '%'.$search.'%');
        }
        $orders = $query->paginate(10);
        


        return view("item.order_history" , [
            "orders" => $orders,
        ]);
    }

      /**
        * 削除処理
        *
        * @param Request $request
        * @param Item $Items
        * @return Response
        */
        public function order_delete(Request $request,$id )
        {
            $orders = \App\Models\Request::find($id);
            $orders->delete();
            return redirect('/items/order_history');
        }

        // 注文処理
        public function confirm(Request $request ,$id)
        {
            $item = \App\Models\Request::find($id);

                // 発注する（注文確定）
                \App\Models\Confirm::create([
                    'user_id' => Auth::id(),
                    'name' => $item->name,
                    'type_id' => $item->type_id,
                    'detail' => $item->detail,
                    'price' => $item->price,
                    'count' => $item->count,
                    ]);

                    $orders = \App\Models\Request::find($id);
                    $orders->delete();
                    return redirect('/items/order_history');
            }


        ///////////////////発注一覧/////////////////////////
        
       public function order_confirm(Request $request)
       {
   
        //    $items = Item
        //        ::where('items.status', 'active')
        //        ->select()
        //        ->get();
   
        //    return view('item.index', compact('items'));
        //    発注一覧取得 検索機能
           $search = $request->input('search');
           $query = \App\Models\Confirm::select(['confirms.*','requests.name as username'])
           ->join('requests','users.id','=','confirms.user_id');
           if ($search) {
               $query->where('name','like', '%'.$search.'%');
               $query->orwhere('id','like', '%'.$search.'%');
               $query->orwhere('type_id','like', '%'.$search.'%');
               $query->orwhere('detail','like', '%'.$search.'%');
           }
           $confirms = $query->paginate(10);
           
           return view("item.end" , [
               "confirms" => $confirms,
           ]);
       }

       
  }


