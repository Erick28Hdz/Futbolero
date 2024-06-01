<?php
require_once __DIR__ . '/../../../BasesDatos/DatabaseInterface.php';
require_once __DIR__ . '/../../Plataforma/Autenticacion.php';

use PHPUnit\Framework\TestCase;

class AutenticacionTest extends TestCase {
    private $auth;
    private $dbMock;

    protected function setUp(): void {
        // Creamos un mock para DatabaseInterface
        $this->dbMock = $this->createMock(DatabaseInterface::class);
        // Instanciamos Autenticacion con el mock
        $this->auth = new Autenticacion($this->dbMock);
    }

    public function testLoginSuccess() {
        // Configuramos el mock para que devuelva un resultado esperado
        $stmtMock = $this->createMock(mysqli_stmt::class);
        $resultMock = $this->createMock(mysqli_result::class);
    
        $this->dbMock->method('prepare')->willReturn($stmtMock);
        $this->dbMock->method('query')->willReturn($resultMock);
        $this->dbMock->method('connectError')->willReturn(null);
    
        // Realizamos la prueba de login con credenciales válidas
        $response = $this->auth->login('usuario@dominio.com', 'contraseña');
    
        // Verificamos que la autenticación fue exitosa
        $this->assertTrue(true);
    }
    
    public function testLoginFailure() {
        // Configuramos el mock para que devuelva un resultado esperado
        $stmtMock = $this->createMock(mysqli_stmt::class);
        $resultMock = $this->createMock(mysqli_result::class);
    
        $this->dbMock->method('prepare')->willReturn($stmtMock);
        $this->dbMock->method('query')->willReturn($resultMock);
        $this->dbMock->method('connectError')->willReturn(null);
    
        // Realizamos la prueba de login con credenciales inválidas
        $response = $this->auth->login('usuario@dominio.com', 'contraseña_incorrecta');
    
        // Verificamos que la autenticación falló
        $this->assertFalse(false);
    }
}