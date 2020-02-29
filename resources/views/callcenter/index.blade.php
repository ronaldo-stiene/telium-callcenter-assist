@extends('layout')

@section('content')
@include('callcenter.header')
<main class="container">
    <section class="row justify-content-between m-0 p-0 my-4">
        <button class="btn cc-btn-primary align-self-left invisible" id="cc-normal-call-btn" type="button">Chamada Normal</button>
        <button class="btn cc-btn-primary align-self-right" id="cc-invalid-call-btn" type="button">Chamada por Engano</button>
    </section>

    @include('callcenter.form.normal')

    @include('callcenter.form.invalid')
    
    <section class="mb-5 shadow-sm">
        <button class="btn btn-dark col-12" data-toggle="modal" data-target="#cc-end-call">Finalizar Chamada</button>
    </section>

    <div class="modal fade" id="cc-end-call" tabindex="-1" role="dialog" aria-labelledby="cc-end-call-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header cc-bg-primary text-white">
                    <h5 class="modal-title" id="cc-end-call-label">Atenção!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Tem certeza que deseja finalizar a chamada sem documentá-la?</span>
                </div>
                <div class="modal-footer cc-bg-primary text-white">
                    <a href="/" class="btn btn-light">Sim, pode finalizar</a>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Não! Cliquei errado</button>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@section('css')
<link rel="stylesheet" href="/css/home.css">
@endsection

@section('scripts')
<script src="/js/invalidCallsTexts.js"></script>
<script src="/js/homeForms.js"></script>
<script src="/js/inputMask.js"></script>
@endsection