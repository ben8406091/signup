@extends('layouts.app')
@section('content')
  <h1>編輯活動</h1>
  {!! BootForm::horizontal([
    'model' => $action,
    'url' => '/action/'.$action->id,
    'method'=>'patch',
    'left_column_class' => 'col-sm-2',
    'left_column_offset_class' => 'col-sm-offset-2',
    'right_column_class' => 'col-sm-10'
  ]); !!}
  {!! BootForm::text('title', '活動名稱' ,$action->title , ['placeholder'=>'請輸入活動名稱']) !!}
  {!! BootForm::textarea('content', '活動說明',$action->content) !!}
  {!! BootForm::radios('enable', '活動狀態', [1=> '開啟', 2 =>'關閉'] , $action->enable, true) !!}
  {!! BootForm::hidden('user_id',  $action->user->id) !!}
  {!! BootForm::submit('儲存') !!}
  {!! BootForm::close() !!}
@endsection
