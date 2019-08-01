<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Resources\BlogsCollection;

class BlogsController extends Controller
{
   /**
    * @OA\Get(
    *   path="/blogs",
    *   summary="Lists available Users",
    *   description="Gets all available Users resources",
    *   tags={"Users"},
    *   security={{"passport": {"*"}}},
    *   @OA\Parameter(
    *       name="paginate",
    *       in="query",
    *       description="paginate",
    *       required=false,
    *       @OA\Schema(
    *           title="Paginate",
    *           example="true",
    *           type="boolean",
    *           description="The unique identifier of a Post resource"
    *       )
    *   ),
    *   @OA\Parameter(
    *       name="dataSearch",
    *       in="query",
    *       description="Post resource name",
    *       required=false,
    *       @OA\Schema(
    *           type="string",
    *           description="The unique identifier of a Post resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="sortField",
    *       in="query",
    *       description="Sort field",
    *       required=false,
    *       @OA\Schema(
    *           title="Title",
    *           type="string",
    *           example="title",
    *           description="The unique identifier of a Post resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="sortOrder",
    *       in="query",
    *       description="Sort order field",
    *       @OA\Schema(
    *           title="sortOrder",
    *           example="asc",
    *           type="string",
    *           description="The unique identifier of a Post resource"
    *       )
    *    ),
    *   @OA\Parameter(
    *       name="perPage",
    *       in="query",
    *       description="Sort order field",
    *       @OA\Schema(
    *           title="perPage",
    *           type="number",
    *           default="0",
    *           description="The unique identifier of a Post resource"
    *       )
    *    ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response=200,
    *       description="A list with Users",
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response=401,
    *       description="Unauthenticated."
    *   ),
    *   @OA\Response(
    *       @OA\MediaType(mediaType="application/json"),
    *       response="default",
    *       description="an ""unexpected"" error"
    *   ),
    * )
    *
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
  */
    public function index(Request $request)
    {
        $q = Blog::select();

        $blogs = Blog::search($request->toArray(), $q);

        return new BlogsCollection($blogs);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
