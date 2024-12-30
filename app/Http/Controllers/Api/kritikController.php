<?php

namespace App\Http\Controllers\Api;

//import model Post

use Illuminate\Http\Request;

//import resource PostResource
use App\Http\Controllers\Controller;

//import Http request
use App\Http\Resources\PostResource;
use App\Models\kritik;
//import facade Validator
use Illuminate\Support\Facades\Validator;

//import facade Storage
use Illuminate\Support\Facades\Storage;

class kritikController extends Controller
{

    public function index()
    {
        //get all posts
        $posts = kritik::all();

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $posts);
    }


    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'kritik'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        //create post
        $post = kritik::create([
            'nama'     => $request ->nama,
            'kritik'     => $request->kritik,

        ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find post by ID
        $post = kritik::find($id);

        //return single post as a resource
        return new PostResource(true, 'Detail Data Post!', $post);
    }

    
    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'kritik'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $post = kritik::find($id);

            //update post with new image
            $post->update([
                'nama'     => $request ->nama,
                'kritik'     => $request->kritik,
            ]);

        //return response
        return new PostResource(true, 'Data Post Berhasil Diubah!', $post);
    }
    public function destroy($id)
    {
        // Cari post berdasarkan ID
        $post = kritik::find($id);
    
        // Periksa apakah post ditemukan

    
        // Hapus post dari database
        $post->delete();
    
        // Return response sukses
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
    
}