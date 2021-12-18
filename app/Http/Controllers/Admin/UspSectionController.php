<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Controllers\Traits\CommonFunctionTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UspSection;

class UspSectionController extends Controller

{

    use FileUploadTrait, CommonFunctionTrait;



    public function index(Request $request)

    {
        $usp_data = UspSection::orderby('id', 'desc')->get();
        return view('admin.usp.index', compact('usp_data'));
    }



    public function create()
    {
        return view('admin.usp.create');
    }



    public function store(Request $request)
    {
        // $usp_data = $request->all();
        $new_usp = new UspSection();
        $new_usp->title = $request->title;
        $new_usp->status = $request->status;
        $new_usp->description = $request->description;
        $new_usp->image = $request->image;
        $new_usp->save();
        // UspSection::create($usp_data);

        return redirect()->route('admin.usp.index')->with('success', trans('global.create_success'));
    }



    public function edit($id)
    {
        $usp_data = UspSection::where('id',$id)->first();
        return view('admin.usp.edit', compact('usp_data'));
    }



    public function update(Request $request)
    {

        // $usp_data = $request->all();
        $usp_section = UspSection::where('id',$request->id)->first();
        $usp_section->title = $request->title;
        $usp_section->status = $request->status;
        $usp_section->description = $request->description;
        $usp_section->image = $request->image;
        $usp_section->save();

        return redirect()->route('admin.usp.index')->with('success', trans('global.update_success'));

    }



    public function show($id)
    {
        $usp_data = UspSection::where('id',$id)->first();
        return view('admin.usp.show', compact('usp_data'));
    }



    public function destroy($id)

    {
        UspSection::where('id',$id)->delete();
        return back()->with('success','Usp deleted successfully.');
    }





    public function update_status(Request $request)

    {
        $id = $request->id;
        $status = $request->status;
        $usp = UspSection::find($id);
        $usp->status = $status;
        $usp->save();
        if($usp->id)
            return response()->json(['code' => 200, 'success' => true, 'message' => 'Status updated successfully.']);
        else
            return response()->json(['code' => 503, 'success' => false, 'message' => 'Status updation failed.']);

    }

    public function storeCKEditorImages(Request $request)

    {
        $model         = new UspSection();

        $model->id     = $request->input('crud_id', 0);

        $model->exists = true;

        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');



        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);

    }

}

