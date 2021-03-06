@extends('layouts.outer')

@section('meta')
  @include('commons.outer.meta', 
  [
    'title' => 'My Academic Writer - Do my academic work ASAP! – Best Writers Do Essays less than 4 Hours',
    'desc' => 'Write my academic work for me today! – From scratch and in less than a couple of hours, our professional academic writers will do your task to score 85% or more.',
    'route' => route('order'),
    'custom' => null
  ]
)
@endsection

@section('nav')
  @include('commons.outer.nav')
@endsection

@section('face')
  @include('commons.outer.orderface',
  [
    'title' => 'My Academic Writer: Forget Sleepless Nights.',
    'subtitle' => 'Help Has Arrived. Hire a Pro Writer to Handle the Work for You.'
  ]
  )
@endsection

