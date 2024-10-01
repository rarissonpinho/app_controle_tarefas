<x-mail::message>
    # Olá!

    Esperamos que esteja bem. Queremos compartilhar algumas atualizações importantes sobre suas tarefas.

    ## Atualizações das Tarefas
    - **Tarefa 1:** Concluída com sucesso!
    - **Tarefa 2:** Aguardando sua revisão.
    - **Tarefa 3:** Nova tarefa atribuída a você.

    Se precisar de mais detalhes ou tiver alguma dúvida, não hesite em nos contatar.

<x-mail::button :url="''">
    Acessar Tarefas
</x-mail::button>

Atenciosamente,<br>
{{ config('app.name') }}
</x-mail::message>
