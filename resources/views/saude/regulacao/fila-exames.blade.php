<x-layouts.report :title="$tableConfig['title'] ?? 'Fila de Exames'">
    @php
        $tableConfig = [
            'id' => 'table-fila-exames',
            'columns' => [
                ['key' => 'position', 'label' => 'Pos.', 'align' => 'center'],
                ['key' => 'protocol', 'label' => 'Protocolo', 'align' => 'center'],
                ['key' => 'exam_type', 'label' => 'Tipo de Exame'],
                ['key' => 'patient_initials', 'label' => 'Paciente (Iniciais)', 'align' => 'center'],
                ['key' => 'request_date', 'label' => 'Data Solicitação', 'align' => 'center'],
                ['key' => 'waiting_days', 'label' => 'Dias em Espera', 'align' => 'center'],
                ['key' => 'priority', 'label' => 'Prioridade (Classificação)'],
                ['key' => 'status', 'label' => 'Status Atual'],
            ],
            'rows' => [
                [
                    'position' => '1', 
                    'protocol' => 'REQ-2025-8890',
                    'exam_type' => 'Ressonância Magnética (Crânio)', 
                    'patient_initials' => 'M.S.A.', 
                    'request_date' => '15/10/2025', 
                    'waiting_days' => 80, 
                    'priority' => 'Alta (Vermelho)', 
                    'status' => 'Aguardando Vaga Prestador'
                ],
                [
                    'position' => '2', 
                    'protocol' => 'REQ-2025-9102',
                    'exam_type' => 'Tomografia Computadorizada (Tórax)', 
                    'patient_initials' => 'J.C.O.', 
                    'request_date' => '20/11/2025', 
                    'waiting_days' => 45, 
                    'priority' => 'Média (Amarelo)', 
                    'status' => 'Em Análise (Regulador)'
                ],
                [
                    'position' => '3', 
                    'protocol' => 'REQ-2025-9500',
                    'exam_type' => 'Ultrassonografia Doppler', 
                    'patient_initials' => 'A.R.L.', 
                    'request_date' => '02/12/2025', 
                    'waiting_days' => 33, 
                    'priority' => 'Baixa (Verde)', 
                    'status' => 'Aguardando Agendamento'
                ],
                [
                    'position' => '4', 
                    'protocol' => 'REQ-2025-9821',
                    'exam_type' => 'Ecocardiograma', 
                    'patient_initials' => 'P.H.S.', 
                    'request_date' => '10/12/2025', 
                    'waiting_days' => 25, 
                    'priority' => 'Média (Amarelo)', 
                    'status' => 'Aprovado - Aguardando Data'
                ],
                [
                    'position' => '5', 
                    'protocol' => 'REQ-2026-0012',
                    'exam_type' => 'Ressonância Magnética (Joelho)', 
                    'patient_initials' => 'L.M.B.', 
                    'request_date' => '02/01/2026', 
                    'waiting_days' => 2, 
                    'priority' => 'Eletiva (Azul)', 
                    'status' => 'Triagem Inicial'
                ],
            ]
        ];
    @endphp
    <x-export-table :config="$tableConfig" />
</x-layouts.report>