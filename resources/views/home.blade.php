@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="card text-white bg-success" style="">
    <div class="card-body">
        <h5 class="card-title">Selamat datang di Sistem Informasi Pengajuan Kerjasama (<strong>SIKASA</strong>) Fakultas Kedokteran Universitas Warmadewa</h5>
        <p class="card-text">
            Silahkan ajukan permohonan kerjasama pada menu pengajuan
        </p>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop