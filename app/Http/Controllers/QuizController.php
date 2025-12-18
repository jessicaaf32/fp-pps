<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class QuizController extends Controller
{
    public array $quizzes = [
        [
            'slug' => 'sql',
            'title' => 'SQL Quiz',
            'description' => 'Test your knowledge of database, SQL queries, joins, and constraints.',
            'image' => 'img/sql.png',
        ],
        [
            'slug' => 'php',
            'title' => 'PHP Quiz',
            'description' => 'Assess your understanding of PHP syntax and core concepts.',
            'image' => 'img/php.png',
        ],
        [
            'slug' => 'laravel',
            'title' => 'Laravel Quiz',
            'description' => 'Challenge yourself on Laravel fundamentals and best practices.',
            'image' => 'img/laravel.png',
        ],
    ];
    public array $questions = [
        'sql' => [
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

        ],
        'php' =>  [
            [
                'type' => 'single',
                'question' => 'Which symbol is used to declare a variable in PHP?',
                'options' => [
                    'a' => '#',
                    'b' => '$',
                    'c' => '@',
                    'd' => '%',
                    'e' => '&',
                ],
                'correct' => ['b'],
                'points' => 10,
            ],

            [
                'type' => 'single',
                'question' => 'Which function is used to output text in PHP?',
                'options' => [
                    'a' => 'echo()',
                    'b' => 'print_text()',
                    'c' => 'output()',
                    'd' => 'write()',
                    'e' => 'display()',
                ],
                'correct' => ['a'],
                'points' => 10,
            ],

            [
                'type' => 'single',
                'question' => 'Which of the following is used to include a PHP file only once?',
                'options' => [
                    'a' => 'include()',
                    'b' => 'require()',
                    'c' => 'include_once()',
                    'd' => 'load()',
                    'e' => 'import()',
                ],
                'correct' => ['c'],
                'points' => 10,
            ],

            [
                'type' => 'single',
                'question' => 'What does PHP stand for?',
                'options' => [
                    'a' => 'Personal Home Page',
                    'b' => 'Private Hypertext Processor',
                    'c' => 'PHP Hypertext Preprocessor',
                    'd' => 'Public Hosting Platform',
                    'e' => 'Programmed HTML Processor',
                ],
                'correct' => ['c'],
                'points' => 10,
            ],

            [
                'type' => 'single',
                'question' => 'Which superglobal contains form data sent via POST?',
                'options' => [
                    'a' => '$_GET',
                    'b' => '$_REQUEST',
                    'c' => '$_FORM',
                    'd' => '$_POST',
                    'e' => '$_INPUT',
                ],
                'correct' => ['d'],
                'points' => 10,
            ],

            // ======================
            // MULTIPLE ANSWERS (6–10)
            // ======================

            [
                'type' => 'multiple',
                'question' => 'Which of the following are valid PHP data types?',
                'options' => [
                    'a' => 'Integer',
                    'b' => 'String',
                    'c' => 'Boolean',
                    'd' => 'Array',
                    'e' => 'Character',
                ],
                'correct' => ['a', 'b', 'c', 'd'],
                'points' => 10,
            ],

            [
                'type' => 'multiple',
                'question' => 'Which of the following are PHP superglobals?',
                'options' => [
                    'a' => '$_GET',
                    'b' => '$_POST',
                    'c' => '$_SESSION',
                    'd' => '$GLOBALS',
                    'e' => '$_LOCAL',
                ],
                'correct' => ['a', 'b', 'c', 'd'],
                'points' => 10,
            ],

            [
                'type' => 'multiple',
                'question' => 'Which statements can be used to include files in PHP?',
                'options' => [
                    'a' => 'include',
                    'b' => 'require',
                    'c' => 'include_once',
                    'd' => 'require_once',
                    'e' => 'import',
                ],
                'correct' => ['a', 'b', 'c', 'd'],
                'points' => 10,
            ],

            [
                'type' => 'multiple',
                'question' => 'Which of the following are valid PHP loops?',
                'options' => [
                    'a' => 'for',
                    'b' => 'foreach',
                    'c' => 'while',
                    'd' => 'loop',
                    'e' => 'do-while',
                ],
                'correct' => ['a', 'b', 'c', 'e'],
                'points' => 10,
            ],

            [
                'type' => 'multiple',
                'question' => 'Which PHP functions are used for debugging?',
                'options' => [
                    'a' => 'var_dump()',
                    'b' => 'print_r()',
                    'c' => 'debug()',
                    'd' => 'die()',
                    'e' => 'exit()',
                ],
                'correct' => ['a', 'b', 'd', 'e'],
                'points' => 10,
            ],
        ],

        'laravel' => [
            [
                'type' => 'single',
                'question' => 'Which command is used to create a new Laravel project?',
                'options' => [
                    'a' => 'laravel new',
                    'b' => 'php artisan new',
                    'c' => 'composer create-project',
                    'd' => 'php artisan install',
                    'e' => 'laravel install',
                ],
                'correct' => ['c'],
                'points' => 10,
            ],

            [
                'type' => 'single',
                'question' => 'Which file contains database connection settings?',
                'options' => [
                    'a' => 'config/app.php',
                    'b' => 'config/database.php',
                    'c' => '.env',
                    'd' => 'database.php',
                    'e' => 'artisan',
                ],
                'correct' => ['c'],
                'points' => 10,
            ],

            [
                'type' => 'single',
                'question' => 'Which Artisan command runs database migrations?',
                'options' => [
                    'a' => 'php artisan migrate',
                    'b' => 'php artisan db:run',
                    'c' => 'php artisan migrate:run',
                    'd' => 'php artisan schema',
                    'e' => 'php artisan db:migrate',
                ],
                'correct' => ['a'],
                'points' => 10,
            ],

            [
                'type' => 'single',
                'question' => 'Which Laravel feature is used to protect against CSRF attacks?',
                'options' => [
                    'a' => 'Auth middleware',
                    'b' => 'CSRF Token',
                    'c' => 'Encryption',
                    'd' => 'Session Guard',
                    'e' => 'API Middleware',
                ],
                'correct' => ['b'],
                'points' => 10,
            ],

            [
                'type' => 'single',
                'question' => 'Which directory contains Laravel Blade views?',
                'options' => [
                    'a' => 'app/views',
                    'b' => 'resources/views',
                    'c' => 'storage/views',
                    'd' => 'views/',
                    'e' => 'templates/',
                ],
                'correct' => ['b'],
                'points' => 10,
            ],

            // ======================
            // MULTIPLE ANSWERS (6–10)
            // ======================

            [
                'type' => 'multiple',
                'question' => 'Which components are part of Laravel’s MVC architecture?',
                'options' => [
                    'a' => 'Models',
                    'b' => 'Views',
                    'c' => 'Controllers',
                    'd' => 'Services',
                    'e' => 'Routes',
                ],
                'correct' => ['a', 'b', 'c'],
                'points' => 10,
            ],

            [
                'type' => 'multiple',
                'question' => 'Which Laravel features help with database interactions?',
                'options' => [
                    'a' => 'Eloquent ORM',
                    'b' => 'Query Builder',
                    'c' => 'Migrations',
                    'd' => 'Seeders',
                    'e' => 'Blade',
                ],
                'correct' => ['a', 'b', 'c', 'd'],
                'points' => 10,
            ],

            [
                'type' => 'multiple',
                'question' => 'Which of the following are valid Laravel Artisan commands?',
                'options' => [
                    'a' => 'make:controller',
                    'b' => 'make:model',
                    'c' => 'make:request',
                    'd' => 'make:service',
                    'e' => 'make:migration',
                ],
                'correct' => ['a', 'b', 'c', 'e'],
                'points' => 10,
            ],

            [
                'type' => 'multiple',
                'question' => 'Which authentication features are provided by Laravel?',
                'options' => [
                    'a' => 'Authentication scaffolding',
                    'b' => 'Authorization gates',
                    'c' => 'Policies',
                    'd' => 'Password hashing',
                    'e' => 'OAuth server',
                ],
                'correct' => ['a', 'b', 'c', 'd'],
                'points' => 10,
            ],

            [
                'type' => 'multiple',
                'question' => 'Which Laravel tools are used for caching?',
                'options' => [
                    'a' => 'Redis',
                    'b' => 'Memcached',
                    'c' => 'File cache',
                    'd' => 'Database cache',
                    'e' => 'Blade cache',
                ],
                'correct' => ['a', 'b', 'c', 'd'],
                'points' => 10,
            ],
        ]
    ];

    public function index()
    {
        return view('quiz', [
            'quizzes' => $this->quizzes,
        ]);    
    }

    public function question(string $slug, int $index)
    {
        // if (! isset($this->quizzes[$slug])) {
        //     abort(404);
        // }
        // if (! isset($this->questions[$slug][$index])) {
        //     abort(404);
        // }

        session(['question_start_time' => now()]);
        return view('questions', [
            'slug' => $slug,
            'index' => $index,
            'question' => $this->questions[$slug][$index - 1],
            'total' => count($this->questions[$slug]),
        ]);
    }

    public function answer(Request $request, string $slug, int $index)
    {
        $question = $this->questions[$slug][$index-1];

        // User answers (array)
        $userAnswers = $request->input('answer', []);
        sort($userAnswers);

        // Correct answers
        $correctAnswers = $question['correct'];
        sort($correctAnswers);

        $isCorrect = $userAnswers === $correctAnswers;

        // Time spent
        $startTime = session()->pull('question_start_time');
        $timeSpent = now()->diffInSeconds($startTime);
        
        // Calculate score
        $pointsEarned = 0;
        $timeBonus = 0;

        if ($isCorrect) {
            $basePoints = $question['points'] ?? 10;
            
            // Time Bonus Logic: Max 10 points for 2 seconds or less
            // Formula: 10 - ((seconds - 2) * 2). Minimum 0.
            if ($timeSpent <= 2) {
                $timeBonus = 10;
            } else {
                $timeBonus = max(0, 10 - (($timeSpent - 2) * 2));
            }    
            $pointsEarned = $basePoints + $timeBonus;
        }

        // Store score in session variable
        $sessionKey = "quiz_progress.$slug";
        $progress = session()->get($sessionKey, [
            'total_score' => 0,
            'total_time' => 0,
            'correct_count' => 0,
            'answers' => []
        ]);

        $progress['total_score'] += $pointsEarned;
        $progress['total_time'] += $timeSpent;
        $progress['answers'][$index] = [
            'is_correct' => $isCorrect,
            'time' => $timeSpent,
            'bonus' => $timeBonus
        ];
        if ($isCorrect) $progress['correct_count']++;

        session()->put("quiz_progress.$slug", $progress);

        return view('quiz_answer', [
            'slug' => $slug,
            'index' => $index,
            'question' => $question,
            'isCorrect' => $isCorrect,
            'userAnswers' => $userAnswers,
            'timeSpent' => $timeSpent,
            'timeBonus' => $timeBonus,
            'hasNext' => isset($this->questions[$slug][$index]),
        ]);
    }

    public function score(string $slug)
    {
        $sessionKey = "quiz_progress.$slug";
        $progress = session()->get($sessionKey);
        if (!$progress) {
            return redirect()->route('quiz');
        }

        return view('quiz_score', [
            'quiz' => collect($this->quizzes)->firstWhere('slug', $slug),
            'results' => $progress
        ]);
    }
}
