<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateController extends Controller {

    public function getDataExtenso() {
        $data = $this->getDiaDASemana(date('D'));
        $mes = $this->getMesExtenso(date('M'));
        $dia = date('d');
        $ano = date('Y');
        $data_extenso = "$data, $dia de $mes de $ano.";
        return $data_extenso;
    }

    public function getDiaDASemana($dia) {
        $semana = array(
            'Sun' => 'Domingo',
            'Mon' => 'Segunda',
            'Tue' => 'Terça',
            'Wed' => 'Quarta',
            'Thu' => 'Quinta',
            'Fri' => 'Sexta',
            'Sat' => 'Sábado'
        );
        return $semana[$dia];
    }

    public function getMesExtenso($mes) {
        $mes_extenso = array(
            'Jan' => 'Janeiro',
            'Feb' => 'Fevereiro',
            'Mar' => 'Marco',
            'Apr' => 'Abril',
            'May' => 'Maio',
            'Jun' => 'Junho',
            'Jul' => 'Julho',
            'Aug' => 'Agosto',
            'Nov' => 'Novembro',
            'Sep' => 'Setembro',
            'Oct' => 'Outubro',
            'Dec' => 'Dezembro'
        );
        return $mes_extenso[$mes];
    }

}
