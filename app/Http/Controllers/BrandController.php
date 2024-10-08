<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Imports\BrandsImport;
use App\Services\BrandService;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct(
        protected BrandService $brandService,
        protected ProfileService $profileService

    ) {}
    public function index()
    {
        $user = $this->profileService->getUserById(Auth::id());
        $pageTitle = 'Tambah Brand';
        $brands = $this->brandService->getAllBrands();
        $title = 'Delete Data!';

        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('brand.index', compact('brands', 'pageTitle', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $pageTitle = 'Admin';
        // $brands = $this->brandService->getAllBrands();
        // return view('brand.index', compact('brands', 'pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {

        $validatedData = $request->validated();

        $this->brandService->create($validatedData);
        Alert::success('Success!', 'Brand Created Successfully');
        return redirect('/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Brand';
        $user = $this->profileService->getUserById(Auth::id());



        $brand = $this->brandService->getBrandById($id);

        return view('brand.edit', compact('brand', 'pageTitle', 'user'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $validatedData = $request->validated();

        $brand = $this->brandService->update($validatedData, $id);
        Alert::success('Success!', 'Brand Edited Successfully');


        return redirect('/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->brandService->delete($id);
        alert()->success('Hore!', 'Post Deleted Successfully');
        return redirect('/brands');
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataBrands', $namaFile);

        Excel::import(new BrandsImport, public_path('/DataBrands/' . $namaFile));
        return redirect('/brands');
    }
}
