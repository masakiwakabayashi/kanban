@extends('layouts.app')

@push('css')
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endpush

@push('css')
    <link href="{{ asset('css/list_new.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        <!-- バリデーションエラーの場合に表示 -->
        @include('common.errors')
        <form action="" method="POST" class="form-horizontal card-body">
            @method('PATCH')
            @csrf
            <div class="form-group"> 
                <label for="listing_name" class="col-sm-3 control-label">リスト名</label> 
                <div class="col-sm-6"> 
                    <!-- リスト名 -->
                    <input id="listing_name" type="text" name="list_name"
                        value="{{ old('list_name', $listing->title) }}" class="form-control"> 
                </div>
                <input type="hidden" name="id" value="{{ old('id', $listing->id) }}"> 
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6"> 
                <button type="submit" class="btn btn-secondary">
                    <i class="fas fa-edit"></i> 更新
                </button> 
                </div>
            </div>
        </form>
    </div>
@endsection
