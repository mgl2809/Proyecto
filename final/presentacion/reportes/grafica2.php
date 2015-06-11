<?php

require_once ('../../bbl/lib/jpgraph/jpgraph.php');
require_once('../../bbl/lib/jpgraph/jpgraph_bar.php');

function generaGrafica2($data1y,$data2y,$data3y,$arrTitulos){

    $graph = new Graph(500,700);
    
    $b1plot = new BarPlot($data1y);
    $b1plot->SetFillGradient('#67971B','#67971B',GRAD_VER);
    $b2plot = new BarPlot($data2y);
    $b2plot->SetFillGradient('gold1','gold1',GRAD_VER);
    $b3plot = new BarPlot($data3y);
    $b3plot->SetFillGradient('firebrick','firebrick',GRAD_VER);
             
    // Create the accumulated bar plot
    $gbbplot = new AccBarPlot(array($b3plot,$b2plot,$b1plot));
   
    // Add the accumulated plot to the graph
    $graph->SetScale("intint");
    $graph->SetMargin(50,10,10,300);
    $graph->xaxis->SetTickLabels($arrTitulos);
    $graph->xaxis->SetLabelAngle(90);
    $graph->yaxis->title->Set("Programas");
    
    $graph->Add($gbbplot);
    $graph->Stroke("../../bbl/lib/images/grafica2.jpg");
}
?> 