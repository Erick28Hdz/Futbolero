<?php
use PHPUnit\Framework\TestCase;
use PHPMailer\PHPMailer\PHPMailer;

class UserRegistrationTest extends TestCase
{
    private $dbMock;
    private $mailMock;

    protected function setUp(): void
    {
        // Mock de la conexión a la base de datos
        $this->dbMock = $this->createMock(MySQLDatabase::class);
        
        // Mock de PHPMailer
        $this->mailMock = $this->createMock(PHPMailer::class);
    }

    public function testEmptyFields()
    {
        $_POST = [
            'Nombre' => '',
            'Apellido' => '',
            'Documento' => '',
            'Correo' => '',
            'Contraseña' => '',
            'Teléfono' => '',
            'País' => '',
            'Ciudad' => '',
            'Género' => '',
            'FechaNacimiento' => ''
        ];

        ob_start();
        require '../ruta/a/tu/archivo.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Error: Todos los campos son obligatorios. Por favor, complete el formulario.', $output);
    }

    public function testEmailAlreadyExists()
    {
        $_POST = [
            'Nombre' => 'John',
            'Apellido' => 'Doe',
            'Documento' => '12345678',
            'Correo' => 'john@example.com',
            'Contraseña' => 'password',
            'Teléfono' => '123456789',
            'País' => 'Country',
            'Ciudad' => 'City',
            'Género' => 'Male',
            'FechaNacimiento' => '2000-01-01'
        ];

        $stmtMock = $this->createMock(mysqli_stmt::class);
        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('get_result')->willReturn((object)['fetch_assoc' => ['total' => 1]]);

        $this->dbMock->method('prepare')->willReturn($stmtMock);

        ob_start();
        require '../ruta/a/tu/archivo.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Error: El correo ya está registrado.', $output);
    }

    public function testSuccessfulRegistration()
    {
        $_POST = [
            'Nombre' => 'John',
            'Apellido' => 'Doe',
            'Documento' => '12345678',
            'Correo' => 'john@example.com',
            'Contraseña' => 'password',
            'Teléfono' => '123456789',
            'País' => 'Country',
            'Ciudad' => 'City',
            'Género' => 'Male',
            'FechaNacimiento' => '2000-01-01'
        ];

        $stmtMock = $this->createMock(mysqli_stmt::class);
        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('get_result')->willReturn((object)['fetch_assoc' => ['total' => 0]]);

        $this->dbMock->method('prepare')->willReturn($stmtMock);

        $this->mailMock->expects($this->once())->method('send')->willReturn(true);

        ob_start();
        require '../ruta/a/tu/archivo.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('Se ha enviado un correo electrónico de verificación a john@example.com.', $output);
    }
}