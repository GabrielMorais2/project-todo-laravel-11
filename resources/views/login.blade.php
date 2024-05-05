<x-layout pageTitle="Login To-Do">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>

    Tela de Login
    <a href="{{route('home')}}">Ir para a home</a>
</x-layout>
