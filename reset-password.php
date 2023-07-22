<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/conn-db.php";   //get the DB

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakaya</title>

    <!-- ui library >> tailwend -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <!-- animation library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custtom css -->
    <link rel="stylesheet" href="login.css">

</head>


<body>

    <h1>Rakaya-Reset Password</h1>

    <form method="post" action="process-reset-password.php">

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="password">كلمة المرور الجديدة</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">تأكيد كلمة المرور</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation">

        <button>ارسل</button>
    </form>


<!-- flowbite script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

<!-- javascript library link -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- initialize AOS library script -->
<script>
    AOS.init();
</script>

</body>

</html>
