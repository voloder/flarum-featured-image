<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if (!$schema->hasColumn('users', 'web3address')) {
            $schema->table('users', function (Blueprint $table) use ($schema) {
                $table->string('featuredImage')->nullable();
            });
        }
    },
    'down' => function (Builder $schema) {
        $schema->table('users', function (Blueprint $table) use ($schema) {
            $table->dropColumn('featuredImage');
        });
    }
];