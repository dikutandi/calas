<?php

namespace App\Dikut;

class Token
{
    /**
     * Generate uniq token string
     *
     * @param  string $table  The database table name
     * @param  string $column The database column table name
     * @return string
     */
    public function generate($table, $column, $length = 6)
    {
        $token = $this->rolled($length);
        if (!$this->check($table, $column, $token)) {
            return $token;
        }

        return $this->generate($table, $column);
    }

    /**
     * Rolled random token
     *
     * @return string
     */
    protected function rolled($length)
    {
        return str_random($length);
    }

    /**
     * Check on the database if token string is exist on table column
     *
     * @param  string $table  The database table name
     * @param  string $column The database column table name
     * @param  string $token  string
     * @return boolean
     */
    protected function check($table, $column, $token)
    {
        return \DB::table($table)->where($column, $token)->first();
    }
}
