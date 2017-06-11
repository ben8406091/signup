<?php

namespace App\Http\Controllers;

use App\Action;
use App\Http\Requests\ActionRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = Action::where('enable', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        return view('welcome', compact('actions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $uid = Auth::user()->id;
            return view('create', compact('uid'));
        } else {
            return view('auth.login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionRequest $request)
    {
        Action::create($request->all());
        return redirect()->route('action.show', $action->id);
        //$action          = new Action;
        //$action->title   = $request->title;
        //$action->content = $request->content;
        //$action->user_id = $request->user_id;
        //$action->enable  = $request->enable;
        //$action->save();
        //return redirect()->route('action.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->updateCounter($id);

        $action          = Action::find($id);
        $action->content = nl2br($action->content);

        return view('show', compact('action'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = Action::find($id);
        if (Gate::allows('update-action', $action)) {
            return view('edit', compact('action'));
        } else {
            return redirect()->route('action.index');
        }

        //return view('edit', compact('action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActionRequest $request, $id)
    {
        $action = Action::find($id);
        $action->update($request->all());
        return redirect()->route('action.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Action::destroy($id);
        return redirect()->route('action.index');

    }

    //刷新計數器
    public function updateCounter($id)
    {
        $action = Action::find($id);
        $action->counter += 1;
        $action->timestamps = false;
        $action->update(['counter' => $action->counter]);
    }

}
