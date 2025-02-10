@extends('structures.main')
@section('title', ''.__('title.form-edit').'')
@section('content')
<div class="w-full px-4 sm:px-8 mt-[1.5%]">
    <section id="left" class="w-full">
        <x-form-input-div 
        :fname="$form->f_name" 
        :lname="$form->l_name"
        :email="$form->email"
        :birthday="$form->birthday"
        :season="$form->season"
        :length="$form->length" 
        :class="$form->class" 
        :reason="$form->reason"
        :approval="$form->approval" 
        :id="$form->id"
        :courseid="''" 
        :divclass="'w-full'"
        :hclass="'text-2xl sm:text-3xl font-semibold mb-4 dark:text-white text-m-blue'"
        :pclass="'dark:text-white text-m-blue'"
        :sclass="'dark:text-white text-m-blue'"
        :selclass="'dark:bg-gray-800 dark:text-m-blue bg-slate-200 text-gray-900'"
        :iptclass="'dark:bg-gray-800 dark:text-m-blue bg-slate-200 text-gray-900'"
        :user="$user"
        />
    </section>
</div>
@endsection
