<x-layout>

    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">
            Criar Tarefa
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do Dia</h2>
            <div class="graph_header_line"> </div>
            <div class="graph_header_date">
                <img src="/assets/images/icon-prev.png" alt="">
                13 de Dez
                <img src="/assets/images/icon-next.png" alt="">
            </div>
        </div>
        <div class="graph_header-subtitle">
            Tarefas: <b>3/6</b>
        </div>
        <div class="graph_placeholder">

        </div>
        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png" alt="">
                Restam 3 tarefas para serem realizadas
        </div>

    </section>

    <section class="list">
        <div class="list_header">
            <select class="list_header_select">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task_list">
            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach
        </div>
    </section>
</x-layout>
