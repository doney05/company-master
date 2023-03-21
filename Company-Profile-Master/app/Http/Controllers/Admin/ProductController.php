<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Product::all();
        return view('pages.backend.product.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = array();
        if ($files = $request->file('banner')) {
            foreach ($files as $item) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($item->getClientOriginalExtension());
                $image_fullname = $image_name.'.' . $ext;
                $upload_path = 'backend/multiple-image/';
                $image_url = $upload_path.$image_fullname;
                $item->move($upload_path, $image_fullname);
                $images[] = $image_url;
            }
        }
        if ($foto = $request->file('foto_produk')) {
            foreach ($foto as $item) {
                $foto_name = md5(rand(1000, 10000));
                $ext = strtolower($item->getClientOriginalExtension());
                $foto_fullname = $foto_name.'.' . $ext;
                $upload_path = 'backend/multiple-image/produk/';
                $image_url = $upload_path.$foto_fullname;
                $item->move($upload_path, $foto_fullname);
                $foto[] = $image_url;
            }
        }
         $data = [
            'banner' => implode('|', $images),
            'foto_produk' =>implode('|', $foto),
            'name' => $request->name
        ];
        Product::create($data);
        return redirect()->route('product.index')->with('success','Produk berhasil ditambahkan');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
