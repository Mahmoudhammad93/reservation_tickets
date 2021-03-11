@extends('layouts.app')
@section('content')
<categories categories="{{$categories}}" permissions="{{$permissions}}" auth_type="{{auth()->user()->type}}"></categories>
@endsection