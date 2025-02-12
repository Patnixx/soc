<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
<div class="container mx-auto w-full max-w-2xl sm:max-w-[80%] rounded-lg shadow-lg bg-white dark:bg-gray-900 p-4 sm:p-6 my-4 sm:my-8 transition-all duration-300 ease-linear"> 
    <h2 class="text-xl sm:text-2xl font-bold dark:text-white text-gray-900 mb-4 sm:mb-6">
        {{__('courses.form-edit')}}:
    </h2>
    <form method="POST" action="{{route('form.update', $id)}}" class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
        @csrf
        <div class="left">
            @foreach ([
                ['f_name', __('courses.f-name'), $fname],
                ['l_name', __('courses.l-name'), $lname],
                ['email', __('courses.email'), $email],
                ['birthday', __('courses.birth'), $birthday]
            ] as [$name, $label, $value])
            <div class="flex flex-col space-y-2 mb-2">
                <label for="{{$name}}" class="text-sm font-medium dark:text-white text-gray-900">{{$label}}</label>
                <input 
                    type="{{ $name == 'email' ? 'email' : ($name == 'birthday' ? 'date' : 'text') }}"
                    name="{{$name}}" 
                    id="{{$name}}" 
                    placeholder="{{$label}}" 
                    value="{{$value}}"
                    required
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            @endforeach
            @if($user->role == 'Admin' || $user->role == 'Teacher')
            <div class="flex flex-col space-y-2 mb-2">
                <label for="approval" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.approval')}}</label>
                <select required name="approval" id="approval" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$approval}}">{{__('courses.current')}}: {{$approval}}</option>
                    <option value="Approved">{{__('courses.approved')}}</option>
                    <option value="Waiting">{{__('courses.waiting')}}</option>
                    <option value="Rejected">{{__('courses.rejected')}}</option>
                </select>
            </div>
            @endif
        </div>
        <div class="right">
            @foreach ([
                ['season', __('courses.season'), $season, ['Spring', 'Summer', 'Autumn', 'Winter']],
                ['length', __('courses.length'), $length, ['Classic', 'Turbo']],
                ['class', __('courses.class'), $class, ['A', 'B']]
            ] as [$name, $label, $value, $options])
            <div class="flex flex-col space-y-2 mb-2">
                <label for="{{$name}}" class="text-sm font-medium dark:text-white text-gray-900">{{$label}}</label>
                <select required name="{{$name}}" id="{{$name}}" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$value}}">{{__('courses.current')}}: {{$value}}</option>
                    @foreach ($options as $option)
                        <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                </select>
            </div>
            @endforeach
            <div class="flex flex-col space-y-2 mb-2">
                <label for="reason" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.reason')}}</label>
                <textarea 
                    name="reason" 
                    id="reason" 
                    required
                    placeholder="{{__('courses.reason')}}"
                    class="w-full h-24 sm:h-32 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 resize-none">{{$reason}}</textarea>
            </div>
        </div>
        <div class="flex justify-center items-center space-x-4 col-span-1 sm:col-span-2">
            <button type="submit" class="relative flex items-center justify-center h-8 w-8 sm:h-10 sm:w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-floppy"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.save')}}
                </span>
            </button>
            <a href="{{route('progress')}}" class="relative flex items-center justify-center h-8 w-8 sm:h-10 sm:w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.back')}}
                </span>
            </a>
        </div>
    </form>
</div>
