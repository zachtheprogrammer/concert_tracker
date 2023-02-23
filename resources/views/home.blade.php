@extends('layouts.master')

@section('title', 'Page Title')
@section('page_data')
    <div class="page-data">
        <div class="concerts">
            <h1>Attended Concerts</h1>
            @foreach ($concerts as $concert)
                <div class="row">
                    <div class="col">
                        {{ $concert->band }}<br />
                        {{ $concert->venue_name }}
                        <br />
                        {{$concert->city_name}} {{$concert->state_code}}
                    </div>
                    <div class="col">
                        {{$concert->event_date}}
                    </div>
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@endsection
