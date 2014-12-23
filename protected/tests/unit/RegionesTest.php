<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComunasTest
 *
 * @author Belial
 */
class RegionesTest extends CDbTestCase {

    public $fixtures = array(
        'regiones' => 'application.models.Regiones',
    );

    public function testFixture() {
        //en la variable $this->ejemplos tenemos el contenido de nuetro fixture
        // y lo podemos usar en todos nuestros test, en este caso es un array de 
        // de una posición
        $arrEjemploList = $this->regiones;
        //para acceder a la posición específica de un set de datos del fixture    
        //retorna un array
        $arrFirstExample = $this->regiones['sample1'];
        //si queremos obtener una instancia de ActiveRecord
        //obtiene un objeto AR
        $objFirstExample = $this->regiones('sample1');
    }

    public function testApprove() {

        $region = new Regiones;
        $region->setAttributes(array(
            'idRegion' => '4',
            'region' => $this->regiones['sample1']['region'],
            'numero' => $this->regiones['sample1']['numero'],
        ), false);
        
        $this->assertTrue($region->save(false));
    }

}
