<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>



<h2>
<?php
switch($user['role']){
    case 'administrateur': echo "Bienvenue Administrateur " . htmlspecialchars($user['name']); break;
    case 'formateur': echo "Bienvenue Formateur " . htmlspecialchars($user['name']); break;
    case 'apprenant': echo "Bienvenue Apprenant " . htmlspecialchars($user['name']); break;
    default: echo "Bienvenue " . htmlspecialchars($user['name']);
}
?>
</h2>




<form method="POST" action="logout.php">
    <input type="submit" value="Se déconnecter">
</form>
