<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller {
    //
    public function homepage() {
        return view( 'layouts.web-app' );
    }
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request ) {
        if ( $request->format() == 'html' ) {
            return response( view( 'layouts.web-app' ) );
        } else {
            $query = Customer::get();
            return $query;
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'layouts.web-app' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $data  = $request->all();
        $image = $request->file( 'image' );

        if ( !empty( $image ) ) {
            $data['image'] = $this->upload( $image, 'customer' );
        }
        $res = Customer::create( $data );
        return response()->json( ['message' => 'Successfully Created'], 200 );
    }

    /**
     * Display the specified resource.
     */
    public function show( $id ) {
        return Customer::find( $id );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Customer $customer ) {
        return view( 'layouts.web-app' );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Customer $customer ) {

        $data  = $request->all();
        $image = $request->file( 'image' );
        if ( !empty( $image ) ) {
            $data['image'] = $this->upload( $image, 'customer', $customer->image );
        }
        $customer->fill( $data )->save();
        return response()->json( ['message' => 'Successfully Update'], 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Customer $customer ) {
        //
    }

    /**
     * Image Upload in storage.
     */
    protected function upload( $file, $path, $old = null ) {
        $code = date( 'ymdhis' ) . '-' . rand( 1111, 9999 );

        # DELETE OLD IMAGE
        if ( !empty( $old ) ) {
            $oldFile = $this->oldFile( $old );
            if ( Storage::disk( 'public' )->exists( $oldFile ) ):
                Storage::delete( $oldFile );
            endif;
        }

        # FILE/IMAGE UPLOAD
        if ( !empty( $file ) ) {
            $fileName = $code . $file->getClientOriginalName();
            return Storage::putFileAs( 'upload/' . $path, $file, $fileName );
        }
    }
    # OLD IMAGE
    public function oldFile( $file ) {
        $ex = explode( 'storage/', $file );

        return $ex[1] ?? "";
    }
}