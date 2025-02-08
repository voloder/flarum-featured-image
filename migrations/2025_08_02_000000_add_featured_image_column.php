<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if ($schema->hasTable('users')) {
            $schema->table('users', function (Blueprint $table) {
                $table->string('featuredImage')->nullable();
            });
        }
    },
    'down' => function (Builder $schema) {
        if ($schema->hasTable('users')) {
            $schema->table('users', function (Blueprint $table) {
                $table->dropColumn('featuredImage');
            });
        }
    }
];