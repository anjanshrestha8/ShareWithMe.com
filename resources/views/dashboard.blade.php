@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')

        </div>
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-idea') {{-- Ideas share Form  --}}
            <hr>
            @foreach ($ideas as $idea)
                {{-- Data retrive garxa data base bata   --}}
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
            @endforeach
            <div class="mt-4">
                {{ $ideas->links() }}
            </div>

        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')


        </div>
    @endsection
