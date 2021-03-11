@extends('layouts.app')
@section('content')
{{-- {{dd($user)}} --}}
<edit_user_form user_data="{{$user}}" permissions_data="{{$permissions}}" permission_id="{{$permission_id->id}}"></edit_user_form>
@endsection
