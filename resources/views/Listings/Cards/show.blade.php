@extends('layouts.app')

@push('css')
    <link href="{{ asset('css/card_show.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class='carddetailPage'>
        <div class="container">
            <div class="cardContents">
                <div class="cardContents_title">
                    <div>タイトル</div>
                    <h2>{{ $card->title }}</h2>
                </div>
                <div class="cardContents_memo">
                    <div>メモ</div>
                    <div>{{ $card->content }}</div>
                </div>
                <div class="cardContents_listStatus">
                    <div>リスト名</div>
                    <div>{{ $listing->title }}</div>
                </div>
                <div class="cardContents_btnArea">
                    <a class="edit_btn" href="{{ route('card.edit', ['card_id' => $card->id,'list_id' => $listing->id]) }}">編集する</a>
                    <form action="#" method="POST" class="">
                        <button class="btn text-danger delete_btn" onclick="return confirm('このカードを削除して大丈夫ですか?')" rel="nofollow" data-method="delete">
                            削除する
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection