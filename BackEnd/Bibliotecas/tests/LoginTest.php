<?php
require_once __DIR__ . '/../../Plataforma/conexion.php'; // Cambia la ruta según la ubicación real de tu archivo de conexión
require_once __DIR__ . '/../../Plataforma/Autenticacion.php';
require_once __DIR__ . '/../../../BasesDatos/MySQLDatabase.php';
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {
    private $auth;
    private $dbMock;

    protected function setUp(): void {
        // Instanciamos Autenticacion con la conexión de la base de datos
        global $conexion;
        $this->auth = new Autenticacion($conexion);
        
        // Creamos un mock para DatabaseInterface
        $this->dbMock = $this->createMock(DatabaseInterface::class);
    }

    public function testLoginSuccess() {
        // Simular una solicitud POST con credenciales válidas
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['usuario'] = 'erick.hdz9628@gmail.com';
        $_POST['contrasena'] = '123456789';
    
        // Incluir el archivo que contiene el código de inicio de sesión
        require '/Proyectos/Futbolero/BackEnd/Plataforma/proceso_login.php';
    
        // Verificar que la sesión se haya iniciado correctamente
        $this->assertTrue(isset($_SESSION['Correo']));
        $this->assertEquals('erick.hdz9628@gmail.com', $_SESSION['Correo']);
        $this->assertEquals('Regular', $_SESSION['TipoUsuario']);
        // Puedes agregar más aserciones según la lógica de tu aplicación
    }
    
    public function testLoginFailureIncorrectPassword() {
        // Simular una solicitud POST con credenciales inválidas (contraseña incorrecta)
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['usuario'] = 'erick.hdz9628@gmail.com';
        $_POST['contrasena'] = '123456780';
    
        // Incluir el archivo que contiene el código de inicio de sesión
        require '/Proyectos/Futbolero/BackEnd/Plataforma/proceso_login.php';
    
        // Verificar que no se haya iniciado sesión y que se muestre un mensaje de error adecuado
        $this->assertFalse(isset($_SESSION['Correo']));
        // Puedes agregar más aserciones según la lógica de tu aplicación
    }
}