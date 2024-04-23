<?php

namespace App\Http\Controllers\backnend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Mail\BlogCreatedMail;
use App\Models\Blog;
use App\Models\BlogPostView;
use App\Models\User;
use App\Notifications\ItemUpdatedNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogController extends BackendBaseController
{

    protected $route ='blog.';
    protected $panel ='Blog';
    protected $view ='backend.blog.';
    protected $title;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title= 'List';
        $data['row']=Blog::all();
        return view($this->__loadDataToView($this->view . 'index'),compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $this->title= 'Create';

        return view($this->__loadDataToView($this->view . 'create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $file = $request->file('image_file');
        if ($request->hasFile("image_file")) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/images/Blog/'), $fileName);
            $request->request->add(['image' => $fileName]);
        }


        $data['row']=Blog::create($request->all());
        Mail::to('user@example.com')->queue(new BlogCreatedMail($data['row']));
        if ($data['row']){
            request()->session()->flash('success',$this->panel . 'Created Successfully');
        }else{
            request()->session()->flash('error',$this->panel . 'Creation Failed');
        }
//        return redirect()->route('category.index',compact('data'));
        return redirect()->route($this->__loadDataToView($this->route . 'index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->title= 'View';
        $data['row']=Blog::findOrFail($id);
        BlogPostView::create([
            'user_id' => auth()->id(),
            'blog_id' => $id,
            'viewed_at'=>Carbon::now()
        ]);
        return view($this->__loadDataToView($this->view . 'view'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->title= 'Edit';
        $data['row']=Blog::findOrFail($id);
        return view($this->__loadDataToView($this->view . 'edit'),compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, $id)
    {

        $file = $request->file('image_file');
        if ($request->hasFile("image_file")) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/images/Blog/'), $fileName);
            $request->request->add(['image' => $fileName]);
        }

        $data['row'] =Blog::findOrFail($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route($this->__loadDataToView($this->route . 'index'));
        }
        if ($data['row']->update($request->all())) {
//            dd($data['row']);
            $users = User::all(); // Example for all users

            foreach ($users as $user) {
                $user->notify(new ItemUpdatedNotification($data['row']));
            }
//            $data['row']->user->notify(new ItemUpdatedNotification($data['row']));

            $request->session()->flash('success', $this->panel .' Update Successfully');
        } else {
            $request->session()->flash('error', $this->panel .' Update failed');

        }
        return redirect()->route($this->__loadDataToView($this->route . 'index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Blog::findorfail($id)->delete();
        return redirect()->route($this->__loadDataToView($this->route . 'index'))->with('success','Data Deleted Successfully');
    }

//    public function check_slug(Request $request)
//    {
//        $slug = str_slug($request->name);
//        return response()->json(['slug' => $slug]);
//    }
    public function recycle()
    {
        $this->title= 'Recycle';
        $data['row']=Blog::onlyTrashed()->get();


        return view($this->__loadDataToView($this->view . 'recycle'),compact('data'));
    }

    public function restore($id){
        $data['row'] =Blog:: where('id',$id)->withTrashed()->first();

        if ($data['row']->restore()){
            request()->session()->flash('success', $this->panel.' restored successfully');
        } else{
            request()->session()->flash('error', $this->panel.' restore failed');
        }
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $data['row']= Blog:: where('id',$id)->withTrashed()->first();
        if ($data['row']->forceDelete()){
            request()->session()->flash('success', $this->panel.' Delete successfully');
        } else{
            request()->session()->flash('error', $this->panel.' Delete failed');
        }
        return redirect()->route($this->__loadDataToView($this->route . 'index'))->with('success','Data Deleted Successfully');
    }
    public function changeStatusBlog(Request $request)
    {
        $slider = Blog::find($request->id);
        $slider->status = $request->status;
        $slider->save();

        return response()->json(['success'=>'Status change successfully.']);



    }


}
