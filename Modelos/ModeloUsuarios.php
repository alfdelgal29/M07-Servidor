<?php
require_once 'ModeloBD.php';

class ModeloUsuarios {
    private $pdo;

    public function __construct($modeloBD) {
        $this->pdo = $modeloBD->getConnection();
    }

    //  Registramos un usuario en la base de datos
    public function registerUser($usuario, $correo, $contrasena) {
        try {
            $sql = "INSERT INTO usuaris (usuari, correo, contraseña) VALUES (:usuario, :correo, :contrasena)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasena', password_hash($contrasena, PASSWORD_DEFAULT)); // Encriptar la contraseña
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error al registrar el usuario: " . $e->getMessage();
            return false;
        }
    }

    // Verificamos el usuario en el proceso de login
    public function verifyUser($usuario, $contrasena) {
        try {
            // Buscar el usuario en la base de datos
            $sql = "SELECT * FROM usuaris WHERE usuari = :usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificamos si se encontró el usuario y si la contraseña es correcta
            if ($user && password_verify($contrasena, $user['contraseña'])) {
                return $user;
            }

            return false;
        } catch (PDOException $e) {
            echo "Error al verificar el usuario: " . $e->getMessage();
            return false;
        }
    }
}
?>
