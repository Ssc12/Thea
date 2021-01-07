<?php

namespace App\Http\Controllers;

use App\Review;
use App\Tea;
use Illuminate\Http\Request;

class TeaController extends Controller
{
    public function search(Request $request){
        $search = $request->get('q');
        $teas = Tea::where('name','like','%'.$search.'%')
                        ->orWhere('price','=','%'.$search.'%')->get();

        return view('search', compact('teas'));
    }

    public function detail(Tea $tea){
        
        $reviews = $tea->Review;
    
        $rating = 0;

        if($reviews->count() != 0){
            
            foreach($reviews as $review){
                $rating += $review->pivot->rating;
            }

            $rating /= $reviews->count();
        }

        return view('tea.detail',compact('tea','rating','reviews'));
    }

    public function addTea(Request $request){
        Tea::create([
            'name' => $request->teaName,
            'price' => $request->teaPrice,
            'description' => $request->teaDesc,
            'stock' => $request->teaStock,
            'image' => 'image/tea/'.$request->file('image')->getClientOriginalName(),
        ]);

        $image = $request->file('image');
        $fileName = $request->file('image')->getClientOriginalName();

        $image->move(public_path('image/tea'), $fileName);
        return redirect()->route('home');
    }

    public function deleteTea($tea_id){
        $tea =Tea::where('id',$tea_id)->first();
        if ($tea != null) {
            $tea->delete();
            return redirect()->route('home')->with(['message'=> 'Successfully deleted!!']);
        }
        return redirect()->route('home')->with(['message'=> 'Wrong ID!!']);
    }

    public function updateTea(Request $request, $tea_id){
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
