<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Product;
use App\Models\Category;
use App\Libs\Configs\StatusConfig;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->productModel = new Product();
		$this->categoryModel = new category();
	}

	public function detailProduct($slug, $id,Request $request) {
		$product = $category = $this->productModel::findOrFail($id);

		return view('Frontend.Contents.product.index', array(
    											'product' => $product));
	}

    public function category ($slug, $id, Request $request) {

    	$category = $this->categoryModel::findOrFail($id);

    	$arr_category = $this->categoryModel->select('id')->where(array(
    										array('status', StatusConfig::CONST_AVAILABLE),
    										array('depth', 'like', $category->depth.'%'),
    									))
    									->get()
    									->toArray();
        if ($request->has('order') && $request->get('order') == 'desc') {
            $orderName = 'id';
            $orderBy   = 'desc';
        } else if ($request->has('order') && $request->get('price_desc') == "price_desc") {
            $orderName = 'price';
            $orderBy   = 'desc';
        } else if ($request->has('order') && $request->get('price_asc') == 'price_asc') {
            $orderName = 'price';
            $orderBy   = 'asc';
        } else {
            $orderName = 'id';
            $orderBy   = 'desc';
        }
    	$products = $this->productModel->select('*')
    						->whereIn('category_id', array_column($arr_category, 'id'))
    						->where(array(
    							array('status', StatusConfig::CONST_AVAILABLE),
    						))
    						->orderBy($orderName, $orderBy)
    						->paginate(15);

    	return view('Frontend.Contents.category.index', array(
    											'category' => $category,
    											'products' => $products));
    }

    public function allCategory (Request $request) {
    	$products = $this->productModel::select('*')
    						->where(array(
    							array('status', StatusConfig::CONST_AVAILABLE)
    						))
    						->orderBy('id', 'desc')
    						->paginate(15);

    	return view('Frontend.Contents.category.index', array(
    	
        										'products' => $products));
    }

    public function allCategoryHot (Request $request) {
        $products = $this->productModel::select('*')
                            ->where(array(
                                array('status', StatusConfig::CONST_AVAILABLE),
                                array('hot', 1)
                            ))
                            ->orderBy('id', 'desc')
                            ->paginate(15);

        return view('Frontend.Contents.category.index', array(
                                                'products' => $products));
    }

    public function search(Request $request) {

        if ($request->has('order') && $request->get('order')) {
            $orderName = 'id';
            $orderBy   = 'desc';
        } else if ($request->has('order') && $request->get('price_desc')) {
            $orderName = 'price';
            $orderBy   = 'desc';
        } else if ($request->has('order') && $request->get('price_asc')) {
            $orderName = 'price';
            $orderBy   = 'asc';
        } else {
            $orderName = 'id';
            $orderBy   = 'desc';
        }

        if (empty($request->freeText)) {
            $products = $this->productModel->select('*')
                            ->where(array(
                                array('status', StatusConfig::CONST_AVAILABLE),
                            ))
                            ->orderBy($orderName, $orderBy)
                            ->paginate(15);
        } else {
            $products = $this->productModel->select('*')
                            ->orWhere('name', 'like', "%".$request->freeText."%")
                            ->orWhere('tag', 'like', "%".$request->freeText."%")
                            ->where(array(
                                array('status', StatusConfig::CONST_AVAILABLE),
                            ))
                            ->orderBy($orderName, $orderBy)
                            ->paginate(15);
        }
        return view('Frontend.Contents.search.search', array(
                                                'products' => $products, 'freeText' => $request->freeText));
    }
    

}
