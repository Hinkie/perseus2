<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendario;
use Config;
use DB;

class CalendarioController extends Controller
{
   public function createCalendario() 
      {    
        //Ao ser executado esse script gera o calendario do semestre
        //As datas estão no formato AAAA-MM-DD
        $inicio_semetre = "2018-01-01";
        $final_semestre = "2018-07-30";

        $inicio_aulas = "2018-02-12";
        $final_aulas = "2018-07-15";

        Calendario::truncate();

        DB::select(
            "INSERT INTO calendario SELECT * FROM time_dimension  WHERE db_date BETWEEN '$inicio_semetre' AND '$final_semestre'" 
        );

        //Seta os dias  letivos pt1
        DB::select(
            "UPDATE calendario SET dia_letivo_flag = 1 WHERE  db_date BETWEEN '$inicio_aulas' AND '$final_aulas'" 
        );  

        //Seta os feriados 
        $ano = Config::get('global.ano');

        $json = file_get_contents('https://api.calendario.com.br/?json=true&ano='.$ano.'&ibge=4317509&token=cl9jYXRlbGFuQGhvdG1haWwuY29tJmhhc2g9OTg4MjU3NDg');
        $obj = json_decode($json);

        foreach ($obj as $var) 
        {
            if ($var->type !== "Dia Convencional")  
            {
                $dia = implode('-', array_reverse(explode('/', $var->date)));
                DB::select(
                    "UPDATE calendario SET feriado_flag = 1 WHERE db_date = '$dia'" 
                );  
            }
        }
        //Seta os dias  letivos pt1
        DB::select(
            "UPDATE calendario SET dia_letivo_flag = 0 WHERE fds_flag = 1 OR feriado_flag =1" 
        );  

        return redirect()->back();
      }
}
