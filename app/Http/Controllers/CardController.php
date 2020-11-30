<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Card;
use Auth;
use Validator;

class CardController extends Controller
{
    public function create($id) {
        $listing = Listing::find($id);
        return view('listings/cards/create',['listing' => $listing]);
    }

    public function store(Request $request) {
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
        $card->listing_id = $request->listing_id;
        $card->save();
        return redirect('/');
    }

    public function index() {
        $Cards = Card::orderBy('created_at', 'DESC')
        ->get();
        return redirect('/');
    }

    public function show($listing_id,$card_id) {
        $card = Card::find($card_id);
        $listing = Listing::find($card->listing_id);
        return view('listings/cards/show',['card' => $card,'listing' => $listing]);
    }

    public function edit($listing_id,$card_id) {
        $card = Card::find($card_id);
        $listing = Listing::find($listing_id);
        $listings = Listing::where('user_id', Auth::user()->id)
        ->get();

        return view('listings/cards/edit',['card' => $card,'listing' => $listing,'listings' => $listings]);
    }

    public function update(Request $request) {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , ['title' => 'required|max:255','content' => 'required|max:255' ]);
        //バリデーションの結果がエラーの場合
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $card = Card::find($request->id);
        $card->title = $request->title;
        $card->content = $request->content;
        $card->listing_id = $request->listing_id;
        $card->save();
        return redirect('/');
    }

    public function destroy($list_id,$card_id) {
        $card = Card::find($card_id)-> delete();

        return redirect('/');
    }
}