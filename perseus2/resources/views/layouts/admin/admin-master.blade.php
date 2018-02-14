<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Faculdade CNEC Santo Ângelo</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet">

    {{-- Semantic UI CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    {{-- Barra Lateral --}}
    <div class="sidebar" data-color="purple"  data-image="assets/img/sidebar-5.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://cnecsan.cnec.br/" class="simple-text">
                    <img class="moveimage" src="{{ asset('images/cnec-small.png') }}" width="34" height="40" alt="Logo Cnec">
                </a>
            </div>

            <ul class="nav">
                <li {{{ (Request::is('admin/funcionarios') ? 'class=active' : '') }}}>
                    <a href="/admin/funcionarios">
                        <i class="pe-7s-id"></i>
                        <p>Funcionários</p>
                    </a>
                <li {{{ (Request::is('admin/alunos') ? 'class=active' : '') }}}>
                    <a href="/admin/alunos">
                        <i class="pe-7s-study"></i>
                        <p>Alunos</p>
                    </a>
                </li>
                <li {{{ (Request::is('admin/professores') ? 'class=active' : '') }}}>
                    <a href="/admin/professores">
                        <i class="pe-7s-user"></i>
                        <p>Professores</p>
                    </a>
                </li>
                <li {{{ (Request::is('admin/cadastrarFuncionario') ? 'class=active' : '') }}}>
                    <a href="/admin/cadastrarFuncionario">
                        <i class="pe-7s-bookmarks"></i>
                        <p>cadastrar Funcionario</p>
                    </a>
                </li>
                <li {{{ (Request::is('admin/cadastrarAluno') ? 'class=active' : '') }}}>
                    <a href="/admin/cadastrarAluno">
                        <i class="pe-7s-users"></i>
                        <p>cadastrar Aluno</p>
                    </a>
                </li>
                <li {{{ (Request::is('admin/cadastrarProfessor') ? 'class=active' : '') }}}>
                    <a href="/admin/cadastrarProfessor">
                        <i class="pe-7s-add-user"></i>
                        <p>cadastrar Professor</p>
                    </a>
                </li>
                <li {{{ (Request::is('admin/memorandos') ? 'class=active' : '') }}}>
                    <a href="/admin/memorandos">
                        <i class="pe-7s-note"></i>
                        <p>Memorandos</p>
                    </a>
                </li>
                <li {{{ (Request::is('admin/telefones') ? 'class=active' : '') }}}>
                    <a href="/admin/telefones">
                        <i class="pe-7s-phone"></i>
                        <p>Telefones</p>
                    </a>
                </li>
               <li {{{ (Request::is('admin/relatorios') ? 'class=active' : '') }}}>
                   <a href="/admin/relatorios">
                       <i class="pe-7s-note2"></i>
                       <p>Relatórios</p>
                   </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        {{-- Barra superior --}}
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>  
                </div>
                <!-- Dropbown do logout -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
	                        <li class="dropdown">
	                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                                    <p>
											ADMINISTRADOR
											<b class="caret"></b>
										</p>
	                              </a>
	                              <ul class="dropdown-menu">
	                                <li>
                                        {{-- <a href="/logout">Logout</a> --}}
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
	                              </ul>
	                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">         
                @yield('conteudo')  
        </div>
    </div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ asset('js/light-bootstrap-dashboard.js?v=1.4.0') }}" type="text/javascript"></script>

	<!-- Light Bootstrap Table DEMO methods e funcoes usadas  -->
	<script src="{{ asset('js/demo.js') }}" type="text/javascript"></script>

    {{-- Datatables --}}
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

    	});
	</script>

</html>
