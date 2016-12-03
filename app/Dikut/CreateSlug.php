<?php

namespace App\Dikut;

use DB;

class CreateSlug
{
    /**
     * Helper function to generate dropdown
     *
     * @return array
     */
    protected $param;
    protected $table;

    public function __construct($param, $table)
    {
        $this->param = $param;
        $this->table = $table;

    }

    //create url and Slug
    public function getSlug()
    {
        $slug = $this->cekUrl(str_slug($this->param));
        return $slug;
    }

    public function cekUrl($url)
    {
        $q = DB::table($this->table)->where('slug', $url)->count();
        if ($q == 0) {
            return $url;
        } else {
            $url = $url . '-' . rand(0, 9999);
            return $this->cekUrl($url);
        }
    }

}
