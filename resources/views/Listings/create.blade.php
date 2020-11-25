@extends('layouts.app')


@push('css')
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endpush

@push('css')
    <link href="{{ asset('css/list_new.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        @include('common.errors')
        <!-- リスト作成フォーム -->
        <form action="{{route('listing.store')}}" method="POST" class="form-horizontal card-body">
            @csrf
            <div class="form-group"> 
            <label for="listing_title" class="col-sm-3 control-label">リスト名</label> 
            <div class="col-sm-6"> 
                <input id="listing_title" type="text" name="list_name" class="form-control" value="{{ old('list_name') }}">
            </div>
            </div>
            <div class="form-group"> 
            <div class="col-sm-offset-3 col-sm-6"> 
                <button type="submit" class="btn btn-secondary">
                    <i class="glyphicon glyphicon-plus"></i> 作成 
                </button> 
            </div>
            </div>
        </form>
    </div> 
@endsection