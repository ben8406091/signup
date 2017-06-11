@extends('layouts.app')
@section('content')
  <h1>新增活動</h1>
  {!! BootForm::horizontal([
    'url' => '/action',
    'left_column_class' => 'col-sm-2',
    'left_column_offset_class' => 'col-sm-offset-2',
    'right_column_class' => 'col-sm-10'
  ]); !!}
  {!! BootForm::text('title', '活動名稱' ,null , ['placeholder'=>'請輸入活動名稱']) !!}
  {!! BootForm::textarea('content', '活動說明') !!}
  {!! BootForm::radios('enable', '活動狀態', [1=> '開啟', 2 =>'關閉'] ,1, true) !!}
  {!! BootForm::hidden('user_id',   $uid) !!}
  {!! BootForm::submit('儲存') !!}
  {!! BootForm::close() !!}
@endsection
