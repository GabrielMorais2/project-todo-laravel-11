<x-layout pageTitle="Login To-Do">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section class="create_task_section">
        <h1>Criar Tarefa</h1>
        <form>
            <div class="form_input_area" >
                <label for="title">
                    Titulo da Task
                </label>
                <input name="title" id="title" type="title" required placeholder="Digite o titulo da tarefa"/>
            </div>

            <div class="form_input_area" >
                <label for="due_date">
                    Data de Realização
                </label>
                <input type="date" id="due_date" name="due_date" required placeholder="Digite o titulo da tarefa"/>
            </div>

            <div class="form_input_area" >
                <label for="category">
                    Categoria
                </label>
                <select  name="category" id="category" required>
                    <option selected disabled value="">Selecione uma categoria</option>
                    <option value="">Valor qualquer</option>
                </select>
            </div>

            <div class="form_input_area" >
                <label for="description">
                    Descrição da tarefa
                </label>
                <textarea name="description" id="description" placeholder="Digite uma descrição para a sua tarefa"></textarea>
            </div>
        </form>
    </section>
</x-layout>
