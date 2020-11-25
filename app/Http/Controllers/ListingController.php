<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Card;
use Auth;
use Validator;

class ListingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // 一覧画面の表示
    public function index() {
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        // dd($listings);
        // テンプレート「listing/index.blade.php」を表示します。
        // viewのlistingsのところに$listingを入れて表示する
        // 
        // $cards = Card::find('list_id',$listings->id)
        // ->orderBy('created_at', 'DESC')
        // ->get();
        // 
        $cards = Card::orderBy('created_at', 'DESC')
        ->get();

        // 取得してからリストidで分ける方法はないか？
        // $card->list_idがリストのidになっているのでこれを使って分けられないか？
        // $listings->id = $cards->list_id
        // であるところを取得したい
        // どうやって書けばいい？

        return view('listings/index', ['listings' => $listings, 'cards'=>$cards]);
    }

    // 入力画面の表示
    public function create(){
        return view('listings/create');
    }

    // ユーザーが入力した値をデータベースに格納
    public function store(Request $request){
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , ['list_name' => 'required|max:255', ]);
        //バリデーションの結果がエラーの場合
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // dd($request->list_name);
        $listing = new Listing;
        $listing->title = $request->list_name;
        $listing->user_id = Auth::user()->id;
        // 送られてきたlist_nameと送ってきたユーザーのidを取得している？
        $listing->save();
        return redirect('/');
    }

    // 編集画面の表示
    public function edit($id){
        $listing = Listing::find($id);
        return view('listings/edit',['listing' => $listing]);
        }

        // 入力した値を編集する
        public function update(Request $request){
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , ['list_name' => 'required|max:255', ]);
        //バリデーションの結果がエラーの場合
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // dd($request->list_name);
        $listing = Listing::find($request->id);
        $listing->title = $request->list_name;
        $listing->user_id = Auth::user()->id;
        $listing->save();
        return redirect('/');
    }

    // 削除画面の表示
    // public function delete($id){
    //   $listing = Listing::find($id);
    //   return view('listings/delete',['listing' => $listing]);
    // }

    // 削除機能
    public function destroy(Request $request){
        $listing = Listing::find($request->id);
        // dd($id);
        $listing -> delete();
        return redirect('/');
    }
}
