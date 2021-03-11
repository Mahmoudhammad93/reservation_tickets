@extends('layouts.app')
@section('content')
<create_permission user_id="{{$id}}" categories="{{$categories}}"></create_permission>
@endsection
