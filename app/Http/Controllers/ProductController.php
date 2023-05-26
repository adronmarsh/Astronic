<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Str;
use League\Flysystem\Filesystem;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        if ($user->rol != 'corporation') {
            return redirect()->route('/');
        }
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        if ($user->rol == 'particular') {
            abort(403, 'No tienes permisos para subir un producto.');
        }
        $product = new Product;
        $product->user_id = $userId;
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->offer = $request['offer'];

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::uuid() . '.' . $extension;
            $adapter = new AwsS3V3Adapter(
                new S3Client([
                    'region' => env('AWS_DEFAULT_REGION'),
                    'version' => 'latest',
                    'credentials' => [
                        'key' => env('AWS_ACCESS_KEY_ID'),
                        'secret' => env('AWS_SECRET_ACCESS_KEY')
                    ]
                ]),
                env('AWS_BUCKET')
            );

            $filesystem = new Filesystem($adapter);

            $path = '/products/' . $fileName;

            $filesystem->write($path, file_get_contents($file));

            $url = env('AWS_URL') . $path;
            $product->url = $url;
        }

        $product->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        return view('shop.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->offer = $request->input('offer');
        $product->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }

    public function shop($userId)
    {
        $buyerId = Auth()->id();
        $buyer = User::findOrFail($buyerId);
        $user = User::findOrFail($userId);
        if ($user->rol != 'corporation') {
            return redirect()->route('/');
        }
        $products = Product::where('user_id', $userId)->get();
        return view('shop.show', compact('user', 'products','buyer'));
    }
}
