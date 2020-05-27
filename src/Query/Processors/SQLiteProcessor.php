<?php

declare(strict_types=1);

/**
 * HotniuerGrpc
 *
 * @link     https://glab.tagtic.cn/niufangxu/hotniuer-grpc
 * @document https://glab.tagtic.cn/niufangxu/hotniuer-grpc/blob/master/README.md
 * @contact  ggjs@infinities.com.cn
 */

namespace Fangx\SQLite\Query\Processors;

use Hyperf\Database\Query\Processors\Processor;

class SQLiteProcessor extends Processor
{
    /**
     * Process the results of a column listing query.
     *
     * @param array $results
     */
    public function processColumnListing($results): array
    {
        return array_map(function ($result) {
            return ((object)$result)->name;
        }, $results);
    }
}
