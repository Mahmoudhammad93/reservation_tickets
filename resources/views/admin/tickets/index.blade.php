@extends('layouts.app')
@section('content')
<tickets data="{{$data}}" auth_type="{{auth()->user()->type}}" permissions="{{$permissions}}"></tickets>
@endsection
