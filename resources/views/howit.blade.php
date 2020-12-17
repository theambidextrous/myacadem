@extends('layouts.outer')

@section('meta')
  @include('commons.outer.meta', 
  [
    'title' => 'My Academic Writer - Do my academic work ASAP! – Best Writers Do Essays less than 4 Hours',
    'desc' => 'Write my academic work for me today! – From scratch and in less than a couple of hours, our professional academic writers will do your task to score 85% or more.',
    'route' => route('howit'),
    'custom' => 'hstyle.min.css'
  ]
)
@endsection

@section('nav')
  @include('commons.outer.nav')
@endsection

@section('face')
  @include('commons.outer.howitface')
@endsection