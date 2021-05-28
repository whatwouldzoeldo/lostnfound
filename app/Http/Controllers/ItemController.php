<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //
    function addItem (Request $req)
    {
        $item = new Item;
        $item->judul=$req->input('judul');
        $item->file_path=$req->file('foto')->store('items');
        $item->kategori=$req->input('kategori');
        $item->tipe=$req->input('tipe');
        $item->keterangan=$req->input('keterangan');
        $item->lokasi=$req->input('lokasi');
        $item->kontak=$req->input('kontak');
        $item->save();
        return $item;
    }

    function listItem()
    {
        return Item::all();
    }

    function deleteItem ($id)
    {
        $result= Item::where('id', $id)->delete();
        if($result)
        {
            return ["result"=> "Item berhasil dihapus"];
        }
        else {
            return ["result"=> "Operation failed"];
        }
    }
}
