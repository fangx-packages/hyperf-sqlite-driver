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
