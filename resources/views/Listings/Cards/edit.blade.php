@extends('layouts.app')

@push('css')
    <link href="{{ asset('css/list_new.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        <!-- バリデーションエラーの場合に表示 --> 
        @include('common.errors')
        <div class="card-header">
            <h2>
                <i class="fas fa-address-card"></i>
                {{ $listing->title }}
            </h2>
        </div>
        <form class="card-body" id="edit_card" action="{{ route('card.update', ['card_id' => $card->id,'list_id' => $listing->id]) }}" accept-charset="UTF-8" method="post">
            @method('PATCH')
            @csrf
            {{-- PATCHメソッド追加 --}}
            <input type="hidden" name="id" value="{{$card->id}}">
            <div class="form-group">
                <label for="card_title">タイトル</label>
                <input class="form-control" placeholder="カード名" type="text" value="{{ old('title',$card->title) }}" name="title">
            </div>
            <div class="form-group">
                <label for="card_memo">メモ</label>
                <textarea class="form-control" placeholder="詳細" name="content">{{ old('content', $card->content) }}</textarea>
            </div>
            <div class="form-group">
                <label>リスト名</label>
                <select class="form-control" name="list_id">
                {{-- 自分の他のリストを表示する処理--}}
                @foreach ($listings as $listing)
                    @if(old('list_id', $card->list_id) == $listing->id)
                        <option value="{{ $listing->id }}" selected>{{ $listing->title }}</option>
                    @else
                        <option value="{{ $listing->id }}">{{ $listing->title }}</option>
                    @endif
                @endforeach
                {{-- @foreach ($listings as $listing)
                    <option  value="{{ $listing->id }}">{{ $listing->title }}</option>
                @endforeach --}}
                </select>
            </div>
            <div class="text-center"><input type="submit" name="commit" value="更新する" class="btn btn-secondary" data-disable-with="更新する"></div>
        </form>
    </div>
@endsection