@extends('layouts.app')

@push('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endpush



@section('content')
    <div class="topPage">
        <div class="listWrapper">
            @foreach ($listings as $listing)
                <div class="list">
                    <div class="list_header">
                        <h2 class="list_header_title">{{ $listing->title }}</h2>
                        <div class="list_header_action">
                            <form method="POST" action="{{ route('listing.destroy', ['id' => $listing->id]) }}" class="">
                                @method('DELETE')
                                @csrf
                                <button class="btn text-danger delete_btn" rel="nofollow">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <a href="{{ route('listing.edit', ['id' => $listing->id]) }}">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>
                    </div>
                    <div class="cardWrapper">
                        {{-- リスティングのidと紐づいたカードだけを表示したい --}}
                        @foreach ($listing->cards as $card)
                            <a class="cardDetail_link" href="{{ route('card.show', ['card_id' => $card->id,'listing_id' => $listing->id]) }}">
                                <div class="card">
                                    <h3 class="card_title">{{ $card->title }}</h3>
                                    <div class="card_detail is-exist"><i class="fas fa-bars"></i></div>
                                </div>
                            </a>
                        @endforeach
                        <div class="addCard">
                            <i class="far fa-plus-square"></i>
                            <a class="addCard_link" href="{{ route('card.create', ['listing_id' => $listing->id]) }}">さらにカードを追加</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
