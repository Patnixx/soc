<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
<div class="form-group relative flex items-center space-x-2">
    <input type="checkbox" name="{{$name}}" id="{{$id}}" class="w-5 h-5 rounded-lg checked:bg-m-blue dark:checked:bg-m-darkblue" onclick="showPass()">
    <h6 id="show_pass_txt" class="dark:text-gray-400 text-m-blue">{{__('auth.show-password')}}</h6>
</div>