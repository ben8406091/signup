@extends('layouts.app')
@section('content')
  <h1>我要報名</h1>
  {!! BootForm::horizontal([
    'route' => 'signup.store',
    'left_column_class' => 'col-sm-2',
    'left_column_offset_class' => 'col-sm-offset-2',
    'right_column_class' => 'col-sm-10'
  ]); !!}
  {!! BootForm::text('name', '報名者' ,null , ['placeholder'=>'請輸入您的姓名']) !!}
  {!! BootForm::text('tel', '電話',null , ['placeholder'=>'請輸入您的聯絡電話']) !!}
  {!! BootForm::text('email', '電子信箱',null , ['placeholder'=>'請輸入您的Email']) !!}
  {!! BootForm::radios('sex', '性別', ['先生'=> '先生', '女士' =>'女士'] ,'先生', true) !!}
  {!! BootForm::hidden('action_id',  $action_id) !!}
  {!! BootForm::submit('儲存') !!}
  {!! BootForm::close() !!}
@endsection
