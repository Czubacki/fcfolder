<?php
require_once('User.class.php');

$user = new User('jkowalski', 'tajneHasło');

if($user->login()) {
    echo "Zalogowano poprawnie";
} else {
    echo "Błędny login lub hasło";
}

?>