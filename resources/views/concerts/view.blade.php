@extends('layouts.master')

@section('title', 'Search Results')
@section('page_data')
    <div class="page-data">
        <div class="concerts">
            <h1>Concerts for {{ $concerts[0]->artist->name }}</h1>
            @foreach ($concerts as $concert)
                <form action="/concerts" method="post">
                    @csrf
                    <input type="hidden" name="band" value="{{ $concerts[0]->artist->name  }}" />

                    <div class="row">
                        <div class="col">
                            {{ $concert->venue->name }}
                            <input type="hidden" name="venue_name" value="{{ $concert->venue->name}}" />

                            <br />
                            {{ $concert->venue->city->name }}
                            <input type="hidden" name="city_name" value="{{ $concert->venue->city->name }}" />,

                            {{ $concert->venue->city->stateCode ?? '' }}
                            <input type="hidden" name="state_code" value="{{ $concert->venue->city->stateCode ?? '' }}" />
                        </div>
                        <div class="col">
                            {{ DateTime::createFromFormat('d-m-Y', $concert->eventDate)->format('Y-m-d') }}
                            <input type="hidden" name="event_date"
                                value="{{ DateTime::createFromFormat('d-m-Y', $concert->eventDate)->format('Y-m-d') }}" />

                        </div>
                        <div class="col">
                            <input type="submit" value="I was there" />
                        </div>

                    </div>
                </form>
                <hr />
            @endforeach
        </div>
    </div>
@endsection
