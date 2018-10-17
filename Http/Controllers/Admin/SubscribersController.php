<?php

namespace Modules\Inewsletter\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Inewsletter\Entities\Subscribers;
use Modules\Inewsletter\Http\Requests\CreateSubscribersRequest;
use Modules\Inewsletter\Http\Requests\UpdateSubscribersRequest;
use Modules\Inewsletter\Repositories\SubscribersRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SubscribersController extends AdminBaseController
{
    /**
     * @var SubscribersRepository
     */
    private $subscribers;

    public function __construct(SubscribersRepository $subscribers)
    {
        parent::__construct();

        $this->subscribers = $subscribers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subscribers = $this->subscribers->all();

        return view('inewsletter::admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('inewsletter::admin.subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSubscribersRequest $request
     * @return Response
     */
    public function store(CreateSubscribersRequest $request)
    {
        //dd($request->all());
        Subscribers::create($request->all());

        return redirect()->route('admin.inewsletter.subscribers.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('inewsletter::subscribers.title.subscribers')]));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subscribers $subscribers
     * @return Response
     */
    public function edit(Subscribers $subscribers)
    {
        return view('inewsletter::admin.subscribers.edit', compact('subscribers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Subscribers $subscribers
     * @param  UpdateSubscribersRequest $request
     * @return Response
     */
    public function update(Subscribers $subscribers, UpdateSubscribersRequest $request)
    {
        $this->subscribers->update($subscribers, $request->all());

        return redirect()->route('admin.inewsletter.subscribers.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('inewsletter::subscribers.title.subscribers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subscribers $subscribers
     * @return Response
     */
    public function destroy(Subscribers $subscribers)
    {
        $this->subscribers->destroy($subscribers);

        return redirect()->route('admin.inewsletter.subscribers.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('inewsletter::subscribers.title.subscribers')]));
    }
}
