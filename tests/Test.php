<?php

use PHPUnit\Framework\TestCase;

require_once("index.php");

class AutomobilTest extends TestCase
{
    protected $pdo;

    protected function setUp(): void
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=carhorizontal", "root", "");

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->pdo->exec("
            CREATE TABLE automobil (
                id INT AUTO_INCREMENT PRIMARY KEY,
                brSasije VARCHAR(255),
                model VARCHAR(255),
                godiste DATE,
                kilometraza INT,
                vlasnik VARCHAR(255)
            );
        ");
    }

    protected function tearDown(): void
    {
        $this->pdo->exec("DROP TABLE automobil;");
    }

    public function testUnosPodatakaUBazu()
    {
        $_POST = [
            'brSasije' => '1234564789',
            'model' => 'Serija 1',
            'godiste' => '2020-01-01',
            'kilometraza' => '50000',
            'vlasnik' => 'JohnDoe'
        ];

        $automobil = new Automobil();
        $automobil->unosPodatakaUBazu();

        $stmt = $this->pdo->prepare("SELECT * FROM automobil WHERE brSasije = :brSasije");
        $stmt->execute(['brSasije' => '1234564789']);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals('1234564789', $result['brSasije']);
        $this->assertEquals('Serija 1', $result['model']);
        $this->assertEquals('2020-01-01', $result['godiste']);
        $this->assertEquals(50000, $result['kilometraza']);
        $this->assertEquals('JohnDoe', $result['vlasnik']);
    }

    public function testSvaPoljaMorajuBitiPopunjena()
    {
        $_POST = [];
        $automobil = new Automobil();
        ob_start(); 
        $automobil->unosPodatakaUBazu();
        $output = ob_get_clean(); 

        $this->assertEquals('Sva polja moraju biti popunjena', $output);
    }

    public function testPoljeVlasnikMoraSadrzatiSamoSlova()
    {
        $_POST = [
            'brSasije' => '123456789',
            'model' => 'Serija 1',
            'godiste' => '2020-01-01',
            'kilometraza' => '50000',
            'vlasnik' => '123' 
        ];
        $automobil = new Automobil();
        ob_start(); 
        $automobil->unosPodatakaUBazu();
        $output = ob_get_clean(); 

        $this->assertEquals('Polje vlasnik mora sadrzati samo slova!', $output);
    }
}
