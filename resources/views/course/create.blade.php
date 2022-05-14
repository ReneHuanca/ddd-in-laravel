<form action="{{ route('courses.store') }}" method="POST">
@csrf
<input type="text" name="name" placeholder="Input name">
<input type="text" name="duration" placeholder="Input duration">
<input type="submit" value="Save">
</form>
@if(count($courses) > 0)
<ul>
    @foreach($courses as $course)
    <li>{{ $course->id }}. {{ $course->name }} - {{ $course->duration }}</li>
    @endforeach
</ul>
@else
<div>Empty</div>
@endif