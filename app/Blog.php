<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Base
{
	/**
	 * @OA\Schema(
	 *   schema="Blogs",
	 *   type="object",
	 *   @OA\Property(
	 *       property="title",
	 *       required={"true"},
	 *       type="string",
	 *       description="The Blogs title"
	 *   ),
	 *   @OA\Property(
	 *       property="description",
	 *       type="string",
	 *       required={"true"},
	 *       description="The Blogs description"
	 *   ),
	 *   @OA\Property(
	 *       property="category_id",
	 *       type="number",
	 *       required={"true"},
	 *       description="The Blogs category"
	 *   ),
	 *   @OA\Property(
	 *       property="user_id",
	 *       type="number",
	 *       required={"true"},
	 *       description="The Blogs user"
	 *   ),
	 *   @OA\Property(
	 *       property="image",
	 *       type="string",
	 *       required={"true"},
	 *       description="The Blogs image"
	 *   ),
	 * )
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_id', 'title', 'description', 'category_id', 'user_id', 'image'
    ];
}
