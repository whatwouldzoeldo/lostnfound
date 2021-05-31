<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Facade\Ignition\ErrorPage\Renderer;
use FFI\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{

    public function index()
    {
        return Item::all();
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function store(Request $request)
    {

        // $item = Item::create($request->all()); //Work

        // $request->validate([
        //     'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'judul' => 'required',
        //     'keterangan' => 'required',
        //     'lokasi' => 'required',
        //     'kontak' => 'required',
        // ]);

        // $pathFoto = time() . '.' . $request->foto->extension();

        // $request->foto->move(public_path('images'), $pathFoto);

        // $item = new Item;
        // $item->judul = $request->judul;
        // $item->keterangan = $request->keterangan;
        // $item->lokasi = $request->lokasi;
        // $item->kontak = $request->kontak;
        // $result = $item->save();

        // if ($result) {
        //     return response()->json($item, 201);
        // }else{
        //     return response()->json(['message'=>'error']);
        // }
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'judul' => 'required',
                'keterangan' => 'required',
                'lokasi' => 'required',
                'kontak' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($files = $request->foto) {

            //store file into document folder
            $file = $request->foto->store('products');

            //store your file into database
            $item = new item();
            $item->judul = $request->judul;
            $item->foto = $file;
            $item->keterangan = $request->keterangan;
            $item->lokasi = $request->lokasi;
            $item->kontak = $request->kontak;
            $item->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $item
            ]);
        }
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return response()->json($item, 200);
    }

    public function delete(Item $item)
    {
        $item->delete();

        return response()->json(null, 204);
    }
}
