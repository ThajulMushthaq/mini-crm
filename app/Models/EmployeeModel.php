<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employees';


    public function get_all_data()
    {
        try {
            $query = DB::table($this->table,'a')
                ->select('a.id', 'a.company', 'a.first_name','a.last_name', 'a.email','a.phone','c.id as company_id','c.name as company_name')
                ->leftJoin('companies as c','a.company','c.id')
                ->orderBy('a.id', 'DESC')->paginate(10);
            return $query;
        } catch (Exception $e) {
        }
    }

    public function get_data($id = 0)
    {
        try {
            $query = DB::table($this->table,'a')
                ->select('a.id', 'a.company', 'a.first_name','a.last_name', 'a.email','a.phone','c.id as company_id','c.name as company_name')
                ->leftJoin('companies as c','a.company','c.id')
                ->where('a.id', $id)->first();
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
