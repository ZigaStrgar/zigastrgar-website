@extends('app')

@section('header')
    @include('headers.medium', ['title' => 'Editing skill: '.$skill->name])
@endsection

@section('content')
    {!! Form::model($skill, ['action' => ['SkillsController@update', $skill->id], 'method' => 'PATCH']) !!}
    @include('skills.partials.form', ['submitText' => 'Edit skill', 'color' => 'blue'])
    {!! Form::close() !!}
@endsection