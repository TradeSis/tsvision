<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="/ts/js/jquery/jquery.min.js" type="text/javascript"></script>	
</head>
<body>
    <div id="container"></div>    
</body>    
    

<script type="text/javascript" charset="utf-8">
    

    var wURL = '';

	function chamaAJAX(wURL) {
        var res = [];
        
         $.ajax({
                url: wURL,
                type: "get",
                async: false,

                dataType: "json",
              
                success: function (json_get) {

					//alert(JSON.stringify(json_get, null, 4));
                    
                    var obj = json_get.notasServico[0];
                   // alert(JSON.stringify(obj, null, 4));

                   
                    for(var i in obj) {
                         //  alert(JSON.stringify(obj[i], null, 4));
                         //   alert(obj[i].numeroNFSe);
                            res.push(obj[i]);
                    }

                  //  alert(JSON.stringify(res, null, 4));

					
                },
                error: function (xhr, status, errorThrown) {

                    alert("errorThrown=" + errorThrown);
                }
            })
            return res;
        }
        
    var wURL = "/ts/api/bling/buscaServicos";

    var wjsonRetorno = chamaAJAX (wURL);
  //  alert("RETORNO AJAX= "+JSON.stringify(wjsonRetorno, null, 4));

    var mytable = "<table border='1px' >";


    mytable += "<th>empresa</th>" +
                  "<th>tipoVenda</th>" +
                  "<th>clienteCodigo</th>" +
                  "<th>clienteNome</th>" +
                  "<th>dataVenda</th>" +
                  "<th>numeroNF</th>" +
                  "<th>statusNF</th>" +
                  "<th>qtdVenda</th>" +
                  "<th>valorNota</th>" +
                  "<th>valorCusto</th>";
    for(var i in wjsonRetorno) {
       
        mytable += "<tr>";

            mytable += "<td>" + wjsonRetorno[i].empresa + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].tipoVenda + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].clienteCodigo + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].clienteNome + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].dataVenda + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].numeroNF + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].statusNF + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].qtdVenda + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].valorNota + "</td>";           
            mytable += "<td>" + wjsonRetorno[i].valorCusto + "</td>";           
                 


            mytable += "</tr>";
   
    };

    mytable += "</table>";

    document.getElementById("container").innerHTML = mytable;
    
  
   

</script>




</html>
