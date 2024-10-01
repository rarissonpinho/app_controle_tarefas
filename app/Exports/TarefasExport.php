<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tarefa::all();
        //vamos implementar apenas as terefas com base no relacionamento estabelecido e não mais todas
        return auth()->user()->tarefas()->get();

    }

    public function headings():array {//declarando o tipo de retorno
        return [
        'ID da Tarefa',
        'Tarefa',
        'Data limite conlusão'
        ];
    }

    public function map($linha):array {
        return [
            $linha->id,
            $linha->tarefa,
            date('d/m/Y', strtotime($linha->data_limite_conclusao)),
        ];
    }
}
