<?php
    // http://localhost:5000/api/?sentence_min=1&sentence_max=5&paragraph=2
    // http://localhost:5000/api/?sentence_min=1&sentence_max=5&paragraph=2&html_text=1
    // http://localhost:5000/api/?sentence_min=1&sentence_max=5&paragraph=2&text=1
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
    ini_set('log_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        http_response_code(405); // Method Not Allowed
        echo json_encode(["error" => "Seules les requêtes GET sont autorisées"]);
        exit;
    }

    $required_fields = ['sentence_min', 'sentence_max', 'paragraph'];
    $optional_fields = ['html_text', 'dev', 'text']; // Ajoute 'dev' ici aussi pour tes tests
    $allowed_fields = array_merge($required_fields, $optional_fields);

    $is_valid = true;

    foreach ($required_fields as $f) {
        if (!isset($_GET[$f]) || !is_numeric($_GET[$f]) || (int)$_GET[$f] <= 0) {
            $is_valid = false;
            break;
        }
    }

    if ($is_valid) {
        foreach ($_GET as $k => $v) {
            if (!in_array($k, $allowed_fields)) {
                $is_valid = false;
                break;
            }
        }
    }

    if($is_valid){
        require_once __DIR__.'/db/FactoryDB.php';
        require_once __DIR__.'/helpers.php';

        $get = normalize($_GET);
        $results = [];

        $context = ['rows' => ''];
        $min = intval($get['sentence_min']);
        $max = intval($get['sentence_max']);
        $paragraph = intval($get['paragraph']);
        $html_text = isset($get['html_text'])? intval($get['html_text']) : 0;

        $min = $min <= 0? 1 : $min;
        $max = $max < $min ? $min + 1 : $max;
        $max = $max > 10 ? 10 : $max;
        $paragraph = $paragraph > 10? 10 : $paragraph;

        $params_db = [
            'driver' => 'Sqlite',
            'path' => __DIR__.'/data/chuck.db',
        ];
        try{
            $db = FactoryDB::initialize($params_db);

            for($i = 0; $i < $paragraph; $i++){
                $rows = [];
                $limit_params = random_int($min, $max);
                $offset_params = random_int(0, 9674 - $max);
                $sql = "SELECT content FROM posts LIMIT :limit OFFSET :offset";
                $args = [
                    'limit' => $limit_params,
                    'offset' => $offset_params
                ];
                foreach($db->query($sql, $args)->fetch() as $v){
                    $rows[] = $v->content;
                }
                $results[] = $html_text === 0? implode(' ', $rows) : sprintf('<p>%s</p>', implode(' ', $rows));
            }

            http_response_code(200);
            // --- LOGIQUE DE SORTIE POUR CURL ---
            if (isset($_GET['text']) && $_GET['text'] == '1') {
                header("Content-Type: text/plain; charset=UTF-8");
                // On sépare les paragraphes par un double saut de ligne pour la console
                echo implode("\n\n", $results) . PHP_EOL;
                die;
            }

            // --- LOGIQUE PAR DÉFAUT (JSON POUR SVELTE) ---
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode(['rows' => $results]);
            die;

        }catch(Exception $e){
            error_log($e->getMessage());
            http_response_code(500);
            echo json_encode([
                "error" => "An internal error has occurred. Please try again later.",
                "debug" => (isset($_GET['dev'])) ? $e->getMessage() : "Contactez l'admin"
            ]);
            die;
        }
    }else{
        http_response_code(400);
        echo json_encode(["error" => "Missing or invalid parameters"]);
        die;
    }
?>