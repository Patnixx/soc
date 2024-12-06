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
        :hclass="'text-3xl font-semibold text-white mb-4'"
        :pclass="'text-white text-lg'"
        :sclass="'text-white'"
        :selclass="'bg-gray-800 text-white'"
        :iptclass="'bg-gray-800 text-white'"
        />
    </section>
</div>
@endsection