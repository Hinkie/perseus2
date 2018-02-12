<!DOCTYPE html>
<html>
<head>
	<title>ejfoeiufj</title>
</head>
<body>
	<div class="container">
	    @foreach ($alunos as $aluno)
	        <h1>{{ $aluno->nome }}</h1>
	    @endforeach
	</div>

	<a href="/admin/alunos?page=1">teste</a>

</body>
</html>
