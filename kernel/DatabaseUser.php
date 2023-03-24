<?php

require_once __DIR__ . '/../vendor/autoload.php';

final class DatabaseUser
{
    private string $dsn;
    private string $user;
    private string $password;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        //data from the .env
        $config = [
            'db' => [
                'dsn' => $_ENV['DB_DSN'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],
            ]
        ];

        $this->dsn = $config['db']['dsn'] ?? '';
        $this->user = $config['db']['user'] ?? '';
        $this->password = $config['db']['password'] ?? '';
    }

    public function try_catch()
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        return $S_base;
    }

    //GET USER :
    public function queryGetUserAction(string $email, string $password)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        // Generate a CSRF token
        $csrf_token = bin2hex(random_bytes(32));

        $sql = "SELECT id, email, password FROM `users` WHERE `email`=:email";
        $request = $S_base->prepare($sql);
        $request->bindParam(":email", $email, PDO::PARAM_STR);
        $request->execute();
        $user = $request->fetch();
        if ($user) {
            $verification = password_verify($password, $user['password']);
            if ($verification == true) {
                // Store the user's email and ID in session variables
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $user['id'];

                // Store the CSRF token in a session variable
                $_SESSION['csrf_token'] = $csrf_token;

                // Return the CSRF token along with a success message
                return ['status' => 'success', 'message' => 'GJ connection established', 'csrf_token' => $csrf_token];
            }
            // Return an error message
            return ['status' => 'error', 'message' => 'Something went wrong'];
        }
        // Return an error message
        return ['status' => 'error', 'message' => 'Something went wrong'];
    }


    public function initUser($email, $id)
    {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $id;
    }

    //SESSION CREATION
    public function sessionStart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    //Log out USER :
    public function logOut()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SESSION['id']) {
            $_SESSION = array();
            session_destroy();
            header('Location: login.php');
        } else {
            header('Location: index.php');
        }
    }

    //UPDATE USER :
    public function queryUpdateUserAction(string $email, string  $firstname, string  $username, string  $lastname, $id)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $sql = "UPDATE `users` SET `email`=:email, `firstname`=:firstname, `username`=:username, `lastname`=:lastname WHERE id= :id;";
        $request = $S_base->prepare($sql);
        $request->bindParam(":email", $email, PDO::PARAM_STR);
        $request->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $request->bindParam(":username", $username, PDO::PARAM_STR);
        $request->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $request->bindParam(":id", $id, PDO::PARAM_STR);

        $request->execute();

        echo 'Success, nice update';
    }


    //CREATE USER :
    public function queryCreateUserAction(string $email, string  $firstname, string  $username, string  $lastname, string  $passwordUser)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }

        $S_base->exec("SET CHARACTER SET utf8");

        $sql = "INSERT INTO `users` SET `email`=:email, `firstname`=:firstname, `username`=:username, `lastname`=:lastname, `password`=:password";
        $request = $S_base->prepare($sql);
        $request->bindParam(":email", $email, PDO::PARAM_STR);
        $request->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $request->bindParam(":username", $username, PDO::PARAM_STR);
        $request->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $passwordHashed = password_hash($passwordUser, PASSWORD_BCRYPT);
        $request->bindParam(":password", $passwordHashed, PDO::PARAM_STR);

        $request->execute();

        echo 'Success, data got inserted';
    }


    // DELETE USER :
    public function queryDeleteUserAction(int $id)
    {
        var_dump('hey');

        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $sql = "DELETE FROM `users` WHERE `id`=:id";
        $request = $S_base->prepare($sql);
        $request->bindParam(":id", $id, PDO::PARAM_STR);
        $request->execute();

        echo 'Success, data got deleted';
    }
}
