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
	 *       property="email",
	 *       required={"true"},
	 *       type="string",
	 *       description="The Post's email"
	 *   ),
	 *   @OA\Property(
	 *       property="password",
	 *       type="string",
	 *       required={"true"},
	 *       description="The email password"
	 *   ),
	 * )
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_id', 'title', 'description', 'category_id', 'user_id', 'image', ''
    ];
}
