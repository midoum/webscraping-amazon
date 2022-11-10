<?php 
if (isset($_GET['search'])){
  $s=$_GET['search'];
}else{
  $s="search";
}

echo('<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<link rel="stylesheet" src="style.css"></head><div class="container">
</head>
<form>
<div class="input-group">
number of products to show : <input type="number"value="1" style="marging-left:10px;" name="spinner"/>
  <div id="search-autocomplete" class="form-outline">
    <input type="search" id="form1" class="form-control" name="search" value="'.$s.'" />
   
   
  </div>

  <button type="submit" class="btn btn-primary" name="b">
  <i class="fa fa-magnifying-glass"></i></button>
  
</div>

</div>
</form>
');


if (isset($_GET['b'])){
$key=$_GET['search'];    
$res=file_get_contents('https://www.amazon.fr/s?k='.$key.'');   
$result=explode("s-card-container s-overflow-hidden aok-relative puis-expand-height puis-include-content-margin puis s-latency-cf-section s-card-border\">",$res); 
$head=explode("<body",$result[0]);
print_r($head[0]);

$n=count($result);
$np=$n-1;
$lastprod=explode('<div data-asin="" data-index',$result[$n-1]); 
$result[$n-1]=$lastprod[0];
echo('<h1>There is '.$np.' Products</h1>');
echo('<row>');
if (isset($_GET['spinner'])){
  $p=$_GET['spinner'];
 
  for ( $c=1;$c<=$p;$c++){
    $i =rand(0,$np);
echo(' <div class="col-sm-3">'.
$result[$i].'</div>');
}

}
echo('</row>');

}