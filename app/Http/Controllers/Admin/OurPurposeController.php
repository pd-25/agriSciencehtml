<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurPurpose;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OurPurposeController extends Controller
{
    public function index(){
        $whatWeDos = OurPurpose::paginate(10);
        return view("admin.ourpurpose.index", compact("whatWeDos"));
    }

    public function store(Request $request){
        try {
            $whatWeDo = new OurPurpose();
            $whatWeDo->title = $request->title;
            $whatWeDo->slug = Str::slug($request->title);
            $whatWeDo->description = $request->description;
            $whatWeDo->icon = $request->icon;
            $whatWeDo->color = $request->color;
            $whatWeDo->save();
            return redirect()->route("admin.ourpurpose.index")->with("success", "Added successfully");
        } catch (\Exception $e) {
            return redirect()->route("admin.ourpurpose.index")->with("error", "Something went wrong");
        }
    }

    public function update(Request $request, $id){
        try{
            $whatWeDo = OurPurpose::find($id);
            $whatWeDo->title = $request->title;
            $whatWeDo->slug = Str::slug($request->title);
            $whatWeDo->description = $request->description;
            $whatWeDo->icon = $request->icon;
            $whatWeDo->color = $request->color;
            $whatWeDo->save();
            return redirect()->route("admin.ourpurpose.index")->with("success", "Updated successfully");
        }catch(\Exception $e){
            return redirect()->route("admin.ourpurpose.index")->with("error", "Something went wrong");
        }
    }

    public function destroy($id){
        try{
            $whatWeDo = OurPurpose::find($id);
            $whatWeDo->delete();
            return redirect()->route("admin.ourpurpose.index")->with("success", "Deleted successfully");
        }catch(\Exception $e){
            return redirect()->route("admin.ourpurpose.index")->with("error", "Something went wrong");
        }
    }
}
