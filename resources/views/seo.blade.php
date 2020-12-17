@extends('layouts.outer')

@section('meta')
  @include('commons.outer.meta', 
  [
    'title' => 'My Academic Writer - Do my academic work ASAP! – Best Writers Do Essays less than 4 Hours',
    'desc' => 'Write my academic work for me today! – From scratch and in less than a couple of hours, our professional academic writers will do your task to score 85% or more.',
    'route' => $route,
    'custom' => null
  ]
)
@endsection

@section('nav')
  @include('commons.outer.nav')
@endsection

@section('face')
  @include('commons.outer.face',
  [
    'title' => $title,
    'subtitle' => $subtitle
  ]
  )
@endsection


@section('howitworks')
  @include('commons.outer.howitworks')
@endsection

@section('team')
  @include('commons.outer.team')
@endsection

@section('hrprocess')
  @include('commons.outer.hrprocess', [
    'title' => 'How We Hire New Team Members'
  ])
@endsection

@section('popular')
  @include('commons.outer.popular')
@endsection

@section('testimony')
  @include('commons.outer.testimony')
@endsection

@section('label')
    @include('commons.outer.label')
@endsection

@section('seofake')
    @include('commons.outer.seofake')
@endsection