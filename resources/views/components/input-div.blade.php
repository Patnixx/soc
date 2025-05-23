<div class="form-group relative w-full">
    <input type="{{$type}}" name="{{$name}}" id="{{$id}}" class="{{$iptclass}} w-full py-3 pl-10 pr-4 dark:bg-gray-800 dark:text-white bg-slate-200 rounded-lg focus:ring-1 dark:focus:ring-m-blue focus:ring-gray-900 transition-all duration-300 ease-linear" placeholder="{{__('auth.'.$placeholder.'')}}" @error($name) value="{{old($name)}}" @enderror value="{{$value}}" required>
    <i class="absolute left-3 top-1/2 transform -translate-y-1/2 {{$icon}} text-gray-900 dark:text-m-blue"></i>
</div>