<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    private $companyModel;

    public function __construct()
    {
        $this->companyModel = new \App\Models\CompanyModel;
    }


    public function list()
    {

        $data['company_active'] = 'active';
        $data['data'] = $this->companyModel->get_all_data();
        // dd($data['data']);
        return view('company.list', $data);
    }


    public function add($id = 0)
    {
        // dd($id);
        $data = [];
        $data['company_active'] = 'active';
        if ($id > 0) {
            $data['data'] = $this->companyModel->get_data($id);
        }
        return view('company.add', $data);
    }


    public function save(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email'
        ]);

        $values = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'website' => $request->get('website'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        if ($request->get('id') > 0) {
            $id = $request->get('id');
        } else {
            $id = 0;
            $values['created_at'] = date('Y-m-d H:i:s');
        }

        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file->move(storage_path('/app/public'), $filename);
            $values['logo']= $filename;
        }

        $this->companyModel->save_data($values, $id);

        return redirect('/company')->with('success', 'Company successfully updated');
    }


    public function delete($id = 0)
    {
        if ($id > 0) {
            $this->companyModel->delete_data($id);
            return redirect()->back()->with("success", "Item Deleted successfully!");
        }
    }
}
