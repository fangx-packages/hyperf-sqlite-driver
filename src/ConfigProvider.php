<?php

declare(strict_types=1);

/**
 * HotniuerGrpc
 *
 * @link     https://glab.tagtic.cn/niufangxu/hotniuer-grpc
 * @document https://glab.tagtic.cn/niufangxu/hotniuer-grpc/blob/master/README.md
 * @contact  ggjs@infinities.com.cn
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
