@extends('layouts.app')

@push('css')
    <link href="{{ asset('css/list_new.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        {{-- バリデーションエラーの場合に表示  --}}
        @include('common.errors')
        <div class="card-header">
            <h2>
                <i class="fas fa-address-card"></i>
                {{ $listing->title }}
            </h2>
        </div>
        <form class="card-body" action="{{ route('card.store', ['list_id' => $listing->id]) }}" accept-charset="UTF-8" data-remote="true" method="post">
            @csrf
            <input type="hidden" name="list_id" value="{{ $listing->id }}">
            <div class="form-group">
                <label for="card_title">タイトル</label>
                <input id="card_title" autofocus="autofocus" class="form-control" placeholder="カード名" type="text" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="card_memo">メモ</label>
                <textarea id="card_memo" autofocus="autofocus" class="form-control" placeholder="詳細" name="content">{{ old('content') }}</textarea>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-3 col-sm-6"> 
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-plus"></i> 作成
                    </button> 
                </div>
            </div>
        </form>
    </div>
@endsection