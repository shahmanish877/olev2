<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\BookBookTypeService;

class BookBookTypeController extends Controller
{
    public function __construct()
    {
        $this->service = new BookBookTypeService();
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->service->getAll();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation_results = $this->service->validate($request);
        if($validation_results === true)
        {
            return $this->service->store($request);
        }
        else
        {
            return $validation_results;
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->single($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation_results = $this->service->validate($request);
        if($validation_results === true)
        {
            return $this->service->update($request, $id);
        }
        else
        {
            return $validation_results;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
