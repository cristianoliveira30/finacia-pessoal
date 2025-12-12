<x-layouts.report>
    @php
        $tableConfig = [
            'id' => 'frameworks-table',

            'columns' => [
                [
                    'key' => 'name',
                    'label' => 'Nome',
                ],
                [
                    'key' => 'release_date',
                    'label' => 'Data de Lançamento',
                    'type' => 'date',
                    'date_format' => 'DD/MM/YYYY', // bate com "25/09/2021"
                ],
                [
                    'key' => 'downloads',
                    'label' => 'Quantidade de Downloads',
                ],
                [
                    'key' => 'usabilidade',
                    'label' => 'Usabilidade',
                ],
            ],

            // Linhas fake só pra visualização
            'rows' => [
                [
                    'name' => 'Flowbite',
                    'release_date' => '25/09/2021',
                    'downloads' => 269000,
                    'usabilidade' => '49%',
                ],
                [
                    'name' => 'React',
                    'release_date' => '24/05/2013',
                    'downloads' => 4500000,
                    'usabilidade' => '24%',
                ],
                [
                    'name' => 'Angular',
                    'release_date' => '20/09/2010',
                    'downloads' => 2800000,
                    'usabilidade' => '17%',
                ],
                [
                    'name' => 'Vue.js',
                    'release_date' => '12/02/2014',
                    'downloads' => 3600000,
                    'usabilidade' => '30%',
                ],
                [
                    'name' => 'Svelte',
                    'release_date' => '26/11/2016',
                    'downloads' => 1200000,
                    'usabilidade' => '57%',
                ],
                [
                    'name' => 'jQuery',
                    'release_date' => '28/01/2006',
                    'downloads' => 6000000,
                    'usabilidade' => '5%',
                ],
                [
                    'name' => 'Bootstrap',
                    'release_date' => '19/08/2011',
                    'downloads' => 1800000,
                    'usabilidade' => '12%',
                ],
                [
                    'name' => 'Tailwind CSS',
                    'release_date' => '01/11/2017',
                    'downloads' => 2200000,
                    'usabilidade' => '65%',
                ],
                [
                    'name' => 'Next.js',
                    'release_date' => '25/10/2016',
                    'downloads' => 2300000,
                    'usabilidade' => '45%',
                ],
                [
                    'name' => 'Alpine.js',
                    'release_date' => '02/11/2019',
                    'downloads' => 300000,
                    'usabilidade' => '70%',
                ],
            ],
        ];
    @endphp

    <x-layouts.export-table :config="$tableConfig" />
</x-layouts.report>
