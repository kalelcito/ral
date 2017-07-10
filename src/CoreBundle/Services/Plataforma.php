<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 11/02/17
 * Time: 14:24
 */

namespace CoreBundle\Services;


class Plataforma
{
    
    public function __construct(){
        
    }
    public function tipos($idtipo){
        $tipos=array(
         1=>'Contenido solo Texto',
         2=>'Contenido solo presentación de ppt',
         3=>'Contenido Solo presentacion de video',
         4=>'Contenido ligado a una encuesta',
        10=>'Encuesta auto Diagnóstico',
        11=>'Encuesta Clima laboral',
        12=>'Encuesta Diagnóstico Prevención incenidos',
        13=>'Encuesta Diagnóstico Salud',
        14=>'Plan de trabajo',
        15=>'Carpeta Virtual',
        16=>'Minutas',
        17=>'Red Social',
        18=>'Programa RFC',
        19=>'Programa Talento Laboral Parroquial',
        20=>'Enlace a Página Web'
        );
        return $tipos[$idtipo];
    }
    public function multi($idtipo){
        $multi=array(
            1=>'Imagen',
            2=>'Video Interno',
            3=>'Video Youtube',
            4=>'Video Vimeo',
        );

        return $multi[$idtipo];

    }
    public function authnivel($contenido){
        
    }
}