<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');


 if (isset($_GET['xarray']) ? isset($_GET['yarray'])) {
  $x=$_POST['xarray'];
  $y=$_POST['yarray'];
}

$xdata=unserialize($x);
$ydata=unserialize($y);

$datay1 = array($xdata);
$datay2 = array($ydata);

// Setup the graph
$graph = new Graph(440,300);

$graph->SetScale('linlin',100,200000,100,100000); 

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->xgrid->SetColor('#E3E3E3');



// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Annual Energy Output - AEO');



// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Payback Cost');



$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>