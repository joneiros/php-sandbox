<?php

use Jonoros\Crud;
use Jonoros\Database;
use PHPUnit\Framework\TestCase;
use Jonoros\SumSolver;
use PHPUnit\Framework\MockObject\MockObject;

class CrudTest extends TestCase
{
    private Database $database;
    private Crud $sut; //SystemUnderTest

    public function setUp(): void {
        $this->database = $this->getMockBuilder(Database::class)
            ->getMock();
        $this->sut = new Crud($this->database);
    }

    // //test[functionName]_when[case]
    // public function testCreateToDoListItem_whenHappyCase() {
    //     $input = "myItem";
    //     $expected = "myItem";
    //     $response = $this->sut->createToDoListItem($input);
    //     $this->assertSame($expected, $response);
    // }

    public function testCreateToDoListItem_whenHappyCase() {
        $input = "myItem";
        $expected = "myItem";

        $this->database->expects($this->once())
            ->method('insert')
            ->with($expected);
        
        $this->sut->createToDoListItem($input);
    }
     
    // public function testCreateToDoListItem_whenInputIsEmptyString() {
    // }

    // public function testCreatToDoListItem_whenInputIsNull() {
    // }
}