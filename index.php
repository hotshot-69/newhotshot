
<head>
  <title> ⚛ V O I D ⚛ </title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link href="assets/common/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>

<body>
  
  <marquee width="100%" direction="left" height="50px" scrollamount="12">
 <a href="https://t.me/Hotshotsniper"> ⚛ V O I D ⚛&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp⚛ V O I D ⚛&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp⚛ V O I D ⚛</a>
</marquee>
    <br>
    <div class="row col-md-12">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<div class="card col-sm-8">
  <div class="card-body">
<div class="md-form">
  <div class="col-md-12">
       <textarea id="lista" style="width: 720px;height: 200px;resize: none;background-color:black transparent;border: 1px solid black;color:black; "></textarea>
</div>
</div>
<center>
 <button class="btn btn-success" style="width: 200px; outline: none;" id="testar" onclick="enviar()" >Start</button>
  <button class="btn btn-danger" style="width: 200px; outline: none;"id="x" name="x" onclick="stop()" >Stop</button>
</center>
  </div>
</div>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<div class="card col-sm-2">
  <h5 span class="badge badge-black">Information:</h5>
    <div>
        <center>
        <span><center>Live:</center></span>&nbsp<span id="cLive" class="btn btn-green">0</span>
        </div><div><center>
  <span><center>Dead:</center></span>&nbsp<span id="cDie"class="btn btn-red">0</span>
            </div><div><center>
  <span><center>Tested:</center></span>&nbsp<span id="total" class="btn btn-blue">0</span>
            </div><div><center>
  <span><center>Loaded:</center></span>&nbsp<span id="carregadas" class="btn btn-white">0</span>
        </center>
            </div>
    <div class="card-body">
</div>
  </div>
</div>
</div>
<br>

<div class="col-md-12">
<div class="card">
<div style="position: absolute;
        top: 0;
        right: 0;">
  <button id="mostra" class="btn btn-green">SHOW/HIDE</button>
</div>
  <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title">Live - <span  id="cLive2" class="badge badge-success">0</span></h6>
    <div id="bode"><span id=".aprovadas" class="aprovadas"></span>
</div>
  </div>
</div>
</div>

<br>
<br>
<br>
<div class="col-md-12">
<div class="card">
  <div style="position: absolute;
        top: 0;
        right: 0;">
  <button id="mostra2" class="btn btn-red">SHOW/HIDE</button>
</div>
  <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title">Dead - <span id="cDie2" class="badge badge-danger">0</span></h6>
    <div id="bode2"><span id=".reprovadas" class="reprovadas"></span>
    </div>
  </div>
</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){


    $("#bode").hide();
  $("#esconde").show();
  
  $('#mostra').click(function(){
  $("#bode").slideToggle();
  });

});

</script>

<script type="text/javascript">

$(document).ready(function(){


    $("#bode2").hide();
  $("#esconde2").show();
  
  $('#mostra2').click(function(){
  $("#bode2").slideToggle();
  });

});

</script>

<script title="ajax do checker">
    function enviar() {
        var linha = $("#lista").val();
        var linhaenviar = linha.split("\n");
        var total = linhaenviar.length;
        var ap = 0;
        var rp = 0;
        linhaenviar.forEach(function(value, index) {
            setTimeout(
                function() {
                    $.ajax({
                        url: 'api.php?lista=' + value,
                        type: 'GET',
                        async: true,
                        success: function(resultado) {
                            if (resultado.match("#Aprovada")) {
                                removelinha();
                                ap++;
                                aprovadas(resultado + "");
                            }else {
                                removelinha();
                                rp++;
                                reprovadas(resultado + "");
                            }
                            $('#carregadas').html(total);
                            var fila = parseInt(ap) + parseInt(rp);
                            $('#cLive').html(ap);
                            $('#cDie').html(rp);
                            $('#total').html(fila);
                            $('#cLive2').html(ap);
                            $('#cDie2').html(rp);
                        }
                    });
                }, 500 * index);
        });
    }
    function aprovadas(str) {
        $(".aprovadas").append(str + "<br>");
    }
    function reprovadas(str) {
        $(".reprovadas").append(str + "<br>");
    }
    function removelinha() {
        var lines = $("#lista").val().split('\n');
        lines.splice(0, 1);
        $("#lista").val(lines.join("\n"));
    }
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
</body>
<br>
<footer >


    <div class="footer-copyright text-center py-3">
      <a href="https://t.me/Hotshotsniper"> ⚛ V O I D ⚛</a>
    </div>


  </footer>

</html>