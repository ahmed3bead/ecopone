<?php

namespace App\CouponApp\Modules\SocialMedia\Web\Controllers;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\CouponApp\Modules\SocialMedia\Web\Services\SocialMediaService;
use Illuminate\Http\Request;

use App\CouponApp\Modules\SocialMedia\Web\Requests\SocialMediaListRequest;
use App\CouponApp\Modules\SocialMedia\Web\Requests\SocialMediaShowRequest;
use App\CouponApp\Modules\SocialMedia\Web\Requests\SocialMediaUpdateRequest;
use App\CouponApp\Modules\SocialMedia\Web\Requests\SocialMediaDeleteRequest;
use App\CouponApp\Modules\SocialMedia\Web\Requests\SocialMediaCreateRequest;
use App\CouponApp\BaseCode\Requests\BaseRequest;

use App\CouponApp\BaseCode\Controllers\BaseApiController;

class SocialMediaController extends BaseApiController
{
    protected SocialMediaService $SocialMediaService;

    public function __construct(SocialMediaService $SocialMediaService)
    {
        $this->SocialMediaService = $SocialMediaService;
    }

        public function index(SocialMediaListRequest $request)
    {
        // You can customize this method to fetch data using the service
        $data = $this->SocialMediaService->all($request);
        return view('voyager::bread.browse', compact('data'));
    }

    public function show(SocialMediaShowRequest $request, $id)
    {
        $data = $this->SocialMediaService->find($request,$id);
        return view('voyager::bread.read', compact('data'));
    }

    public function create(BaseRequest $request)
    {
        return view('voyager::bread.edit-add');
    }

    public function store(SocialMediaCreateRequest $request)
    {
        $data = $this->SocialMediaService->create($request,$request->all());
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function edit(BaseRequest $request,$id)
    {
        $data = $this->SocialMediaService->find($request,$id);
        return view('voyager::bread.edit-add', compact('data'));
    }

    public function update(SocialMediaUpdateRequest $request, $id)
    {
        $data = $this->SocialMediaService->update($request,$request->all(), $id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }

    public function destroy(SocialMediaDeleteRequest  $request, $id)
    {
        $this->SocialMediaService->delete($request,$id);
        return redirect()->route('voyager.{{ moduleKebab }}s.index');
    }
}
