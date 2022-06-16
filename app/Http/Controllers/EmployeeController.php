<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    private $companyModel;
    private $employeeModel;

    public function __construct()
    {
        $this->companyModel = new \App\Models\CompanyModel;
        $this->employeeModel = new \App\Models\EmployeeModel;
    }

    public function list()
    {
        $data['employee_active'] = 'active';
        $data['data'] = $this->employeeModel->get_all_data();
        return view('employee.list', $data);
    }

    public function add($id = 0)
    {
        // dd($id);
        $data = [];
        $data['employee_active'] = 'active';
        $data['company'] = $this->companyModel->get_dropdown_data();
        if ($id > 0) {
            $data['data'] = $this->employeeModel->get_data($id);
        }
        return view('employee.add', $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:employees,email'
        ]);

        $values = array(
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'company' => $request->get('company'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        if ($request->get('id') > 0) {
            $id = $request->get('id');
        } else {
            $id = 0;
            $values['created_at'] = date('Y-m-d H:i:s');
        }

        $this->employeeModel->save_data($values, $id);

        return redirect('/employee')->with('success', 'Employee successfully updated');
    }


    public function delete($id = 0)
    {
        if ($id > 0) {
            $this->employeeModel->delete_data($id);
            return redirect()->back()->with("success", "Item Deleted successfully!");
        }
    }
}
