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
            @if (count($ideas) > 0)
                @foreach ($ideas as $idea)
                    {{-- Data retrive garxa data base bata   --}}
                    <div class="mt-3">
                        @include('shared.idea-card')
                    </div>
                @endforeach
            @else
                <p class="text-danger text-center mt-4 f">No result found...</p>
            @endif

            <div class="mt-4">
                {{ $ideas->withQueryString()->links() }}
            </div>

        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')


        </div>
    @endsection
