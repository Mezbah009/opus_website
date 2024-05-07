@extends('front.layouts.app')

@section('content')
<h1>{{$job->designation}}</h1>
<p>{!! $job->description !!}</p>

@endsection