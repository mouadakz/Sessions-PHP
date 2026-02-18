<?php
session_start();

require 'datause.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';
    $found = false;

    foreach ($users as $user) {
        if ($user['name'] === $name) {
            $found = true;
            if ($user['password'] === $password) {
                if ($user['active']) {
                    $_SESSION['user'] = [
                        'name' => $user['name'],
                        'role' => $user['role']
                    ];
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $message = " Compte désactive";
                }
            } else {
                $message = " identifiants incorect";
            }
            break;
        }
    }

    if (!$found) {
        $message = " identifiants incorect";
    }
}
?>

<form method="POST">
    <h2>Connexion</h2>
    <?php if($message) echo "<div>$message</div>"; ?>
    <input type="text" name="name" placeholder="Nom " required>
    <input type="password" name="password" placeholder="pssword" required>
    <input type="submit" value="Se connecter">
</form>
