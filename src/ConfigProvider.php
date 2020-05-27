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

namespace Fangx\SQLite;

use Fangx\SQLite\Connectors\SQLiteConnector;
use Hyperf\Database\Connection;

class ConfigProvider
{
    public function __invoke(): array
    {
        Connection::resolverFor('sqlite', function ($connection, $database, $prefix, $config) {
            return new SQLiteConnection($connection, $database, $prefix, $config);
        });

        return [
            'dependencies' => [
                'db.connector.sqlite' => SQLiteConnector::class,
            ],
            'listeners' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                    'collectors' => [
                    ],
                ],
            ],
            'publish' => [
            ],
        ];
    }
}
