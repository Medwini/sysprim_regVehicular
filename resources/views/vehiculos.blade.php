@extends('layouts.app')

@section('title', 'Sysprim - Vehiculos')

@section('content')
    <nav class="navbar sticky-top navbar-light bg-light">
        <div class="container-fluid">
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-up" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#009988" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2c.641 0 1.212 .302 1.578 .771" />
                <path d="M20.136 11.136l-8.136 -8.136l-9 9h2v7a2 2 0 0 0 2 2h6.344" />
                <path d="M19 22v-6" />
                <path d="M22 19l-3 -3l-3 3" />
                </svg>
            </a>
            <a href="/marcas" class="btn btn-outline-info me-2 fw-bold">Marcas</a>
            <a href="/modelos" class="btn btn-outline-info me-2 fw-bold">Modelos</a>
        </div>
    </nav>
    <livewire:vehiculos />
@endsection