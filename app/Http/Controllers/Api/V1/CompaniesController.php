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
        $companies =  Company::orderBy('id', 'desc')->get();
//        $response = [
//            'pagination' => [
//                'total' => $companies->total(),
//                'per_page' => $companies->perPage(),
//                'current_page' => $companies->currentPage(),
//                'last_page' => $companies->lastPage(),
//                'from' => $companies->firstItem(),
//                'to' => $companies->lastItem()
//            ],
//            'data' => $companies
//        ];

        return response()->json($companies);
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        $data = [
            "name" => $company->name,
            "address" => $company->address,
            "website" => $company->website,
            "email" => $company->email,
            "about" => $company->about,
            "country" => $company->country,
            "status" => $company->status,
            "check_box_1" => json_decode($company->check_box_1),
        ];
        return $data;
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->about = $request->about;
        $company->country = $request->country;
        $company->status = $request->status;
        $company->check_box_1 = json_encode($request->check_box_1);
        $company->save();
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
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->about = $request->about;
        $company->country = $request->country;
        $company->status = $request->status;
        $company->check_box_1 = json_encode($request->check_box_1);
        $company->save();
        return $company;
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return '';
    }
}
