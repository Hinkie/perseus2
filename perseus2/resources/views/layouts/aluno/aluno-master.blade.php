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
                <li {{{ (Request::is('aluno/inicio') ? 'class=active' : '') }}}>
                    <a href="/aluno/inicio">
                        <i class="pe-7s-date"></i>
                        <p>Início</p>
                    </a>
                <li {{{ (Request::is('aluno/dados') ? 'class=active' : '') }}}>
                    <a href="/aluno/dados">
                        <i class="pe-7s-file"></i>
                        <p>Dados Cadastrais</p>
                    </a>
                </li>
                <li {{{ (Request::is('aluno/historico') ? 'class=active' : '') }}}>
                    <a href="/aluno/historico">
                        <i class="pe-7s-study"></i>
                        <p>Histórico</p>
                    </a>
                </li>
                <li {{{ (Request::is('aluno/financeiro') ? 'class=active' : '') }}}>
                    <a href="/aluno/financeiro">
                        <i class="pe-7s-wallet"></i>
                        <p>Financeiro</p>
                    </a>
                </li>
                <li {{{ (Request::is('aluno/arquivos') ? 'class=active' : '') }}}>
                    <a href="/aluno/arquivos">
                        <i class="pe-7s-cloud-download"></i>
                        <p>Arquivos</p>
                    </a>
                </li>
                <li {{{ (Request::is('aluno/tarefas') ? 'class=active' : '') }}}>
                    <a href="/aluno/tarefas">
                        <i class="pe-7s-albums"></i>
                        <p>Tarefas</p>
                    </a>
                </li>
                <li {{{ (Request::is('aluno/relatorios') ? 'class=active' : '') }}}>
                    <a href="/aluno/relatorios">
                        <i class="pe-7s-note2"></i>
                        <p>Relatórios</p>
                    </a>
                </li>
                <li {{{ (Request::is('aluno/contato') ? 'class=active' : '') }}}>
                    <a href="/aluno/contato">
                        <i class="pe-7s-mail"></i>
                        <p>E-mail dos professores</p>
                    </a>
                </li>
                <li>
                    <a href="http://affecty.com/SGCE/certificados/auth.html#/">
                        <i class="pe-7s-news-paper"></i>
                        <p>Certificados</p>
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
											{{ucwords($aluno->nome)}}
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
            <div class="container-fluid">
                @yield('conteudo')  
            </div>
        </div>
    </div>
</div>
</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ asset('js/light-bootstrap-dashboard.js?v=1.4.0') }}" type="text/javascript"></script>

	<!-- Light Bootstrap Table DEMO methods -->
	<script src="{{ asset('js/demo.js') }}" type="text/javascript"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

    	});
	</script>

</html>
