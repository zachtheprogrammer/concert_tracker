@extends('layouts.master')

@section('title', 'Search Results')
@section('page_data')
    <div class="page-data">
        <div class="concerts">
            <h1>Search Results</h1>
            @foreach ($bands as $band)
                <div class="row">
                    <div class="col">
                        <a href="/bands/{{$band->mbid}}">{{ $band->name }}</a><br />
                        <span>{{$band->disambiguation}}</span>
                        
                        </div>
                    
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@endsection
