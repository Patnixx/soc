@extends('structures.main')
@section('title', ''.__('title.form-detail').'')
@section('content')
<div class="ml-[10%] mt-[10%]">
    <section id="left" class="">
        <x-form-div 
        :fname="''.$form->f_name.''" 
        :lname="''.$form->l_name.''"
        :email="''.$form->email.''"
        :birthday="''.$form->birthday.''"
        :season="''.$form->season.''"
        :length="''.$form->length.''" 
        :class="''.$form->class.''" 
        :reason="''.$form->reason.''"
        :approval="''.$form->approval.''" 
        :id="''.$form->id.''"
        :courseid="''" :formid="''" 
        :divclass="'h-96'"
        :hclass="'text-3xl font-semibold text-m-blue dark:text-white mb-4'"
        :pclass="'dark:text-white text-m-blue'"
        :sclass="'dark:text-m-blue text-gray-900'"
        />
    </section>
</div>
@endsection