<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Models\Product;

class APIProductsController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prd = Product::all();
        return $this->sendResponse($prd, 'Data sended');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
            'id_type' =>'required',
            'unit_price' => 'required',
            'promotion_price'=> 'required',
            'image' => 'required',
            'status' => 'required'
        ]);

        if( $validator->fails() ){
            return $this->sendError($validator->errors(), 'Something wrong', 502);
        }

        $prd = new Product();
        $prd->name = $data['name'];
        $prd->id_type = $data['id_type'];
        $prd->description = $data['description'];
        $prd->unit_price = $data['unit_price'];
        $prd->promotion_price = $data['promotion_price'];
        $prd->status = $data['status'];
        $prd->image = $data['image'];
        $prd->save();

        return $this->sendResponse($prd->toArray(), 'Products created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prd = Product::find($id);

        if ( is_null($id) )
        {
            return $this->sendError('Products not found!');
        }

        return $this->sendResponse($prd->toArray(), 'Sended data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'name'              => 'required',
            'id_type'           => 'required',
            'description'       => 'required',
            'unit_price'        => 'required',
            'promotion_price'   => 'required',
            'image'             => 'required',
            'status'            => 'required',
        ]);

        if ( $validate->fails() ){
            return $this->sendError($validate->errors(), 'Something wrong!');
        }

        $prd = Product::find($id);
        $prd->name              = $data['name'];
        $prd->id_type           = $data['id_type'];
        $prd->description       = $data['description'];
        $prd->unit_price        = $data['unit_price'];
        $prd->promotion_price   = $data['promotion_price'];
        $prd->image             = $data['image'];
        $prd->status            = $data['status'];
        $prd->save();

        return $this->sendResponse($prd->toArray(), 'Updated products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prd = Product::find($id);

        if ( is_null($prd) ){
            return $this->sendError('Product is not exsist.');
        }

        $prd->delete();

        return $this->sendResponse($id, 'Deleted Product');
    }
}
