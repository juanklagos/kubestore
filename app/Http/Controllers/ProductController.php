<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function externalProducts()
    {
        return view('external_products');
    }

    public function externalProductsLoad(Request $request)
    {
        $check = $this->checkProducts();
        if (count($check) > 0) {
            Alert::info('Información', 'Los productos ya fueron cargados.');
            return back();
        }
        $response = Http::get('https://fakestoreapi.com/products');
        $products = $response->json();

        foreach ($products as $product) {
            $item = new Product();
            $item->title = $product['title'];
            $item->price = $product['price'];
            $item->description = $product['description'];
            $item->category = $product['category'];
            $item->image = $product['image'];
            $item->save();
            $item
                ->addMediaFromUrl($product['image'])
                ->toMediaCollection('image');
        }
        Alert::success('Bien hecho', 'Productos cargados correctamente.');
        return redirect('products');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $price_min = $request->price_min;
        $price_max = $request->price_max;
        $products = Product::price()->search()->paginate(4);
        return view('products',compact('products','search','price_min','price_max'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkProducts()
    {
        return $products = Product::all();
    }
}
