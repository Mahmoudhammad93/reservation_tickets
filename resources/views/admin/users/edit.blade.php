@extends('layouts.app')
@section('content')
{{-- {{dd($user)}} --}}
<edit_user_form user_data="{{$user}}" permissions_data="{{$permissions}}"></edit_user_form>
@endsection
