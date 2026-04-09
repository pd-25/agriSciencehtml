<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatWeDo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WhatWeDoController extends Controller
{
    public function index(){
        $whatWeDos = WhatWeDo::paginate(10);
        return view("admin.whatwedo.index", compact("whatWeDos"));
    }

    public function store(Request $request){
        try {
            $whatWeDo = new WhatWeDo();
            $whatWeDo->title = $request->title;
            $whatWeDo->slug = Str::slug($request->title);
            $whatWeDo->description = $request->description;
            $whatWeDo->icon = $request->icon;
            $whatWeDo->color = $request->color;
            $whatWeDo->save();
            return redirect()->route("admin.whatwedo.index")->with("success", "What We Do added successfully");
        } catch (\Exception $e) {
            return redirect()->route("admin.whatwedo.index")->with("error", "Something went wrong");
        }
    }

    public function update(Request $request, $id){
        try{
            $whatWeDo = WhatWeDo::find($id);
            $whatWeDo->title = $request->title;
            $whatWeDo->slug = Str::slug($request->title);
            $whatWeDo->description = $request->description;
            $whatWeDo->icon = $request->icon;
            $whatWeDo->color = $request->color;
            $whatWeDo->save();
            return redirect()->route("admin.whatwedo.index")->with("success", "What We Do updated successfully");
        }catch(\Exception $e){
            return redirect()->route("admin.whatwedo.index")->with("error", "Something went wrong");
        }
    }

    public function destroy($id){
        try{
            $whatWeDo = WhatWeDo::find($id);
            $whatWeDo->delete();
            return redirect()->route("admin.whatwedo.index")->with("success", "What We Do deleted successfully");
        }catch(\Exception $e){
            return redirect()->route("admin.whatwedo.index")->with("error", "Something went wrong");
        }
    }
}
