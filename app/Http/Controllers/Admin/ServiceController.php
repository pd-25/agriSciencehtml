<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
        public function index(){
        $whatWeDos = Service::paginate(10);
        return view("admin.service.index", compact("whatWeDos"));
    }

    public function store(Request $request){
        try {
            $whatWeDo = new Service();
            $whatWeDo->title = $request->title;
            $whatWeDo->slug = Str::slug($request->title);
            $whatWeDo->description = $request->description;
            $whatWeDo->youtube_link = $request->youtube_link;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/services'), $imageName);
                $whatWeDo->image = 'uploads/services/' . $imageName;
            }
            $whatWeDo->color = $request->color;
            $whatWeDo->save();
            return redirect()->route("admin.service.index")->with("success", "Added successfully");
        } catch (\Exception $e) {
            return redirect()->route("admin.service.index")->with("error", "Something went wrong");
        }
    }

    public function update(Request $request, $id){
        try{
            $whatWeDo = Service::find($id);
            $whatWeDo->title = $request->title;
            $whatWeDo->slug = Str::slug($request->title);
            $whatWeDo->description = $request->description;
            $whatWeDo->youtube_link = $request->youtube_link;
            if ($request->hasFile('image')) {
                if ($whatWeDo->image && file_exists(public_path($whatWeDo->image))) {
                    unlink(public_path($whatWeDo->image));
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/services'), $imageName);
                $whatWeDo->image = 'uploads/services/' . $imageName;
            }
            $whatWeDo->color = $request->color;
            $whatWeDo->save();
            return redirect()->route("admin.service.index")->with("success", "Updated successfully");
        }catch(\Exception $e){
            return redirect()->route("admin.service.index")->with("error", "Something went wrong");
        }
    }

    public function destroy($id){
        try{
            $whatWeDo = Service::find($id);
            if ($whatWeDo->image && file_exists(public_path($whatWeDo->image))) {
                unlink(public_path($whatWeDo->image));
            }
            $whatWeDo->delete();
            return redirect()->route("admin.service.index")->with("success", "Deleted successfully");
        }catch(\Exception $e){
            return redirect()->route("admin.service.index")->with("error", "Something went wrong");
        }
    }
}
