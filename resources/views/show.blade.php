@extends('layouts.app')
@section('content')
  <div class="page-header">
    <h1>{{$action->title}}</h1>
  </div>
  <div class="text-center">
  {{$action->user['name']}} ({{$action->user['email']}})

    發布於 {{$action->created_at->format("Y年m月d日 H:i:s")}} /
    最後更新： {{$action->updated_at->format("Y年m月d日 H:i:s")}}/
    共 {{$action->counter}} 人次觀看
  </div>
  <hr>
  <p style="font-size: 1.5em; line-height: 2;">
    {!!$action->content!!}

  </p>
  <hr>
  <div class="text-center">

   @if(Gate::allows('update-action', $action))
   {!!BootForm::inline([
        'route' => ['action.destroy', $action->id],
        'method'=>'delete',
        'style'=>'display:inline',
      ]);!!}
      {!!BootForm::submit('刪除',['class'=>'btn btn-danger']);!!}
      {!!BootForm::close()!!}
      <a href="{!!route('action.edit' , $action->id)!!}" class="btn btn-warning">編輯</a>
    @endif

  @if (Auth::check() && Auth::user()->id == $action->user_id)
      <a href="{!!route('action.edit' , $action->id)!!}" class="btn btn-warning">編輯</a>
    @endif

    <a href="{!!route('action.index')!!}" class="btn btn-info">回首頁</a>
    <a href="{!!route('signup.create' , $action->id)!!}" class="btn btn-success">我要報名</a>
  </div>

  <hr>

  <h2>報名者一覽</h2>
<table class="table table-condensed table-bordered table-hover">
  <tbody>
    @forelse ($action->signups as $signup)
      <tr>
        <td>{{$signup->name}} {{$signup->sex}}</td>
        <td>{{$signup->tel}}</td>
        <td>{{$signup->email}}</td>
      </tr>
    @empty
      <div class="alert-danger">尚無報名者</div>
    @endforelse
  </tbody>
</table>

@endsection
