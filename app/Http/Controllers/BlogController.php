<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\postrequirment;
use App\Models\itemadd;
use App\Models\request_product;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $blogs = Blog::orderBy('created_at', 'desc');
        
        if ($request->search != null){
            $blogs = $blogs->where('title', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $blogs = $blogs->paginate(15);

        return view('backend.blog_system.blog.index', compact('blogs','sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = BlogCategory::all();
        return view('backend.blog_system.blog.create', compact('blog_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
        ]);

        $blog = new Blog;
        
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->banner = $request->banner;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        
        $blog->meta_title = $request->meta_title;
        $blog->meta_img = $request->meta_img;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        
        $blog->save();

        flash(translate('Blog post has been created successfully'))->success();
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $blog_categories = BlogCategory::all();
        
        return view('backend.blog_system.blog.edit', compact('blog','blog_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
        ]);

        $blog = Blog::find($id);

        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->banner = $request->banner;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        
        $blog->meta_title = $request->meta_title;
        $blog->meta_img = $request->meta_img;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        
        $blog->save();

        flash(translate('Blog post has been updated successfully'))->success();
        return redirect()->route('blog.index');
    }
    
    public function change_status(Request $request) {
        $blog = Blog::find($request->id);
        $blog->status = $request->status;
        
        $blog->save();
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        
        return redirect('admin/blogs');
    }


    public function all_blog() {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->paginate(12);
        return view("frontend.blog.listing", compact('blogs'));
    }
    
    public function blog_details($slug) {
        $blog = Blog::where('slug', $slug)->first();
        return view("frontend.blog.details", compact('blog'));
    }
    
    public function Postrequirment(){
        $allitem=itemadd::all();
        return view('Postrequirment',compact('allitem'));
    }
    public function addPostrequirment(Request $request){
        
       $path='uploads/';
         if($request->hasfile('files'))
        {
            $file = $request->file('files');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $path.time().'.'.$extenstion;
            $file->move('uploads/', $filename);
            $data=[
        'item_name'=>$request->input('item_name'),
        'description'=>$request->input('description'),
        'delivery_location'=>$request->input('delivery_location'),
        'item_qty'=>$request->input('item_qty'),
        'suppler'=>$request->input('suppler'),
        'valid_date'=>$request->input('valid_date'),
        'call_time'=>$request->input('call_time'),
        'name'=>$request->input('name'),
        'phone'=>$request->input('phone'),
        'address'=>$request->input('address'),
         'files'=>$filename,
        
        
    ];
            
        }
         postrequirment::create($data);
        flash(translate('Your postrequirment successfully submited'))->success();
        return redirect()->back();
    }
    
     public function requestpage()
    {
        return view('request_product');
    }

    public function requestproduct(Request $request)
    {
        // dd($request->all());

        $data = $request->all();
        $lastid = request_product::create($data)->id;

        return redirect()->back()->with('message', 'Product Request Success! Your Order ID Is: ' . $lastid . '');


    }



    public function dashboard()
    {
        $total = request_product::all()->count();
        $Processing = request_product::all()->where('Status', '=', 'Order processing')->count();
        $Delivered = request_product::all()->where('Status', '=', 'Order delivered')->count();
        $Cancel = request_product::all()->where('Status', '=', 'Cancel')->count();
        return view('backend.dashboard', compact('total', 'Processing', 'Cancel', 'Delivered'));
    }



    public function orderstatus(Request $request)
    {
        $orderids = $request->orderid;
        $row = request_product::all()->where('id', '=', $orderids)->first();
        if ($row) {
            echo ' <table class="table table-bordered">
                            <tr>
                                <th>Order ID</th>
                                <th>Email</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                            <td>
                                ' . $row->id . '
                            </td>
                            <td>
                                ' . $row->Email . '
                            </td>
                            <td>
                                ' . $row->Date . '
                            </td>
                            <td><strong> ' . $row->Status . '</strong>
                               
                            </td>
                        </table>';

        } else {
            echo "<p style='text-align: center; color:blue;' >No Match</p>";
        }
    }
    
    
    public function calculator(){
        return view('calculator');
    }

    
}
