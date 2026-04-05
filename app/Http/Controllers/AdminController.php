<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Topper;
use App\Models\Galary;
use App\Models\GalleryImages;
use App\Models\NoticeBoard;
use App\Models\Event;
use App\Models\Syllabus;
use App\Models\Result;
use App\Models\LatestNews;
use App\Models\Career;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // ─── Teachers ───────────────────────────────────

    public function teachersList()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function teacherStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('teachers', 'public');

        Teacher::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'photo' => $photoPath,
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher added successfully!');
    }

    public function teacherUpdate(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'designation' => $request->designation,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
        ];

        if ($request->hasFile('photo')) {
            if ($teacher->photo && \Storage::disk('public')->exists($teacher->photo)) {
                \Storage::disk('public')->delete($teacher->photo);
            }
            $data['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher->update($data);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function teacherDelete(Teacher $teacher)
    {
        if ($teacher->photo && \Storage::disk('public')->exists($teacher->photo)) {
            \Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully!');
    }

    // ─── Toppers ────────────────────────────────────

    public function toppersList()
    {
        $toppers = Topper::latest()->paginate(10);
        return view('admin.toppers.index', compact('toppers'));
    }

    public function topperStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('toppers', 'public');

        Topper::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.toppers.index')->with('success', 'Topper added successfully!');
    }

    public function topperUpdate(Request $request, Topper $topper)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('image')) {
            if ($topper->image && \Storage::disk('public')->exists($topper->image)) {
                \Storage::disk('public')->delete($topper->image);
            }
            $data['image'] = $request->file('image')->store('toppers', 'public');
        }

        $topper->update($data);

        return redirect()->route('admin.toppers.index')->with('success', 'Topper updated successfully!');
    }

    public function topperDelete(Topper $topper)
    {
        if ($topper->image && \Storage::disk('public')->exists($topper->image)) {
            \Storage::disk('public')->delete($topper->image);
        }

        $topper->delete();

        return redirect()->route('admin.toppers.index')->with('success', 'Topper deleted successfully!');
    }

    // ─── Gallery ─────────────────────────────────────

    public function galleryList()
    {
        $galleries = Galary::withCount('images')->latest()->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function galleryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'preview_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'short_description' => 'nullable|string|max:255',
        ]);

        $previewPath = $request->file('preview_image')->store('gallery/previews', 'public');

        $gallery = Galary::create([
            'name' => $request->name,
            'preview_image' => $previewPath,
            'short_description' => $request->short_description,
        ]);

        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('gallery/images', 'public');
            GalleryImages::create([
                'image' => $imagePath,
                'gallery_id' => $gallery->id,
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery created successfully!');
    }

    public function galleryUpdate(Request $request, Galary $galary)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'short_description' => 'nullable|string|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'short_description' => $request->short_description,
        ];

        if ($request->hasFile('preview_image')) {
            if ($galary->preview_image && \Storage::disk('public')->exists($galary->preview_image)) {
                \Storage::disk('public')->delete($galary->preview_image);
            }
            $data['preview_image'] = $request->file('preview_image')->store('gallery/previews', 'public');
        }

        $galary->update($data);

        // Add new images if provided
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('gallery/images', 'public');
                GalleryImages::create([
                    'image' => $imagePath,
                    'gallery_id' => $galary->id,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully!');
    }

    public function galleryDelete(Galary $galary)
    {
        // Delete preview image
        if ($galary->preview_image && \Storage::disk('public')->exists($galary->preview_image)) {
            \Storage::disk('public')->delete($galary->preview_image);
        }

        // Delete all gallery images from storage
        foreach ($galary->images as $image) {
            if (\Storage::disk('public')->exists($image->image)) {
                \Storage::disk('public')->delete($image->image);
            }
        }

        $galary->delete(); // cascade deletes gallery_images rows

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully!');
    }

    public function galleryImageDelete(GalleryImages $galleryImage)
    {
        if (\Storage::disk('public')->exists($galleryImage->image)) {
            \Storage::disk('public')->delete($galleryImage->image);
        }

        $galleryImage->delete();

        return back()->with('success', 'Image removed successfully!');
    }

    // ─── Notice Board ───────────────────────────────

    public function noticeBoardList()
    {
        $notices = NoticeBoard::latest()->paginate(10);
        return view('admin.noticeboard.index', compact('notices'));
    }

    public function noticeBoardStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'small_desc' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'pdf' => 'required|mimes:pdf|max:5120',
            'date' => 'required|date',
        ]);

        $imagePath = $request->file('image')->store('noticeboard', 'public');
        $pdfPath = $request->file('pdf')->store('noticeboard/pdfs', 'public');

        NoticeBoard::create([
            'title' => $request->title,
            'small_desc' => $request->small_desc,
            'image' => $imagePath,
            'pdf' => $pdfPath,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice added successfully!');
    }

    public function noticeBoardUpdate(Request $request, NoticeBoard $noticeBoard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'small_desc' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'date' => 'required|date',
        ]);

        $data = [
            'title' => $request->title,
            'small_desc' => $request->small_desc,
            'date' => $request->date,
        ];

        if ($request->hasFile('image')) {
            if ($noticeBoard->image && \Storage::disk('public')->exists($noticeBoard->image)) {
                \Storage::disk('public')->delete($noticeBoard->image);
            }
            $data['image'] = $request->file('image')->store('noticeboard', 'public');
        }

        if ($request->hasFile('pdf')) {
            if ($noticeBoard->pdf && \Storage::disk('public')->exists($noticeBoard->pdf)) {
                \Storage::disk('public')->delete($noticeBoard->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('noticeboard/pdfs', 'public');
        }

        $noticeBoard->update($data);

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice updated successfully!');
    }

    public function noticeBoardDelete(NoticeBoard $noticeBoard)
    {
        if ($noticeBoard->image && \Storage::disk('public')->exists($noticeBoard->image)) {
            \Storage::disk('public')->delete($noticeBoard->image);
        }

        if ($noticeBoard->pdf && \Storage::disk('public')->exists($noticeBoard->pdf)) {
            \Storage::disk('public')->delete($noticeBoard->pdf);
        }

        $noticeBoard->delete();

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice deleted successfully!');
    }

    // ─── Events ──────────────────────────────────────

    public function eventsList()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function eventStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('events', 'public');

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'event_date' => $request->event_date,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event added successfully!');
    }

    public function eventUpdate(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
        ];

        if ($request->hasFile('image')) {
            if ($event->image && \Storage::disk('public')->exists($event->image)) {
                \Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function eventDelete(Event $event)
    {
        if ($event->image && \Storage::disk('public')->exists($event->image)) {
            \Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    // ─── Syllabus ────────────────────────────────────

    public function syllabusList()
    {
        $syllabi = Syllabus::latest()->paginate(10);
        return view('admin.syllabus.index', compact('syllabi'));
    }

    public function syllabusStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $pdfPath = $request->file('pdf')->store('syllabus', 'public');

        Syllabus::create([
            'title' => $request->title,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('admin.syllabus.index')->with('success', 'Syllabus added successfully!');
    }

    public function syllabusUpdate(Request $request, Syllabus $syllabus)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('pdf')) {
            if ($syllabus->pdf && \Storage::disk('public')->exists($syllabus->pdf)) {
                \Storage::disk('public')->delete($syllabus->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('syllabus', 'public');
        }

        $syllabus->update($data);

        return redirect()->route('admin.syllabus.index')->with('success', 'Syllabus updated successfully!');
    }

    public function syllabusDelete(Syllabus $syllabus)
    {
        if ($syllabus->pdf && \Storage::disk('public')->exists($syllabus->pdf)) {
            \Storage::disk('public')->delete($syllabus->pdf);
        }

        $syllabus->delete();

        return redirect()->route('admin.syllabus.index')->with('success', 'Syllabus deleted successfully!');
    }

    // ─── Results ─────────────────────────────────────

    public function resultsList()
    {
        $results = Result::latest()->paginate(10);
        return view('admin.results.index', compact('results'));
    }

    public function resultStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $pdfPath = $request->file('pdf')->store('results', 'public');

        Result::create([
            'title' => $request->title,
            'pdf' => $pdfPath,
        ]);

        return redirect()->route('admin.results.index')->with('success', 'Result added successfully!');
    }

    public function resultUpdate(Request $request, Result $result)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('pdf')) {
            if ($result->pdf && \Storage::disk('public')->exists($result->pdf)) {
                \Storage::disk('public')->delete($result->pdf);
            }
            $data['pdf'] = $request->file('pdf')->store('results', 'public');
        }

        $result->update($data);

        return redirect()->route('admin.results.index')->with('success', 'Result updated successfully!');
    }

    public function resultDelete(Result $result)
    {
        if ($result->pdf && \Storage::disk('public')->exists($result->pdf)) {
            \Storage::disk('public')->delete($result->pdf);
        }

        $result->delete();

        return redirect()->route('admin.results.index')->with('success', 'Result deleted successfully!');
    }

    // ─── Latest News ────────────────────────────────

    public function latestNewsList()
    {
        $news = LatestNews::latest()->paginate(10);
        return view('admin.latest-news.index', compact('news'));
    }

    public function latestNewsStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        LatestNews::create([
            'title' => $request->title,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.latest-news.index')->with('success', 'News item added successfully!');
    }

    public function latestNewsUpdate(Request $request, LatestNews $latestNews)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $latestNews->update([
            'title' => $request->title,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.latest-news.index')->with('success', 'News item updated successfully!');
    }

    public function latestNewsToggle(LatestNews $latestNews)
    {
        $latestNews->update(['status' => !$latestNews->status]);

        return redirect()->route('admin.latest-news.index')->with('success', 'Status updated successfully!');
    }

    public function latestNewsDelete(LatestNews $latestNews)
    {
        $latestNews->delete();

        return redirect()->route('admin.latest-news.index')->with('success', 'News item deleted successfully!');
    }

    // ─── Careers ─────────────────────────────────────

    public function careersList()
    {
        $careers = Career::latest()->paginate(10);
        return view('admin.careers.index', compact('careers'));
    }

    public function careerStore(Request $request)
    {
        $request->validate([
            'post_name' => 'required|string|max:255',
            'openings' => 'required|string|max:255',
            'qualifications' => 'required|string|max:500',
        ]);

        Career::create([
            'post_name' => $request->post_name,
            'openings' => $request->openings,
            'qualifications' => $request->qualifications,
        ]);

        return redirect()->route('admin.careers.index')->with('success', 'Career opening added successfully!');
    }

    public function careerUpdate(Request $request, Career $career)
    {
        $request->validate([
            'post_name' => 'required|string|max:255',
            'openings' => 'required|string|max:255',
            'qualifications' => 'required|string|max:500',
        ]);

        $career->update([
            'post_name' => $request->post_name,
            'openings' => $request->openings,
            'qualifications' => $request->qualifications,
        ]);

        return redirect()->route('admin.careers.index')->with('success', 'Career opening updated successfully!');
    }

    public function careerDelete(Career $career)
    {
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Career opening deleted successfully!');
    }
}
