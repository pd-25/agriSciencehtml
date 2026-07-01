<?php

$password = "YOUR_PASSWORD_HERE";

if (!isset($_GET['pass']) || $_GET['pass'] !== $password) {
    die("Access Denied");
}

$output = "";

if (isset($_POST['command'])) {

    $allowed = [
        'php artisan optimize:clear',
        'php artisan config:clear',
        'php artisan cache:clear',
        'php artisan route:clear',
        'php artisan view:clear',
        'php artisan config:cache',
        'php artisan migrate',
    ];

    $cmd = trim($_POST['command']);

    if (!in_array($cmd, $allowed)) {
        $output = "Command not allowed";
    } else {

        chdir(__DIR__ . '/../');

        $output = shell_exec($cmd . ' 2>&1');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laravel Terminal</title>

    <style>
        body{
            background:#0f172a;
            color:white;
            font-family:Arial;
            padding:30px;
        }

        input,select,button{
            width:100%;
            padding:12px;
            margin-top:10px;
            border-radius:6px;
            border:none;
        }

        button{
            background:#2563eb;
            color:white;
            cursor:pointer;
        }

        pre{
            background:black;
            padding:20px;
            margin-top:20px;
            overflow:auto;
            border-radius:8px;
        }
    </style>
</head>
<body>

<h2>Laravel Terminal</h2>

<form method="POST">

    <select name="command">

        <option value="php artisan optimize:clear">
            php artisan optimize:clear
        </option>

        <option value="php artisan config:clear">
            php artisan config:clear
        </option>

        <option value="php artisan cache:clear">
            php artisan cache:clear
        </option>

        <option value="php artisan route:clear">
            php artisan route:clear
        </option>

        <option value="php artisan view:clear">
            php artisan view:clear
        </option>

        <option value="php artisan config:cache">
            php artisan config:cache
        </option>

        <option value="php artisan migrate">
            php artisan migrate
        </option>

    </select>

    <button type="submit">Run Command</button>

</form>

<?php if($output): ?>

<pre><?php echo htmlspecialchars($output); ?></pre>

<?php endif; ?>

</body>
</html>