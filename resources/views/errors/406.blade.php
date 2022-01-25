@extends('errors::minimal')

@section('title', __('Not Allowed'))
@section('code') <span>4</span><span>0</span><span>6</span>@endsection
@section('message', __($exception->getMessage() ?: 'Not Allowed')))
