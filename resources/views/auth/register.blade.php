@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Criar Conta</h2>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Criar Conta</button>
                <p class="mt-2 text-center"><a href="{{ route('login') }}">Já tenho uma conta</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
