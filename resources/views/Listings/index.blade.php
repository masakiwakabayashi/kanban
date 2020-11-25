@extends('layouts.app')

@push('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endpush

@push('css')
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="topPage">
        <div class="listWrapper">
            @foreach ($listings as $listing) 
            <div class="list">
                <div class="list_header">
                    <h2 class="list_header_title">{{ $listing->title }}</h2>
                    <div class="list_header_action">
                            {{-- <a onclick="return confirm('{{ $listing->title }}を削除して大丈夫ですか？')" 
                            href="{{route('listing.destroy',['id'=>$listing->id])}}"
                            method="POST">
                                <i class="fas fa-trash"></i>
                            </a>  --}}
                        <a href="{{route('listing.destroy',['id'=>$listing->id])}}">
                            <i class="fas fa-trash"></i>
                        </a>
                        <a href="{{route('listing.edit',['id'=>$listing->id])}}">
                            <i class="fas fa-pen"></i>
                        </a>
                    </div>
                </div>
                <div class="cardWrapper">
                    {{-- リスティングのidと紐づいたカードだけを表示したい --}}
                    @foreach ($cards as $card)
                        @if($card->list_id === $listing->id)
                        <a class="cardDetail_link" href="{{ route('card.show', ['card_id' => $card->id,'list_id' => $listing->id]) }}">
                            <div class="card">
                                <h3 class="card_title">{{ $card->title }}</h3>
                                {{-- <h3 class="card_title">{{ $card->content }}</h3>
                                <h3 class="card_title">{{ $card->id }}</h3> --}}
                                <div class="card_detail is-exist"><i class="fas fa-bars"></i></div>
                            </div>
                        </a>
                        @endif
                    @endforeach
                    <div class="addCard">
                        <i class="far fa-plus-square"></i>
                        <a class="addCard_link" href="{{ route('card.create', ['list_id' => $listing->id]) }}">さらにカードを追加</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
