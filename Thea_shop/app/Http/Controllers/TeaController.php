<?php

namespace App\Http\Controllers;

use App\Review;
use App\Tea;
use Auth;
use Illuminate\Http\Request;

class TeaController extends Controller
{
    public function search(Request $request){
        $search = $request->get('q');
        $teas = Tea::where('name','like','%'.$search.'%')
                        ->orWhere('price','=','%'.$search.'%')->get();

        return view('search', compact('teas'));
    }

    public function viewAll(){
        $teas = Tea::paginate(15);
        return view('tea.all_tea', compact('teas'));
    }

    public function detail(Tea $tea){
        
        $reviews = $tea->Review;
    
        $rating = $tea->rating;

        return view('tea.detail',compact('tea','rating','reviews'));
    }

    public function addTea(Request $request){
        if(Auth::user() == null) return redirect()->route('home');
        if(Auth::user()->role_id != 2) return redirect()->route('home');

        $tea = new \App\Tea;
        $tea->name = $request->teaName;
        $tea->price = $request->teaPrice;
        $tea->description = $request->teaDesc;
        $tea->stock = $request->teaStock;

        $path = $request->file('image')->store('/image/tea/', 'public');
        $tea->image = "storage/".$path;
        $tea->save();

        return redirect()->route('home');
    }

    public function deleteTea($tea_id){
        if(Auth::user() == null) return redirect()->route('home');
        if(Auth::user()->role_id != 2) return redirect()->route('home');

        $tea =Tea::where('id',$tea_id)->first();
        if ($tea != null) {
            $tea->delete();
            return redirect()->route('home')->with(['message'=> 'Successfully deleted!!']);
        }
        return redirect()->route('home')->with(['message'=> 'Wrong ID!!']);
    }

    public function updateTea(Request $request, $tea_id){
        if(Auth::user() == null) return redirect()->route('home');
        if(Auth::user()->role_id != 2) return redirect()->route('home');

        $tea = Tea::findOrFail($tea_id);
        
        if ($request->image == null) {
            $tea_photo = $tea->image;
        } else {
            $imageOriginName = $request->image->getClientOriginalName();
            $imageFullName = $imageOriginName . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/tea'), $imageFullName);
            $tea_photo = $imageFullName;
        }

        $tea = Tea::findOrFail($tea_id)->update([
            'name' => $request->teaName,
            'price' => $request->teaPrice,
            'description' => $request->teaDesc,
            'stock' => $request->teaStock,
            'image' => 'image/tea/'.$tea_photo,
        ]);

        return redirect()->route('home');
    }
}
