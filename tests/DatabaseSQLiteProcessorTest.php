<?php

declare(strict_types=1);

/**
 * Fangx's Packages
 *
 * @link     https://github.com/nfangxu/hyperf-sqlite-driver
 * @document https://github.com/nfangxu/hyperf-sqlite-driver/blob/master/README.md
 * @contact  nfangxu@gmail.com
 * @author   nfangxu
 */

namespace HyperfTest;

use Fangx\SQLite\Query\Processors\SQLiteProcessor;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class DatabaseSQLiteProcessorTest extends TestCase
{
    public function testProcessColumnListing()
    {
        $processor = new SQLiteProcessor();

        $listing = [['name' => 'id'], ['name' => 'name'], ['name' => 'email']];
        $expected = ['id', 'name', 'email'];

        $this->assertEquals($expected, $processor->processColumnListing($listing));

        // convert listing to objects to simulate PDO::FETCH_CLASS
        foreach ($listing as &$row) {
            $row = (object)$row;
        }

        $this->assertEquals($expected, $processor->processColumnListing($listing));
    }
}
