@extends('layouts.app')
@section('content')
    <h1>活動報名一覽</h1>
    <ul class="list-group">
      @forelse ($actions as $action)
        <li class="list-group-item">
          {{$action->user['name']}} 發布於
          {{$action->created_at->format("Y年m月d日")}} -
          <a href="{{route('action.show' , $action->id)}}">
          {{$action->title}}
          </a>
          （{{$action->counter}}）
        </li>
      @empty
        <div class="alert alert-danger">尚無可報名活動</div>
      @endforelse
    </ul>
@endsection
