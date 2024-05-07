<?php

$host = "db";
$user = "root";
$pass = 'jkqwheIYWQ123khb8';
$db = "software-testing";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'sqlmap') !== false) {
    die("I hate sqlmap:(");
}

if (!isset($_COOKIE['giveme']) || strpos(strtolower($_COOKIE['giveme']), 'flag') === false) {
    die("Give me cookie:( (giveme=flag)");
}

if (isset($_GET['id'])) {
    $blacklists = [
        'select',
        'union',
        'from',
        'where',
        'order',
        'group',
        'having',
        'and',
        'not',
        'like',
        'join',
        'exists',
        'insert',
        'update',
        'delete',
        'create',
    ];
    foreach ($blacklists as $blacklist) {
        if (strpos($_GET['id'], $blacklist) !== false || strpos($_GET['id'], strtoupper($blacklist)) !== false) {
            die("Bad hacker:(");
        }
    }
    $sql = "SELECT * FROM users WHERE id = '" . $_GET['id'] . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"] . " - Name: " . $row["username"] . "<br>";
        }
    } else {
        echo "0 results";
    }
} else {
    header('Location: ' . $_SERVER['PHP_SELF'] . '?id=1');
}

mysqli_close($conn);
