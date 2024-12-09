@extends('structures.main')
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
        :divclass="'h-96'"
        :hclass="'text-3xl font-semibold dark:text-white text-gray-900 mb-4'"
        :pclass="'dark:text-white text-m-blue text-lg'"
        :sclass="'dark:text-m-blue text-gray-900'"
        />
    </section>
</div>
@endsection