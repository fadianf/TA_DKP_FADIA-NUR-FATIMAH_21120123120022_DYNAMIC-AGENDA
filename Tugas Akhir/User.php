<?php
class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public static function authenticate($username, $password) {
        // Simpan username dan password default di sini
        $default_username = 'fadia';
        $default_password = '1234';

        if ($username === $default_username && password_verify($password, password_hash($default_password, PASSWORD_DEFAULT))) {
            return new User($username, $password);
        }
        return null;
    }
}
?>
