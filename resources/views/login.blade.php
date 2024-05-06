<x-layout pageTitle="Login: To-Do">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>

    <section class="task_section">
        <h1>Login</h1>
        <form method="POST" action="{{route('user.login_action')}}">
            @csrf

            <x-form.text_input type="email" name="email" label="Seu email" required='required' placeholder='Digite o seu email' />
            @error('email')
                <span class="error-message">* {{ $message }}</span>
            @enderror
            <x-form.text_input type="password" name="password" label="Sua senha" required='required' placeholder='Digite a sua senha' />
            @error('password')
                <span class="error-message">* {{ $message }}</span>
            @enderror
           <div class="form_input_area" >
                <x-form.button class="btn" type="reset" label="Limpar"/>
                <x-form.button class="btn btn-primary" type="submit" label="Login"/>
            </div>

        </form>
    </section>
</x-layout>
