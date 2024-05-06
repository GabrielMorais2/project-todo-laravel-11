<x-layout pageTitle="Registra-se: To-Do">
    <x-slot name="btn">
        <a href="{{ route('login') }}" class="btn btn-primary">
            Já possui conta? Faça login
        </a>
    </x-slot>

    <section class="task_section">
        <h1>Registrar-se</h1>
        <form method="POST" action="{{ route('user.register_action') }}">
            @csrf

            <x-form.text_input name="name" label="Nome" required="required" placeholder="Digite o seu nome" :error="$errors->has('name')" />
            @error('name')
                <span class="error-message"> * {{ $message }}</span>
            @enderror

            <x-form.text_input type="email" name="email" label="Email" required="required" placeholder="Digite o seu email" :error="$errors->has('email')" />
            @error('email')
                <span class="error-message">* {{ $message }}</span>
            @enderror

            <x-form.text_input type="password" name="password" label="Senha" required="required" placeholder="Digite a sua senha" :error="$errors->has('password')" />
            @error('password')
                <span class="error-message">* {{ $message }}</span>
            @enderror

            <x-form.text_input type="password" name="password_confirmation" label="Confirme sua senha" required="required" placeholder="Confirme sua senha" :error="$errors->has('password_confirmation')" />
            @error('password_confirmation')
                <span class="error-message">* {{ $message }}</span>
            @enderror

            <div class="form_input_area">
                <x-form.button class="btn" type="reset" label="Limpar"/>
                <x-form.button class="btn btn-primary" type="submit" label="Registrar-se"/>
            </div>
        </form>
    </section>
</x-layout>
