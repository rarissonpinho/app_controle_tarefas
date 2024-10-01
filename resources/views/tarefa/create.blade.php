<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Controle de Tarefas
        </h2>
    </x-slot>
    <div>
        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="text-center border-bottom mb-4 pb-2">
                            <h1><strong>Adicionar Tarefa</strong></h1>
                        </div>
                        <form method="post" action="{{ route('tarefa.store') }}">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Tarefa</label>
                              <input type="text" class="form-control" name="tarefa">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Data limite conclusão</label>
                              <input type="date" class="form-control" name="data_limite_conclusao">
                            </div>
                            <button type="submit" class="btn btn-primary btn-dark" style="background-color: #007bff;">Cadastrar</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

