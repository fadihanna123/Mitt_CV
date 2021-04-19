<?php

class Admin
{
    protected $_db;
    // Definera databasuppgifter
    public function __construct()
    {
        ($this->db = (object) new mysqli("localhost", "root", "", "test")) or
        die("Det finns ett okänt problem");
        mysqli_set_charset($this->db, 'utf8');
    }

    // Contact funktionen lägger till kontaktuppgifter i databasen
    public function Contact(
        string $name,
        string $epost,
        string $msg
    ): bool {
        $sql = (string) "INSERT INTO contact_cv (fullname, epost, msg) VALUES('$name', '$epost', '$msg');";
        return ($this->db->query($sql)) or
        die(
            "<span class='error'>Det finns ett okänt problem -<br />
                Vi försöker lösa problemet så fort det går.</span>"
        );
    }

    // login funktionen kontrollerar om man har rätt inloggningsuppgifter precis som finns i databasen.
    public function login(
        string $epost,
        string $psw
    ): void {
        $sql = (string) "SELECT * FROM users_cv WHERE epost='$epost' AND psw='$psw';";
        $result = (object)$this->db->query($sql);
        $num = (int)mysqli_num_rows($result);
        if ($num == 1) {
            $_SESSION['loginepost'] = (string)$_POST['logepost'];
            $_SESSION['loginpsw'] = (string)$_POST['logpsw'];
            header("location:index.php");
        } else {
            echo "<br /><span class='error'>Det finns något fel i uppgifterna.<br /> Kontrollera din e-postadress och ditt lösenord</span><br />";
        }
    }
}
