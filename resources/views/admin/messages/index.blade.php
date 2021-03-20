@extends('layouts.app')
@section('content')
<Messages :messages="{{$mails}}" :new_messages="{{$new_mails}}" :count_new_msgs="{{$count_new_msg}}"></Messages>
@endsection
