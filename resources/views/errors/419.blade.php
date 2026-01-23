@extends('errors::minimal')

@section('title', 'Sessão expirada')
@section('code', '419')
@section('message')
  Sua sessão expirou. <a href="{{ route('login') }}">Iremos lhe redirecionar</a>.
@endsection
@section('redirect', route('login'))
<script>
  setTimeout(function() {
    window.location.href = "{{ route('login') }}";
  }, 50);
</script>
