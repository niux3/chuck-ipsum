<?php
    require_once './db/FactoryDB.php';


    if(!empty($_GET)){
        $db = FactoryDB::initialize([
            'driver' => 'Sqlite',
            'path' => 'db.sqlite3',
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form>
    <div class="input">
        <label for="">n° phrase</label>
        <input type="range" min="0" max="100" name="sentence" value="0">
        <span>0</span>
    </div>
    <div class="input">
        <label for="">n° paragraphe</label>
        <input type="range" min="1" max="100" name="paragraphe" value="1">
        <span>1</span>
    </div>
    <button type="submit">envoyer</button>
</form>
<div>
    <?php if(!empty($results)): ?>
        <?php foreach ($results as $value): ?>
        <p><?= $value ?></p>
        <?php endforeach; ?>
    <?php endif ?>
</div>
<script>
    document.querySelectorAll('input').forEach($input =>{
        $input.addEventListener('change', e =>{
            $input.nextElementSibling.textContent = e.target.value;
        })
    })
</script>
</body>
</html>
