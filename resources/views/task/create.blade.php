<x-layout pageTitle="Criar tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section class="task_section">
        <h1>Criar Tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf

            <x-form.text_input name="title" label="Titulo da task" required='required' placeholder='Digite o titulo da tarefa' />

            <x-form.text_input type="datetime-local" name="due_date" label="Data de Realização" required='required' placeholder='Digite a data para realização da tarefa' />

            <x-form.select_input name="category_id" label="Categoria" required='required' placeholder='Digite a data para realizaçã da tarefa' >
                @foreach ($categories as  $category)
                    <option value = "{{$category->id}}">{{$category-> title}}</option>
                @endforeach
            </x-form.select_input>

            <x-form.textarea_input name="description" label="Descrição da tarefa" placeholder='Digite uma descrição para a sua tarefa' />
            <div class="form_input_area" >
                <x-form.button class="btn" type="reset" label="Resetar"/>
                <x-form.button class="btn btn-primary" type="submit" label="Criar Tarefa"/>
            </div>
        </form>
    </section>
</x-layout>
