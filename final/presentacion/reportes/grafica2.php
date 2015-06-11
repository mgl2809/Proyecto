<?php

require_once ('../../bbl/lib/jpgraph/jpgraph.php');
require_once ('../../bbl/lib/jpgraph/jpgraph_line.php');

function generaGrafica2($dataMontos,$arrTitulos){
    $dataMontos = array(0,200000,80000,0);
    $graph = new Graph(600,400);
             
    // Create the accumulated bar plot
    $gbbplot = new LinePlot(array($dataMontos));
 echo var_dump($dataMontos);
    $graph->SetScale("linlin",0,0,10,100000);
    
    $graph->Add($gbbplot);
    $graph->Stroke("../../bbl/lib/images/grafica2.jpg");
}
?> 