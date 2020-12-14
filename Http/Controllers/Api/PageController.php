<?php

namespace Modules\Page\Http\Controllers\Api;

use Modules\Page\Transformers\Api\PageResource;
use Modules\Page\Transformers\Api\PageListResource;
use Modules\Page\Http\Requests\UpdatePage;
use Modules\Page\Http\Requests\StorePage;
use Modules\Page\Entities\Page;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
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
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StorePage $request)
    {
        return Page::create($request->validated());

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Page $page)
    {
        return new PageResource($page);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdatePage $request, Page $page)
    {
        $page->update($request->validated());

        return $page;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        Page::whereIn('id', $request->id)->delete();
    }
}
