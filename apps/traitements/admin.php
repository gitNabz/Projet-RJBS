<?php
// echo password_hash('toto', PASSWORD_BCRYPT, ["cost" => 12]);
var_dump($_POST);
if (isset($_GET['page']) && $_GET['page'] == 'logout')
{
    session_destroy();
    header('Location: index.php');
    exit;
}

if (isset($_POST['action']))
{
    $action = $_POST['action'];
    if ($action == 'login')
    {
        if (isset($_POST['email'], $_POST['password']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // ETAPE 3
            $manager = new AdminManager($pdo);
            $admin = $manager->findByEmail($email);
            if ($admin)
            {
                if ($admin->verifPassword($password))
                {
                    $_SESSION['id'] = $admin->getId();// J'enregistre dans la session le numéro de l'utilisateur connecté
                    $_SESSION['email'] = $admin->getEmail();// J'enregistre aussi son login
                    header('Location: index.php');
                    exit;
                }
            }
        }
    }
    
}

?>