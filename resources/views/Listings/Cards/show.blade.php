@extends('layouts.app')

@push('css')
    <link href="{{ asset('css/card_show.css') }}" rel="stylesheet">
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
                    <a class="edit_btn" href="{{ route('card.edit', ['card_id' => $card->id,'listing_id' => $listing->id]) }}">編集する</a>
                    <form  method="POST" action="{{ route('card.destroy', ['card_id' => $card->id,'listing_id' => $listing->id]) }}" class="">
                        @method('DELETE')
                        @csrf
                        <button class="btn text-danger delete_btn" rel="nofollow">
                            削除する
                        </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection