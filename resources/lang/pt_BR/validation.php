<?php

return [
    'required' => 'O campo :attribute é obrigatório.',
    'date' => 'O campo :attribute deve ser uma data válida.',
    'before_or_equal' => 'O campo :attribute deve ser uma data igual ou anterior a hoje.',
    'max' => [
        'string' => 'O campo :attribute não pode ter mais que :max caracteres.',
    ],
    'unique' => 'O campo :attribute já está em uso.',

    'attributes' => [
        'title' => 'título',
        'author' => 'autor',
        'published_at' => 'data de publicação',
        'isbn' => 'ISBN',
        'pages' => 'número de páginas',
    ],
];
