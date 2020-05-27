<?php

declare(strict_types=1);

/**
 * HotniuerGrpc
 *
 * @link     https://glab.tagtic.cn/niufangxu/hotniuer-grpc
 * @document https://glab.tagtic.cn/niufangxu/hotniuer-grpc/blob/master/README.md
 * @contact  ggjs@infinities.com.cn
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
