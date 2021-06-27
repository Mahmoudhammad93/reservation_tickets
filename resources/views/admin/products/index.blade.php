@extends('layouts.app')
@section('content')
<Products auth_type="{{auth()->user()->type}}"></Products>
@endsection
