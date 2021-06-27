@extends('layouts.app')

@section('content')
<dashboard data="{{$data}}" user_name="{{auth()->user()->first_name.' '.auth()->user()->last_name}}"></dashboard>
@endsection
