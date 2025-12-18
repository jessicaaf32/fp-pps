<?php

return [

    // ======================
    // SINGLE ANSWER (1–5)
    // ======================

    [
        'type' => 'single',
        'question' => 'Which SQL statement is used to retrieve data from a database?',
        'options' => [
            'a' => 'GET',
            'b' => 'SELECT',
            'c' => 'FETCH',
            'd' => 'RETRIEVE',
            'e' => 'PULL',
        ],
        'correct' => ['b'],
        'points' => 10,
    ],

    [
        'type' => 'single',
        'question' => 'Which clause is used to filter records in a SELECT statement?',
        'options' => [
            'a' => 'ORDER BY',
            'b' => 'GROUP BY',
            'c' => 'WHERE',
            'd' => 'HAVING',
            'e' => 'FILTER',
        ],
        'correct' => ['c'],
        'points' => 10,
    ],

    [
        'type' => 'single',
        'question' => 'Which SQL keyword is used to remove duplicate rows from a result set?',
        'options' => [
            'a' => 'UNIQUE',
            'b' => 'ONLY',
            'c' => 'DISTINCT',
            'd' => 'REMOVE',
            'e' => 'FILTER',
        ],
        'correct' => ['c'],
        'points' => 10,
    ],

    [
        'type' => 'single',
        'question' => 'Which SQL command is used to add a new row to a table?',
        'options' => [
            'a' => 'ADD',
            'b' => 'CREATE',
            'c' => 'INSERT',
            'd' => 'UPDATE',
            'e' => 'APPEND',
        ],
        'correct' => ['c'],
        'points' => 10,
    ],

    [
        'type' => 'single',
        'question' => 'Which function is commonly used to count rows in SQL?',
        'options' => [
            'a' => 'TOTAL()',
            'b' => 'SUM()',
            'c' => 'COUNT()',
            'd' => 'ROWS()',
            'e' => 'NUMBER()',
        ],
        'correct' => ['c'],
        'points' => 10,
    ],

    // ======================
    // MULTIPLE ANSWERS (6–10)
    // ======================

    [
        'type' => 'multiple',
        'question' => 'Which of the following are valid SQL data types?',
        'options' => [
            'a' => 'INT',
            'b' => 'VARCHAR',
            'c' => 'BOOLEAN',
            'd' => 'FLOAT',
            'e' => 'OBJECT',
        ],
        'correct' => ['a', 'b', 'c', 'd'],
        'points' => 10,
    ],

    [
        'type' => 'multiple',
        'question' => 'Which SQL statements are Data Manipulation Language (DML)?',
        'options' => [
            'a' => 'SELECT',
            'b' => 'INSERT',
            'c' => 'UPDATE',
            'd' => 'DELETE',
            'e' => 'CREATE',
        ],
        'correct' => ['a', 'b', 'c', 'd'],
        'points' => 10,
    ],

    [
        'type' => 'multiple',
        'question' => 'Which clauses can be used with GROUP BY?',
        'options' => [
            'a' => 'WHERE',
            'b' => 'HAVING',
            'c' => 'ORDER BY',
            'd' => 'LIMIT',
            'e' => 'JOIN',
        ],
        'correct' => ['b', 'c'],
        'points' => 10,
    ],

    [
        'type' => 'multiple',
        'question' => 'Which of the following JOIN types exist in SQL?',
        'options' => [
            'a' => 'INNER JOIN',
            'b' => 'LEFT JOIN',
            'c' => 'RIGHT JOIN',
            'd' => 'FULL JOIN',
            'e' => 'SIDE JOIN',
        ],
        'correct' => ['a', 'b', 'c', 'd'],
        'points' => 10,
    ],

    [
        'type' => 'multiple',
        'question' => 'Which SQL constraints help ensure data integrity?',
        'options' => [
            'a' => 'PRIMARY KEY',
            'b' => 'FOREIGN KEY',
            'c' => 'UNIQUE',
            'd' => 'CHECK',
            'e' => 'INDEX',
        ],
        'correct' => ['a', 'b', 'c', 'd'],
        'points' => 10,
    ],

];
