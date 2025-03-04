<?php
$conn = new mysqli('localhost', 'root', '', 'principal');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Usar consultas preparadas para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            header("Location: ../menu.html");
            exit();
        } else {
            header("Location: ../register.html?error=1");
            exit();
        }
    } else {
        header("Location: ../register.html?error=1");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>