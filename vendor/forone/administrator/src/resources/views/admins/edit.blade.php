@extends('forone::layouts.master')

@section('title', 'Update '.$page_name)

@section('main')

    {!! Form::panel_start('edit'.$page_name) !!}
    {!! Form::model($data,['method'=>'PUT','route'=>['admin.'.$uri.'.update',$data->id],'class'=>'form-horizontal']) !!}
        @include('forone::'. $uri.'.form')
    {!! Form::panel_end('Save') !!}
    {!! Form::close() !!}

@stop