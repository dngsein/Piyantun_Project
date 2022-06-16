<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdukRequest;
use App\Http\Requests\ProductImageRequest;

use App\Models\Product;
use App\Models\ProductImage;
use Auth;
use DB;
use Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::orderBy('id', 'ASC')->paginate(5);
        return view('admin.produk.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['products'] = null;

        return view('admin.produk.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        $params = $request->except('_token');
        $params['user_id'] = Auth::user()->id;
        
        $save = false;
        $save = DB::transaction(function() use ($params) {
            $product = Product::create($params);

            return true;
        });

        if ($save) {
            Session::flash('success', 'Produk berhasil disimpan');
        
        } else {
            Session::flash('error', 'Produk gagal disimpan');
        }

        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (empty($id)) {
            return redirect ('produk/create');
        }

        $product = Product::findOrFail($id);
       
        $this->data['productID'] = $product->id;
        $this->data['products'] = $product;

        return view('admin.produk.editForm', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, $id)
    {
        $params = $request->except('_token');
        
        $product = Product::findOrFail($id);

        $save = false;
        $save = DB::transaction(function() use ($product, $params){
            $product->update($params);
            return true;
        });
        if ($save) {
            Session::flash('success', 'Perubahan berhasil disimpan');
        
        } else {
            Session::flash('error', 'Perubahan gagal disimpan');
        }

        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            Session::flash('success', 'Data berhasil dihapus');
        }
        return view('admin.produk.index');
    }

    public function gambar($id) 
    {
        if (empty($id)) {
            return redirect('produk/create');
        }
        
        $product = Product::findOrFail($id);

        // $this->data['productID'] = $product->id;
        $this->data['productID'] = $product->id;
        $this->data['productImages'] = $product->product_images;
        // $this->data['productImages'] = ProductImage::orderBy('id', 'ASC')->paginate(10);
        

        return view('admin.produk.gambar', $this->data);
    }

    public function tambahGambar($id)
    {
        if (empty($id)) {
            return redirect('produk/create');
        }

        $product = Product::findOrFail($id);

        $this->data['productID'] = $id;
        $this->data['product'] = $product;

        return view('admin.produk.formGambar', $this->data);

    }

    public function uploadGambar (ProductImageRequest $request, $id) 
    {
        $product = Product::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $product->id.'_'.time();
            $fileName = $name.'.'.$image->getClientOriginalExtension();

            $folder = '/uploads/gambar_produk';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $params = [
                'product_id' => $product->id,
                'path' => $fileName,
            ];

            if (ProductImage::create($params)) {
                Session::flash('success', 'Gambar berhasil diupload');
            } else {
                Session::flash('eror', 'Gambar gagal diupload');
            }

            return redirect('produk/'. $id .'/gambar');
        }
    }

    public function hapusGambar($id) 
    {
        $image = ProductImage::findOrFail($id);

		$image->delete();

		return redirect('produk/' . $image->product_id . '/gambar')->with('success', 'Gambar berhasil dihapus');
    }

}
