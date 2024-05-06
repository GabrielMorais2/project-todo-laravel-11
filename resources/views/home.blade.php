<x-layout pageTitle="Inicio: To-Do">
    <x-slot:btn>

        <div class="home_button">
            <a href="{{route('logout')}}" class="btn btn-primary">
                Sair
            </a>

            <a href="{{route('task.create')}}" class="btn btn-primary">
                Criar Tarefa
            </a>
        </div>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do Dia</h2>
            <div class="graph_header_line"> </div>
            <div class="graph_header_date">
                <a href="{{route('home', ['date' => $date_prev_button])}}"><img src="/assets/images/icon-prev.png" alt=""></a>
                {{$date_as_string}}
                <a href="{{route('home', ['date' => $date_next_button])}}"><img src="/assets/images/icon-next.png" alt=""></a>
            </div>
        </div>
        <div class="graph_header-subtitle">
            Tarefas: <b>{{$undone_tasks_count}} / {{$tasks_count}}</b>
        </div>
        <div class="graph_header_placeholder">
            <div class="graph_placeholder">
                <svg id="progress_svg" width="350" height="350" viewBox="-25 -25 250 250" version="1.1" xmlns="http://www.w3.org/2000/svg" style="transform:rotate(-90deg)">
                    <circle r="90" cx="100" cy="100" fill="transparent" stroke="#e0e0e0" stroke-width="16px" stroke-dasharray="565.48px" stroke-dashoffset="0"></circle>
                    <circle id="progress_circle" r="90" cx="100" cy="100" stroke="#6143FF" stroke-width="16px" stroke-linecap="round" stroke-dashoffset="158px" fill="transparent" stroke-dasharray="565.48px"></circle>
                    <text id="progress_text" x="58px" y="108px" fill="#6143FF" font-size="40px" font-weight="bold" style="transform:rotate(90deg) translate(0px, -196px)"></text>
                </svg>
            </div>
            <div class="tasks_left_footer">
                <img src="/assets/images/icon-info.png" alt="">
                    Restam {{$undone_tasks_count}} tarefas para serem realizadas
            </div>
        </div>
    </section>

    <section class="list">
        <div class="list_header">
            <select class="list_header_select" onChange="changeTaskStatusFilter(this)">
                <option value="all_task">Todas as tarefas</option>
                <option value="task_done">Tarefas Realizadas</option>
                <option value="task_pending">Tarefas Pendentes</option>
            </select>
        </div>
        <div class="task_list">
            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach
        </div>
    </section>
    <script>
          function changeTaskStatusFilter(element) {
            showAllTasks();

            if(element.value == 'pending_task') {
                document.querySelectorAll('.task_done').forEach(function(e) {
                    e.style.display = 'none';
                });
            } else if(element.value == 'task_done'){
                document.querySelectorAll('.task_pending').forEach(function(e) {
                    e.style.display = 'none';
                });
            }
        }

        function showAllTasks() {
            document.querySelectorAll('.task').forEach(function(e) {
                e.style.display = "flex";
            });
        }
    </script>
    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{route('task.update')}}';
            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({status, taskId, _token: '{{csrf_token()}}'})
            });

            result = await rawResult.json();
            if(!result.success) {
                element.checked = !status;
            }
            location.reload();
        }
    </script>

<script>
    // Função para atualizar o valor da porcentagem
    function updatePercentage(undoneTasksCount, tasksCount) {
        let completedTasksCount = tasksCount - undoneTasksCount;
        let percentage = (completedTasksCount / tasksCount) * 100;

        if (percentage === null || completedTasksCount === undefined || completedTasksCount === 0) {
            percentage = 100; // Define o valor padrão como o total de tarefas
        }

        // Atualiza o valor da porcentagem no texto SVG
        document.getElementById('progress_text').textContent = `${percentage.toFixed()}%`;

        // Calcula o comprimento do traço do círculo de progresso
        let circleLength = 565.48; // comprimento total do círculo
        let dashoffset = circleLength - (circleLength * percentage / 100);

        // Atualiza o comprimento do traço do círculo de progresso
        document.getElementById('progress_circle').style.strokeDashoffset = dashoffset;
    }

    // Chama a função para atualizar a porcentagem quando a página carrega
    document.addEventListener('DOMContentLoaded', function() {
        let undoneTasksCount = {{$undone_tasks_count}};
        let tasksCount = {{$tasks_count}};

        updatePercentage(undoneTasksCount, tasksCount);
    });
</script>
</x-layout>


