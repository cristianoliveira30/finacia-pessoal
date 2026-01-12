@extends('errors::minimal')

@section('title', 'Sessão expirada')
@section('code', '419')
@section('message')
  Sua sessão expirou. <a href="{{ route('login') }}">Clique aqui para entrar novamente</a>.
@endsection
