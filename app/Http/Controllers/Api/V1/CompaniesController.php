<?php

namespace App\Http\Controllers\Api\V1;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    public function index()
    {
        return Company::orderBy('id', 'desc')->get();
    }

    public function show($id)
    {
        return Company::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    public function store(Request $request)
    {
        $input = $request->input();
        $validator = Validator::make($input, [
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'about' => 'required',
            'country' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 5000,
                'error' => $validator->errors()
            ], 200);
        }
        $company = Company::create($request->all());
        return $company;
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return '';
    }
}
