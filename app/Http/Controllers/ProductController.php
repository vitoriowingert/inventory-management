<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Checkout;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function dailyreport()
    {
        $products = Product::all();
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkout()
    {
        $products = Product::all()
            ->where('stock', '>', 0);

        return view('checkout', ['products' => $products]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Home
     */
    public function create(Request $request)
    {
        $request->validate([
            'sku' => ['required', 'string', 'max:255', 'unique:products'],
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:1'],
        ]);

        $product = new Product;
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->stock = $request->amount;
        $product->save();

        return redirect()->route('home');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Home
     */
    public function checkoutAmount(Request $request)
    {
        $product = Product::find($request->productid);
        $input = 'checkout'.$request->productid;
        $max = $product->amount;

        $validator = Validator::make($request->all(), [
            $input => [ 'required', 'integer', 'min:1', 'max:'.$max ],
        ]);

        if ($validator->fails()) {
            return redirect('checkout')
                        ->withErrors($validator)
                        ->withInput($request->input());
        }

        $checkout = (int)$request->$input;

        $newAmount = $product->stock - $checkout;

        $product->stock = $newAmount;
        $product->save();

        $checkoutRegister = new Checkout;
        $checkoutRegister->product_id = $request->productid;
        $checkoutRegister->amount = $checkout;
        $checkoutRegister->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function destroy(Request $request)
    {
        $product = Product::find($request->productid);

        if($product){
            $product->delete();

            return response()->json(['code' => 1, 'msg' => "Item excluído com sucesso"]);
        }

        return response()->json(['code' => 0, 'msg' => "Ocorreu um erro ao tentar excluir o item. Tente novamente!"]);
    }
}
