<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueTitleNotSoftDeleted implements Rule
{
    protected $table;
    protected $column;
    protected $deleteColumn;

    public function __construct($table, $column, $deleteColumn = 'soft_delete')
    {
        $this->table = $table;
        $this->column = $column;
        $this->deleteColumn = $deleteColumn;
    }

    public function passes($attribute, $value)
    {
        // Check if there is any record with the same value where soft_delete is 0
        return !DB::table($this->table)
            ->where($this->column, $value)
            ->where($this->deleteColumn, 0)
            ->exists();
    }

    public function message()
    {
        return 'The :attribute must be unique.';
    }
}
