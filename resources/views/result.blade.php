@extends('layout')
@section('title')
{{ env('APP_NAME') }} : {{ ucwords($slug) }}
@endsection

@section('content')
@foreach ($apiData->chunk(3) as $chunk)
<div class="card-group">
    @foreach ($chunk as $data)
    <div class="card">
        <div class="card-body">
            <ttl class="card-title">{{$data->webTitle}}</ttl><br/>
            <pubDate class="card-text">Published :: <small class="text-muted"> {{ \Carbon\Carbon::parse($data->webPublicationDate)->diffForHumans() }}</small></pubDate><br/>
            <a href="{{$data->webUrl}}" target="_blank">View Detail</a>
        </div>
    </div>
    @endforeach
</div>
@endforeach
@endsection