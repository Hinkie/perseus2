<?php 

//Ao ser executado esse script gera o calendario do semestre
//As datas estão no formato AAAA-MM-DD
$inicio_semetre = "2018-01-01";
$final_semestre = "2018-07-30";

$inicio_aulas = "2018-02-12";
$final_aulas = "2018-07-15";

$inicio_matriculas = "2018-07-01";



//Seta os dias  letivos

//Seta os feriados 
$ano = 2018;

$json = file_get_contents('https://api.calendario.com.br/?json=true&ano='.$ano.'&ibge=4317509&token=cl9jYXRlbGFuQGhvdG1haWwuY29tJmhhc2g9OTg4MjU3NDg');
$obj = json_decode($json);

foreach ($obj as $var) {
    if ($var->type !== "Dia Convencional" && $var->date < $final_semestre)  {
       
    }
