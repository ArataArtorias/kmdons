<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
// use DB;
use App\Brand;
use Input;
use Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\AuthTraits\OwnsRecord;
use App\Exceptions\UnauthorizedException;
// use Yajra\Datatables\Datatables;
use PDF;
// use App\Http\Controllers\Excel;
// use EXCEL;
use Excel;

class BrandController extends Controller
{
    use OwnsRecord;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $brands = Brand::all();
        $brands = Brand::paginate(100);
        // Brand::chunk(200, function ($brands) {
        // });
        // $brands = DB::select('SELECT * FROM brands WHERE name="aut"');
        // return view('brand.index',['brands'=>$brands]);
        return view('brand.index',['brands'=>$brands]);

        // $brands = DB::table('brands')->get();
        // $brands = DB::table('brands')->where('name', 'aut')->first();
        // $brands = App\Brand::where()
        //        ->orderBy('name', 'desc')
        //        ->get();
        // $users = DB::table('users')->get();
        // return $brands->id;
        // $brands->id;
        // return view('brand.index')->with('brands', $brands);
        // return view('brand.index', ['brands' => $brands]);
        // $flights = App\Flight::where('active', 1)
        //        ->orderBy('name', 'desc')
        //        ->take(10)
        //        ->get();
        // $brands = Brand::paginate(10);
        // return view('brand.index', compact('brands'));
        // return view('brand.index');
    }

    // public function anyData()
    // {
    //     return Datatables::of(Brand::query())->make(true);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:brands|string|max:30',
            'image_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $file_name = $request->image_file->getClientOriginalName();
        $file_name_woext = basename($request->file('image_file')->getClientOriginalName(), '.'.$request->file('image_file')->getClientOriginalExtension());
        $file_ext = $request->image_file->getClientOriginalExtension();
        $file_n = $file_name_woext.'.'.time().'.'.$file_ext;
        $request->image_file->move(public_path('images'), $file_n);

        // dd($test);

        // $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
        // $request->image_file->move(public_path('images'), $imageName);

        // $this->validate($request, [
        //     'name' => 'required|unique:brands|string|max:30',
        //     // 'profile' => 'required|unique:brands|string|max:30',
        // ]);

        // // getting all of the post data
        // $file = array('image' => Input::file('image_file'));
        // // setting up rules
        // $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // // doing the validation, passing post data, rules and the messages
        // $validator = Validator::make($file, $rules);
        // if ($validator->fails()) {
        //     // send back to the page with the input data and errors
        //     return Redirect::to('upload')->withInput()->withErrors($validator);
        // }
        // else {
        //     // checking file is valid.
        //     if (Input::file('image')->isValid()) {
        //         $destinationPath = 'uploads'; // upload path
        //         $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
        //         $fileName = rand(11111,99999).'.'.$extension; // renameing image
        //         Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        //         // sending back with message
        //         Session::flash('success', 'Upload successfully');
        //         return Redirect::to('upload');
        //     }
        //     else {
        //         // sending back with error message.
        //         Session::flash('error', 'uploaded file is not valid');
        //         return Redirect::to('upload');
        //     }
        // }

        $brand = Brand::create(['name' => $request->name, 'profile' => $request->profile, 'image_name' => $file_n, 'image_extension' => $file_ext, 'created_by' => Auth::user()->id]);
        $brand->save();
        // alert()->success('Congrats!', 'You made a Widget');
        return Redirect::route('brand.index')->with('message','Successfully Save !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $brand = Brand::findOrFail($id);
        if ( ! $this->adminOrCurrentUserOwns($brand)){
          throw new UnauthorizedException;
        }
        return view('brand.edit', compact('brand'));
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
        //
        $this->validate($request, [
            'name' => 'required|string|max:30|unique:brands,name,' .$id
        ]);
        $brand = Brand::findOrFail($id);
        if ($this->userNotOwnerOf($brand)){
        //   dd('you are not the owner');
        throw new UnauthorizedException;
        }
        // $slug = str_slug($request->name, "-");
        // $widget->update(['name' => $request->name,
        // 'slug' => $slug,
        // 'user_id' => Auth::id()]);
        // alert()->success('Congrats!', 'You updated a widget');

        $brand->update(['name' => $request->name, 'profile' => $request->profile]);

        alert()->success('Congrats!', 'You updated a Brand');
    return Redirect::route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf()
    {
      $brands = Brand::all();

      $pdf = PDF::loadView('brand.invoice', $brands);
      return $pdf->stream('invoice.pdf');

      # code...
    }

    public function excel()
    {
      $data = Brand::all();

      // $pdf = PDF::loadView('brand.invoice', $brands);
      // return $pdf->stream('invoice.pdf');

      // Excel::create('Laravel Excel', function($excel) {
      //   $excel->sheet('Excel sheet', function($sheet) {
      //     $sheet->setOrientation('landscape');
      //   });
      // })->export('xls');

      return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->export('xls');

      // Excel::create('New file', function($excel) {
      //   $excel->sheet('New sheet', function($sheet) {
      //     $sheet->loadView('folder.view');
      //   });
      // });

      // Excel::shareView('brand.invoice')->create();

    }

    public function generateDocx()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();


        $section = $phpWord->addSection();


        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


        $section->addImage("http://itsolutionstuff.com/frontTheme/images/logo.png");
        $section->addText($description);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('helloWorld.docx'));
        } catch (Exception $e) {
        }


        return response()->download(storage_path('helloWorld.docx'));
    }
}
