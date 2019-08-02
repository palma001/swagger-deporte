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
        *   tags={"Blogs"},
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
        *           description="The unique identifier of a Blogs resource"
        *       )
        *   ),
        *   @OA\Parameter(
        *       name="dataSearch",
        *       in="query",
        *       description="Blogs resource name",
        *       required=false,
        *       @OA\Schema(
        *           type="string",
        *           description="The unique identifier of a Blogs resource"
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
        *           description="The unique identifier of a Blogs resource"
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
        *           description="The unique identifier of a Blogs resource"
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
        *           description="The unique identifier of a Blogs resource"
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
        * @OA\Post(
        *   path="/blogs",
        *   summary="Creates a new Blogs",
        *   description="Creates a new Blogs",
        *   tags={"Blogs"},
        *   security={{"passport": {"*"}}},
        *   @OA\RequestBody(
        *   @OA\MediaType(
        *       mediaType="application/json",
        *       @OA\Schema(ref="#/components/schemas/Blogs")
        *   )
        *   ),
        *   @OA\Response(
        *   @OA\MediaType(mediaType="application/json"),
        *   response=200,
        *   description="The Blogs resource created",
        *   ),
        *   @OA\Response(
        *   @OA\MediaType(mediaType="application/json"),
        *   response=401,
        *   description="Unauthenticated."
        *   ),
        *   @OA\Response(
        *   @OA\MediaType(mediaType="application/json"),
        *   response="default",
        *   description="an ""unexpected"" error",
        *   )
        * )
        *
        * Store a newly created resource in storage.
        *
        * @param \Illuminate\Http\Request $request
        *
        * @return \Illuminate\Http\Response
        */
    public function store(Request $request)
    {
        $blogs = new Blog;
        $blogs->title = $request->title;
        $blogs->description = $request->description;
        $blogs->category_id = $request->category_id;
        $blogs->user_id = $request->user_id;
        $blogs->image = $request->image;
        $blogs->save();
        return response()->json($request, 201);
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
        * @OA\Put(
        *   path="/blogs/{id}",
        *   summary="Updates a Blogs resource",
        *   description="Updates a Blogs resource by the id",
        *   tags={"Blogs"},
        *   security={{"passport": {"*"}}},
        *   @OA\Parameter(
        *       name="id",
        *       in="path",
        *       description="Blogs resource id",
        *       required=true,
        *       @OA\Schema(
        *           type="integer",
        *           format="int64",
        *           description="The unique identifier of a Blogs resource"
        *       )
        *   ),
        *   @OA\RequestBody(
        *       @OA\MediaType(
        *           mediaType="application/json",
        *           @OA\Schema(ref="#/components/schemas/Blogs")
        *       )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=200,
        *       description="The Blogs resource updated"
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
        *   )
        * )
        *
        * Update the specified resource in storage.
        *
        * @param \Illuminate\Http\Request $request
        * @param  int  $id
        *
        * @return \Illuminate\Http\Response
        */
    public function update(Request $request, $id)
    {
        $blogs = Blog::where('blog_id', $id)->get();
        if (count($blogs) > 0) {
            Blog::where('blog_id', $id)->update($request->all());
            return response()->json($blogs, 201);
        } else {
            return response()->json('error updating', 401);
        }
    }

    /**
        * @OA\Delete(
        *   path="/blogs/{id}",
        *   summary="Removes a Blogs resource",
        *   description="Removes a Blogs resource",
        *   tags={"Blogs"},
        *   security={{"passport": {"*"}}},
        *   @OA\Parameter(
        *   name="id",
        *   in="path",
        *   description="The Blogs resource id",
        *   required=true,
        *   @OA\Schema(
        *       type="integer",
        *       format="int64",
        *       description="The unique identifier of a Blogs resource"
        *   )
        *   ),
        *   @OA\Response(
        *       @OA\MediaType(mediaType="application/json"),
        *       response=204,
        *       description="The resource has been deleted"
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
        *   )
        * )
        *
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        *
        * @return \Illuminate\Http\Response
        */
    public function destroy($id)
    {
        $blogs = Blog::where('blog_id', $id)->get();
        if (count($blogs) > 0) {
            Blog::where('blog_id', $id)->delete();
            return response()->json('Data deleted successfully!', 200);
        } else {
            return response()->json('error deleting', 401);
        }
    }
}
