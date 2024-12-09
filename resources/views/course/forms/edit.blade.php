@extends('structures.main')
@section('content')
<div class="ml-[10%] mt-[10%]">
    <section id="left" class="">
        <x-form-input-div 
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
        :divclass="'h-96'"
        :hclass="'text-3xl font-semibold mb-4 dark:text-white text-m-blue'"
        :pclass="'dark:text-white text-m-blue'"
        :sclass="'dark:text-white text-m-blue'"
        :selclass="'dark:bg-gray-800 dark:text-m-blue bg-slate-200 text-gray-900'"
        :iptclass="'dark:bg-gray-800 dark:text-m-blue bg-slate-200 text-gray-900'"
        />
    </section>
</div>
@endsection