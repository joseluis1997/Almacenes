<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/home/lucho/Documentos/stilito.css" rel="stylesheet">
        <style type="text/css">
            body{
                background: red;
            }
            .con-menu{
                background: red;
              width: 233px;
              margin: 50px auto;
            }
        </style>
    </head>
    <body>

                    <h1>qweqwe</h1>

                    <div class="con-menu">
                       <div class="con-enlace">
                           <div class="opcion">
                               <p>opcion-1sasa</p>
                               <p class="icono">+</p>
                           </div>
                           <div class="enlace">
                               <a href="#" class="">Enlace-1</a>
                               <a href="#" class="">Enlace-2</a>
                               <a href="#" class="">Enlace-3</a>
                           </div>
                       </div>
                    </div>


                    <div class="con-menu">
                       <div class="con-enlace">
                           <div class="opcion">
                               <p>opcion-1</p>
                               <p class="icono">+</p>
                           </div>
                           <div class="enlace">
                               <a href="#" class="">Enlace-1</a>
                               <a href="#" class="">Enlace-2</a>
                               <a href="#" class="">Enlace-3</a>
                           </div>
                       </div>
                    </div>




    <!-- scripts datatable -->


<script type="text/javascript">
    const opcion = document.querySelectorAll('.opcion');
    opcion.forEach(e =>{
        e.addEventListener('click', function(e){
            const padre = e.target.parentNode;
            padre.children[1].class.List.toggle('animacion');
            padre.parentNode.children[1].classList.toggle('animacion');
        });
    });
</script>
</body>
</html>
