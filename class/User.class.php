<?php
class User {
    private int $id;
    private string $login;
    private string $password;
    private string $firstname;
    private string $lastname;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
        $this->firstname = $firstname = "";
        $this->lastname = $lastname = "";
    
    }

    public function register() {
        $passwordHash = password_hash($this->password, PASSWORD_ARGON2I);
        $query = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?)";
        $db = new mysqli('localhost', 'root', '', 'loginForm');
        $preparedQuery = $db->prepare($query);
        $preparedQuery->bind_param('ssss', $this->login, $passwordHash, $this->firstName, $this->lastName);
        $preparedQuery->execute();
    }

    public function login() {

       $query = "SELECT * FROM user WHERE login = ?";
       $db = new mysqli('localhost', 'root', '', 'loginForm');
       $preparedQuery = $db->prepare($query);
       $preparedQuery->bind_param('s', $this->login);
       $preparedQuery->execute();
       $result = $preparedQuery->get_result();
       if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $passwordHash = $row['password'];
        if(password_verify($this->password, $passwordHash)) {
            $this->id = $row['id'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            return true;
        }
        else {
            return false;
        }
    } else {
        return false;
    }

       





    }
}
?>