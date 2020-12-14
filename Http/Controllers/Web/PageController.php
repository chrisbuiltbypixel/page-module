<?php

namespace Modules\Page\Http\Controllers\Web;

use Modules\Page\Transformers\Web\PageResource;
use Modules\Page\Transformers\Web\PageListResource;
use Modules\Page\Entities\Page;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return PageListResource::collection(Page::orderBy('order', 'ASC')->paginate(25));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($slug)
    {
        return new PageResource(Page::where('slug', $slug)->first());
    }

}
