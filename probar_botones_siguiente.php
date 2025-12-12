

    <!-- CSS -->
    <link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->
   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
      <script src="http://code.jquery.com/jquery-1.0.4.js"></script>

       

      

<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-01" data-toggle="tab">Shipping</a></li>
    <li><a href="#tab-02" data-toggle="tab">Quantities</a></li>
    <li><a href="#tab-03" data-toggle="tab">Summary</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab-01">
        <a class="btn btn-primary btnNext" >Next</a>
    </div>
    <div class="tab-pane" id="tab-02">
        <a class="btn btn-primary btnNext" >Next</a>
        <a class="btn btn-primary btnPrevious" >Previous</a>
    </div>
    <div class="tab-pane" id="tab-03">
        <a class="btn btn-primary btnPrevious" >Previous</a>
    </div>
</div>
<script>

 $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});

</script> 
        <script type="text/javascript" src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
  </body>
</html>