<?php

declare(strict_types=1);

/**
 * HotniuerGrpc
 *
 * @link     https://glab.tagtic.cn/niufangxu/hotniuer-grpc
 * @document https://glab.tagtic.cn/niufangxu/hotniuer-grpc/blob/master/README.md
 * @contact  ggjs@infinities.com.cn
 */

namespace Fangx\SQLite\Schema;

use Hyperf\Database\Schema\Builder;

class SQLiteBuilder extends Builder
{
    /**
     * Drop all tables from the database.
     */
    public function dropAllTables()
    {
        if ($this->connection->getDatabaseName() !== ':memory:') {
            return $this->refreshDatabaseFile();
        }

        $this->connection->select($this->grammar->compileEnableWriteableSchema());

        $this->connection->select($this->grammar->compileDropAllTables());

        $this->connection->select($this->grammar->compileDisableWriteableSchema());

        $this->connection->select($this->grammar->compileRebuild());
    }

    /**
     * Drop all views from the database.
     */
    public function dropAllViews()
    {
        $this->connection->select($this->grammar->compileEnableWriteableSchema());

        $this->connection->select($this->grammar->compileDropAllViews());

        $this->connection->select($this->grammar->compileDisableWriteableSchema());

        $this->connection->select($this->grammar->compileRebuild());
    }

    /**
     * Empty the database file.
     */
    public function refreshDatabaseFile()
    {
        file_put_contents($this->connection->getDatabaseName(), '');
    }
}
