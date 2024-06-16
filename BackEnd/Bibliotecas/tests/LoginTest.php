<?php
require_once __DIR__ . '/../../Plataforma/conexion.php'; // Ruta absoluta a conexión.php
require_once __DIR__ . '/../../Plataforma/Autenticacion.php'; // Ruta absoluta a Autenticacion.php
require_once __DIR__ . '/../../../BasesDatos/MySQLDatabase.php'; // Ruta absoluta a MySQLDatabase.php
require_once __DIR__ . '/../../Plataforma/proceso_login.php';

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {
    private $auth;
    private $dbMock;

    protected function setUp(): void {
        global $conexion;
        $this->auth = new Autenticacion($conexion);
        $this->dbMock = $this->createMock(DatabaseInterface::class);

        // Limpiar cualquier sesión existente antes de cada prueba
        session_unset();
    }

    protected function iniciarSesion($usuario, $contrasena) {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['usuario'] = $usuario;
        $_POST['contrasena'] = $contrasena;

        // Ejecutar el proceso de inicio de sesión
        require __DIR__ . '/../../Plataforma/proceso_login.php';
    }

    public function testLoginSuccess() {
        // Simular inicio de sesión con credenciales válidas
        $this->iniciarSesion('erick.hdz9628@gmail.com', '1234567890a');

        // Verificar que la sesión se haya iniciado correctamente
        $this->assertTrue(isset($_SESSION['Correo']));
        $this->assertEquals('erick.hdz9628@gmail.com', $_SESSION['Correo']);
        $this->assertEquals('Regular', $_SESSION['TipoUsuario']);
        // Agregar más aserciones según sea necesario
    }
    
    public function testLoginFailureIncorrectPassword() {
        // Simular inicio de sesión con contraseña incorrecta
        $this->iniciarSesion('erick.hdz9628@gmail.com', '123456780');

        // Verificar que no se haya iniciado sesión correctamente
        $this->assertFalse(isset($_SESSION['Correo']));
        // Agregar más aserciones según sea necesario
    }
}
?>