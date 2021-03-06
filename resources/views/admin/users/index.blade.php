@extends('layouts.app')
@section('content')
{{-- {{dd(auth()->user()->type)}} --}}
<Users users="{{$users}}" default_path="{{asset('storage/file')}}" auth_type="{{auth()->user()->type}}"></Users>
@endsection
