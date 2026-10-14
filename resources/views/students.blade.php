<h1>Enrolled Students (from Database)</h1>
<table border="1" cellpadding="8"><tr><th>ID</th><th>Name</th><th>Grade</th><th>Strand</th><th>Contact</th></tr>
@foreach($students as $s)<tr><td>{{$s->id}}</td><td>{{$s->fullname}}</td><td>{{$s->grade_level}}</td><td>{{$s->strand}}</td><td>{{$s->contact}}</td></tr>@endforeach
</table><br><a href="/">Back to Home</a>
