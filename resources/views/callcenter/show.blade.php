@extends('layout')

@section('content')
@include('callcenter.header')
<main class="container">
    <section class="bg-white my-4 p-4 border shadow-sm">
        <div class="border shadow p-3" id="cc-full-text-box">
            {!! $text !!}
        </div>
        <textarea id="cc-full-text-box-textarea" class="cc-clipboard-textarea"></textarea>
        <textarea id="cc-full-text-box-details-textarea" class="cc-clipboard-textarea">{!! $details !!}</textarea>
        <div class="row m-0 p-0 justify-content-between">
            <button type="button" class="btn cc-btn-outline-primary my-2 mt-4" onclick="copyFullText('cc-full-text-box-details-textarea', true)">Copiar os detalhes para a área de transferência</button>
            <button type="button" class="btn cc-btn-primary my-2 mt-4" onclick="copyFullText('cc-full-text-box')">Copiar todo conteúdo para área de transferência</button>
        </div>
    </section>

    <section class="bg-white my-4 p-4 border shadow-sm">
        <div class="border shadow p-3" id="cc-one-line-text-box">
            {{$oneLine}}
        </div>
        <textarea id="cc-one-line-text-box-textarea" class="cc-clipboard-textarea"></textarea>
        <div class="row m-0 p-0 justify-content-end">
            <button type="button" class="btn cc-btn-primary my-2 mt-4" onclick="copyOneLineText('cc-one-line-text-box')">Copiar todo conteúdo para área de transferência</button>
        </div>
    </section>
    @if ($invalidCall)
    <section class="my-3 shadow-sm">
        <a class="btn cc-btn-primary col-12" href="https://tsm.telium.com.br/event/new?service_id=2179610&customer_id=1253053" target="_blank">Abrir Evento</a>
    </section>
    @endif
    <section class="mb-5 shadow-sm">
        <a class="btn btn-dark col-12" href="/">Nova Chamada</a>
    </section>
</main>
@endsection

@section('css')
<link rel="stylesheet" href="/css/home.css">
<link rel="stylesheet" href="/css/show.css">
@endsection

@section('scripts')
<script src="/js/show.js"></script>
<script src="/js/home.js"></script>
@endsection