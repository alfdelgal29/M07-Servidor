<?php
class ModeloBD {
    private $pdo;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'pt02_alfonso_delgado';
        $user = 'root';
        $password = '';
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("No se pudo conectar a la base de datos. Inténtelo más tarde.");
        }
    }

    // Obtenemos la conexión
    public function getConnection() {
        return $this->pdo;
    }

    //  Obtenemos todos los artículos con paginación (solo para mostrar a usuarios no registrados)
    public function consultarArticulos($limit, $offset) {
        $sql = "SELECT * FROM articles LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //  Obtenemos los artículos de un usuario específico con paginación
    public function consultarArticulosUsuario($user_id, $limit, $offset) {
        $sql = "SELECT * FROM articles WHERE user_id = :user_id LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //   Forma de contar el total de artículos
    public function contarArticulos() {
        $sql = "SELECT COUNT(*) FROM articles";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchColumn();
    }

    //  Contamos el total de artículos de un usuario específico
    public function contarArticulosUsuario($user_id) {
        $sql = "SELECT COUNT(*) FROM articles WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    //  Insertar un nuevo artículo
    public function insertarArticulo($user_id, $titulo, $contenido) {
        $sql = "INSERT INTO articles (user_id, Titol, Cos) VALUES (:user_id, :titulo, :contenido)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':contenido', $contenido);
        $stmt->execute();
    }

    // Modificar un articulo
    public function modificarArticulo($article_id, $user_id, $titulo, $contenido) {
        $sql = "UPDATE articles SET Titol = :titulo, Cos = :contenido WHERE ID = :article_id AND user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':contenido', $contenido);
        $stmt->execute();
    }

    // Eliminar un artículo
    public function eliminarArticulo($article_id, $user_id) {
        $sql = "DELETE FROM articles WHERE ID = :article_id AND user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //  Consultar un artículo específico por su ID
    public function consultarArticuloPorId($article_id) {
        $sql = "SELECT * FROM articles WHERE ID = :article_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>