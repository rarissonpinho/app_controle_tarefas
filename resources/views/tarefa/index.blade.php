<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Controle de Tarefas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center border-b mb-4 pb-2">
                        <h1 class="inline-block">
                            <strong>Tarefas</strong>
                        </h1>
                        <div class="flex float-right space-x-2">
                            <a href="{{ route('tarefa.create') }}" class="text-blue-500 hover:underline">Novo</a>
                            <a href="{{ route('tarefa.exportacao', ['extensao' => 'xlsx']) }}" class="text-blue-500 hover:underline">XLSX</a>
                            <a href="{{ route('tarefa.exportacao', ['extensao' => 'csv']) }}" class="text-blue-500 hover:underline">CSV</a>
                            <a href="{{ route('tarefa.exportacao', ['extensao' => 'pdf']) }}" class="text-blue-500 hover:underline">PDF</a>
                            <a href="{{ route('tarefa.exportar', ['extensao' => 'pdf']) }}" class="text-blue-500 hover:underline" target="_blank">PDFv2</a>
                        </div>
                    </div>

                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tarefa</th>
                                <th>Data limite conclusão</th>
                                <th>Editar / Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $t)
                                <tr>
                                    <td>{{ $t['id'] }}</td>
                                    <td>{{ $t['tarefa'] }}</td>
                                    <td>{{ date('d/m/Y', strtotime($t['data_limite_conclusao'])) }}</td>
                                    <td>
                                        <div class="flex">
                                            <a href="{{ route('tarefa.edit', $t['id']) }}" class="text-primary text-decoration-none mr-4 hover:text-blue-500 transition-colors duration-300">Editar</a>
                                            <form id="form_{{$t['id']}}" method="post" action="{{ route('tarefa.destroy', ['tarefa' => $t['id']])}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="text-primary text-decoration-none transition-colors duration-300 hover:text-red-500">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <nav class="mt-4">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                            @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                                <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : ''}}">
                                    <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
