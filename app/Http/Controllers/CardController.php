<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Card;
use Auth;
use Validator;

class CardController extends Controller
{
    public function create($id){
        $listing = Listing::find($id);
        return view('listings/cards/create',['listing' => $listing]);
    }

    // public function create(){
    //     $listing = Listing::find($id);
    //     return view('listings/cards/create',['listing' => $listing]);
    // }

    public function store(Request $request){
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , ['title' => 'required|max:255','content' => 'required|max:255' ]);
        //バリデーションの結果がエラーの場合
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // ここがカードの作成の処理
        $card = new Card;
        $card->title = $request->title;
        $card->content = $request->content;
        // $card->list_id = Listing::find($request->list_id)->get();
        $card->list_id = $request->list_id;
        $card->save();
        return redirect('/');
    }

    public function index() {
        $Cards = Card::orderBy('created_at', 'DESC')
        ->get();
        return redirect('/');
    }

    //     $listings = Card::where('list_id', Listing::find($id)->id)
    //         ->orderBy('created_at', 'DESC')
    //         ->get();
        // dd($listings);
        // テンプレート「listing/index.blade.php」を表示します。
        // viewのlistingsのところに$listingを入れて表示する
        // return view('listings/index', ['listings' => $listings]);
    //     return redirect('/');

    public function show($list_id,$card_id){
        $card = Card::find($card_id);
        $listing = Listing::find($card->list_id);
        return view('listings/cards/show',['card' => $card,'listing' => $listing]);
    }

    public function edit($list_id,$card_id){
        $card = Card::find($card_id);
        $listing = Listing::find($list_id);

        // どうやって単一のプロパティだけを取得できるようにする？
        // $card = Card::find($card_id);
        // $listing = Listing::find($card->list_id);
        return view('listings/cards/edit',['card' => $card,'listing' => $listing]);
    }

    public function update(){
        // $listing = Listing::orderBy('created_at', 'DESC')
        // ->get();
        // $card = Card::orderBy('created_at', 'DESC')
        // ->get();


        return redirect('/',['card' => $card,'listing' => $listing]);
    }
}