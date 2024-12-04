@extends('structures.main')
@section('content')
<div class="">
    <form action="{{route('custom.newcourse')}}" method="post">
        @csrf
        <div id="personal"">
            <x-input-div :name="'name'" :type="'text'" :placeholder="'Course Name'" :id="'name'" :value="''" :icon="'bi bi-1-circle-fill'"/>
            <x-input-div :name="'desc'" :type="'text'" :placeholder="'Description'" :id="'desc'" :value="''" :icon="'bi bi-2-circle-fill'"/>
        </div>
        <div id="course"">
            <select name="season" id="season">
                <option value="" selected>Select a season</option>
                <option value="Summer">Summer</option>
                <option value="Winter">Winter</option>
            </select>
            <select name="length" id="length">
                <option value="" selected>Select the length</option>
                <option value="Classic">Classic (2-4 months)</option>
                <option value="Turbo">Turbo (1-2 months)</option>
            </select>
            <select name="class" id="class">
                <option value="" selected>Select the class</option>
                <option value="AM">AM</option>
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="A">A</option>
                <option value="B1">B1</option>
                <option value="B">B</option>
                <option value="BE">BE</option>
                <option value="C1">C1</option>
                <option value="C1E">C1E</option>
                <option value="C">C</option>
                <option value="CE">CE</option>
                <option value="D1">D1</option>
                <option value="D1E">D1E</option>
                <option value="D">D</option>
                <option value="DE">DE</option>
                <option value="T">T</option>
            </select>
            <button type="submit" class="bg-secondary text-white py-3 px-6 rounded-lg font-bold hover:bg-m-blue transition duration-300 col-span-2">Submit request</button>
        </div>
        <div class="">
            <x-auth-href :route="'progress'" :text="'Back to progress'"/>
        </div>
    </form>
</div>
@endsection