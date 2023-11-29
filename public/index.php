<?php
    require_once '../backend/db/FactoryDB.php';


    if(!empty($_GET)){
        $db = FactoryDB::initialize([
            'driver' => 'Sqlite',
            'path' => '../backend/db.sqlite3',
        ]);
        $debug = [];
        $results = [];
        for($i = 0; $i < $_GET['paragraphe']; $i++){
            $row = "";
            $mask = "
                SELECT
                    content
                FROM
                    posts
                LIMIT
                    %s
                OFFSET
                    %s
            ";

            $param = [
                mt_rand(5, 10),
                mt_rand(1, 9600),
            ];
            $sql = vsprintf($mask, $param);
            $q = $db->query($sql);
            $r = $q->fetch();

            foreach ($r as $v) {
                $row .= ' '.$v->content;
            }
            $results[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width,initial-scale=1'>

	<title>Chuck ipsum</title>

	<link rel='icon' type='image/png' href='/favicon.png'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.8.1/dist/css/foundation-float.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.8.1/dist/css/foundation-prototype.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.8.1/dist/css/foundation-rtl.min.css" crossorigin="anonymous">
	<link rel='stylesheet' href='./build/bundle.css'>

	<script defer src='./build/bundle.js'></script>
</head>

<body>
    <main class="grid-container margin-vertical-3">
        <div id="form"></div>
        <?php if(!empty($results)): ?>
        <div>
        <?php foreach ($results as $value): ?>
            <p><?= $value ?></p>
        <?php endforeach; ?>
        </div>
        <?php endif ?>
    </main>
</body>
</html>
