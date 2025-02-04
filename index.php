<?php
session_start();
$result_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["captcha"]) && isset($_SESSION["captcha"])) {
        if ($_POST["captcha"] === $_SESSION["captcha"]) {
            $result_message = "<span style='color: green;'>Правильно✅</span>";
        } else {
            $result_message = "<span style='color: red;'>Неправильно❌</span>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Капча</title>
</head>
<body>
    <h2>Регистрация</h2>

    <img src="captcha.php" alt="Капча">
    <form method="post">
        <label>Введите строку:</label>
        <input type="text" name="captcha" required>
        <button type="submit">OK</button>
    </form>

    <p><?php echo $result_message; ?></p>

    <p><a href="index.php">Обновить капчу</a></p>
</body>
</html>
