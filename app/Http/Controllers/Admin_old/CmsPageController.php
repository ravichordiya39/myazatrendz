<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCmsPageRequest;
use App\Http\Requests\StoreCmsPageRequest;
use App\Http\Requests\UpdateCmsPageRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\CmsPage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CmsPageController extends Controller
{
    use FileUploadTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('cms_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CmsPage::query()->select(sprintf('%s.*', (new CmsPage())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'cms_page_show';
                $editGate = 'cms_page_edit';
                $deleteGate = 'cms_page_delete';
                $crudRoutePart = 'cms-pages';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                $id =  $row->id ? $row->id : '';
                return '<div class="text-center"><span class="text-dark">'.$id.'</span></div>';
            });
            $table->editColumn('title', function ($row) {
                $title =  $row->title ? $row->title : '';
                return '<div class="text-center"><span class="badge badge-dark p-2">'.$title.'</span></div>';
            });
            $table->editColumn('slug', function ($row) {
                $slug =  $row->slug ? $row->slug : '';
                return '<div class="text-center"><span class="badge badge-warning p-2">'.$slug.'</span></div>';
            });
            $table->editColumn('url', function ($row) {
                $url =  $row->url ? $row->url : '';
                return '<div class="text-center"><span class="text-secondary font-weight-bold">'.$url.'</span></div>';
            });
            $table->editColumn('image', function ($row) {
                $image =  $row->image ? $row->image : '';
                return '<div class="text-center"><span class="text-secondary font-weight-bold">'.$image.'</span></div>';
            });
            $table->editColumn('meta_title', function ($row) {
                $meta_title =  $row->meta_title ? $row->meta_title : '';
                return '<div class="text-center"><span class="badge p-2" style="background-color : #4c6f9c; color : white;">'.$meta_title.'</span></div>';
            });
            $table->editColumn('meta_description', function ($row) {
                $meta_description =  $row->meta_description ? $row->meta_description : '';
                return '<div class="text-center"><span class="badge p-2" style="background-color : #4c6f9c; color : white;">'.$meta_description.'</span></div>';
            });
            $table->editColumn('tags', function ($row) {
                $tag =  $row->tags ? $row->tags : '';
                return '<div class="text-center"><span class="badge badge-warning p-2">'.$tag.'</span></div>';
            });
            $table->editColumn('status', function ($row) {
                $status =  $row->status ? CmsPage::STATUS_SELECT[$row->status] : '';
                $is_attribute = $status === 'Active' ? 'checked' : '';
                return '<div class="text-center">
                            <label class="switch">
                                <input type="checkbox" '.$is_attribute.' id="is-attribute-chk" data-id="'.$row->id.'">
                                <span class="slider round"></span>
                            </label>
                        </div>';
            });

            $table->rawColumns(['actions', 'placeholder','id','title','slug','url','image','meta_title','meta_description','tags','status']);

            return $table->make(true);
        }

        return view('admin.cmsPages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cms_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cmsPages.create');
    }

    public function store(StoreCmsPageRequest $request)
    {
        CmsPage::create($request->all());

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $cmsPage->id]);
        // }

        return redirect()->route('admin.cms-pages.index');
    }

    public function edit(CmsPage $cmsPage)
    {
        abort_if(Gate::denies('cms_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cmsPages.edit', compact('cmsPage'));
    }

    public function update(UpdateCmsPageRequest $request, CmsPage $cmsPage)
    {
        $cmsPage->update($request->all());

        return redirect()->route('admin.cms-pages.index');
    }

    public function show(CmsPage $cmsPage)
    {
        abort_if(Gate::denies('cms_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cmsPages.show', compact('cmsPage'));
    }

    public function destroy(CmsPage $cmsPage)
    {
        abort_if(Gate::denies('cms_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cmsPage->delete();

        return back();
    }

    public function massDestroy(MassDestroyCmsPageRequest $request)
    {
        CmsPage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cms_page_create') && Gate::denies('cms_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CmsPage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function update_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;



        $page = CmsPage::find($id);
        $page->status = $status;
        $page->save();

        if($page->id)
            return response()->json(['code' => 200, 'success' => true, 'message' => 'Status updated successfully.']);
        else
            return response()->json(['code' => 503, 'success' => false, 'message' => 'Status updation failed.']);
    }
}
