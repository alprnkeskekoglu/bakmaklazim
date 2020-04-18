<?php

namespace Dawnstar\Commands;

use Illuminate\Console\Command;

class SearchView extends Command
{

    protected $signature = 'search:view';

    public function handle()
    {
        \DB::statement("
            CREATE VIEW search_content AS
            SELECT
                c.id AS model_id,
                'Dawnstar\\\Models\\\Category' AS model_type,
                c.name AS name,
                c.detail AS detail,
                c.slug AS slug
            FROM
                categories AS c
            WHERE
                c.deleted_at is NULL AND c.status = 1
            UNION
            SELECT
                b.id AS model_id,
                'Dawnstar\\\Models\\\Blog' AS model_type,
                b.name AS name,
                b.detail AS detail,
                b.slug AS slug
            FROM
                blogs AS b
            WHERE
                b.deleted_at is NULL AND b.status = 1
            ");

        $this->info(PHP_EOL . "search_content table setted !! " . PHP_EOL);
    }


}
