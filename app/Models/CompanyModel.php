<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class CompanyModel extends Model
{
    use HasFactory;
    protected $table = 'companies';

    public function get_all_data()
    {
        try {
            $query = DB::table($this->table)
                ->select('id', 'name', 'logo', 'email', 'website')
                ->orderBy('a.id', 'DESC')->paginate(10);
            return $query;
        } catch (Exception $e) {
        }
    }

    public function get_data($id = 0)
    {
        try {
            $query = DB::table($this->table)
                ->select('id', 'name', 'logo', 'email', 'website')
                ->where('id', $id)->first();
            return $query;
        } catch (Exception $e) {
        }
    }

    public function get_dropdown_data()
    {
        try {
            $query = DB::table($this->table)
                ->select('id', 'name')
                ->get();
            return $query;
        } catch (Exception $e) {
        }
    }

    public function save_data($data = array(), $id = 0)
    {
        try {
            if ($id > 0) {
                DB::table($this->table)
                    ->where('id', $id)
                    ->update($data);
            } else {
                DB::table($this->table)->insert($data);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }


    public function delete_data($id = 0)
    {
        try {
            DB::table($this->table)
                ->where('id', $id)->delete();
        } catch (Exception $e) {
        }
    }
}
