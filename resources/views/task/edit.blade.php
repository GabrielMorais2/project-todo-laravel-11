<x-layout pageTitle="Editar tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section class="task_section">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$task -> id}}">

            <x-form.checkbox_input checked="{{$task->is_done}}" name="is_done" label="Tarefa realizada ?"/>

            <x-form.text_input value="{{$task->title}}" name="title" label="Titulo da task" required='required' placeholder='Digite o titulo da tarefa' />

            <x-form.text_input value="{{$task->due_date}}" type="datetime-local" name="due_date" label="Data de Realização" required='required' placeholder='Digite a data para realização da tarefa' />

            <x-form.select_input name="category_id" label="Categoria" required='required' placeholder='Digite a data para realizaçã da tarefa' >
                @foreach ($categories as  $category)
                    <option value = "{{$category->id}}"
                        @if ($category->id == $task->category_id)
                            selected
                        @endif>{{$category-> title}}</option>
                @endforeach
            </x-form.select_input>

            <x-form.textarea_input value="{{$task->description}}" name="description" label="Descrição da tarefa" placeholder='Digite uma descrição para a sua tarefa' />
            <div class="form_input_area" >
                <x-form.button class="btn" type="reset" label="Resetar"/>
                <x-form.button class="btn btn-primary" type="submit" label="Atualizar Tarefa"/>
            </div>
        </form>
    </section>
</x-layout>
