<?php
?>

//Modal crear bloque
<!-- MODAL CREAR BLOQUE -->
<div  class="modal fade" role="dialog" tabindex="-1" id="nuevoBloque">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <h1 class="text-center" id="tittle-c" >Nuevo Bloque</h1><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div class="col-lg-6 col-xl-12" data-aos="fade-down" data-aos-delay="500">
                    <form enctype="multipart/form-data" role="form" method="POST"  action="crear_bloque.php">
                        <div class="input-group mb-3 edtFormMarg">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="tipo">Tipo</label>
                            </div>
                            <select class="custom-select" id="tipo" name ="tipo" required>
                                <option  value="" selected >Seleccionar...</option>
                                <option value="un_bloque">Un bloque</option>
                                <option value="doble">Dos Bloques</option>
                                <option value="triple_a" >Tres Bloques A</option>                                                       
                                <option value="triple_b" >Tres Bloques B</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 edtFormMarg">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="tipo">Altura</label>
                            </div>
                            <input id="altura" name="altura"  class="form-control"  placeholder="Ej: 100px, 150pt, 50% (pantalla)">
                            <div class="input-group-append">
                                <select class="custom-select" id="unida" name ="unidad" > 
                                    <option value="px">px</option>
                                    <option value="pt">pt</option>
                                    <option value="vh" selected>%</option>                                                       
                                </select>
                            </div>
                        </div>
                        <!-- Bloque1 -->
                        <div id="bloque1" class="bloque input-group" style="display: none">
                            <label>BLOQUE 1</label>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="titulo1">Título</label>
                                </div>
                                <input class="form-control" type="text" id="titulo1" name="titulo1" style="font-family: Barlow, sans-serif;"   >
                            </div>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="subtitulo1">Subtitulo</label>
                                </div>
                                <input class="form-control" type="text" id="subtitulo1" name="subtitulo1" style="font-family: Barlow, sans-serif;"  >
                            </div>
                            <div class="input-group mb-3 edtFormMarg" width="300px">
                                <div class="input-group-prepend" >
                                    <label class="input-group-text" for="texto1">Texto</label>
                                </div>
                                <input class="form-control" type="text" id="texto1" name="texto1" style="font-family: Barlow, sans-serif;"  >
                                <div class="input-group-append">
                                    <select class="custom-select" id="alineacion1" name ="alineacion1" >
                                        <option value="left">Izquierda</i></option>
                                        <option value="center">Centro</option>
                                        <option value="right">Derecha</i></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="custom-file" style="margin-bottom: 1rem">
                                <div class="input-group-prepend" width="40%">
                                    <label class="custom-file-label" id="label_fondo1" for="fondo1">Buscar archivo... </label>
                                </div>
                                <input class="custom-file-input" type="file" id="fondo1" name="fondo1"  onchange="actualizar_label1()" lang="es">
                            </div> 
                            
              
                            <div class="input-group mb-3 edtFormMarg">
                                <div class="input-group-prepend" width="40%">
                                    <label class="input-group-text" for="texto1">Color Texto</label>
                                </div>
                                <input class="form-control" type="text" id="color1" name="color1" style="font-family: Barlow, sans-serif;" placeholder="Ej: #123123"  >
                            </div>
                        </div>
      
                        <!-- Bloque2 -->  
                       <div id="bloque2" class="bloque input-group" style="display: none">
                            <label>BLOQUE 2</label>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="titulo2">Título</label>
                                </div>
                                <input class="form-control" type="text" id="titulo2" name="titulo2" style="font-family: Barlow, sans-serif;"  >
                            </div>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="subtitulo2">Subtitulo</label>
                                </div>
                                <input class="form-control" type="text" id="subtitulo2" name="subtitulo2" style="font-family: Barlow, sans-serif;"   >
                            </div>
                            <div class="input-group mb-3 edtFormMarg" width="300px">
                                <div class="input-group-prepend" >
                                    <label class="input-group-text" for="texto2">Texto</label>
                                </div>
                                <input class="form-control" type="text" id="texto2" name="texto2" style="font-family: Barlow, sans-serif;"   >
                                <div class="input-group-append">
                                    <select class="custom-select" id="alineacion2" name ="alineacion2" >
                                        <option value="left">Izquierda</i></option>
                                        <option value="center">Centro</option>
                                        <option value="right">Derecha</i></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="custom-file" style="margin-bottom: 1rem">
                                <div class="input-group-prepend" width="40%">
                                    <label class="custom-file-label"  for="fondo2">Fondo </label>
                                </div>
                                <input class="custom-file-input" type="file" id="fondo2" name="fondo2" onchange="actualizar_label2()" lang="es">
                            </div> 
                            
              
                            <div class="input-group mb-3 edtFormMarg">
                                <div class="input-group-prepend" width="40%">
                                    <label class="input-group-text" id="label_fondo2" for="color2">Color Texto</label>
                                </div>
                                <input class="form-control" type="text" id="color2" name="color2" style="font-family: Barlow, sans-serif;" placeholder="Ej: #123123"  >
                            </div>
                        </div>
      
                        <!-- Bloque3 -->  
                       <div id="bloque3" class="bloque input-group" style="display: none">
                            <label>BLOQUE 3</label>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="titulo3">Título</label>
                                </div>
                                <input class="form-control" type="text" id="titulo3" name="titulo3" style="font-family: Barlow, sans-serif;"   >
                            </div>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="subtitulo3">Subtitulo</label>
                                </div>
                                <input class="form-control" type="text" id="subtitulo3" name="subtitulo3" style="font-family: Barlow, sans-serif;"   >
                            </div>
                            <div class="input-group mb-3 edtFormMarg" width="300px">
                                <div class="input-group-prepend" >
                                    <label class="input-group-text" for="texto3">Texto</label>
                                </div>
                                <input class="form-control" type="text" id="texto3" name="texto3" style="font-family: Barlow, sans-serif;"  >
                                <div class="input-group-append">
                                    <select class="custom-select" id="alineacion3" name ="alineacion3" >
                                        <option value="left">Izquierda</i></option>
                                        <option value="center">Centro</option>
                                        <option value="right">Derecha</i></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="custom-file" style="margin-bottom: 1rem">
                                <div class="input-group-prepend" width="40%">
                                    <label class="custom-file-label"  id="label_fondo3"for="fondo3">Fondo </label>
                                </div>
                                <input class="custom-file-input" type="file" id="fondo3" name="fondo3" onchange="actualizar_label3()" lang="es">
                            </div> 
                            
              
                            <div class="input-group mb-3 edtFormMarg">
                                <div class="input-group-prepend" width="40%">
                                    <label class="input-group-text" for="color3">Color Texto</label>
                                </div>
                                <input class="form-control" type="text" id="color3" name="color3" style="font-family: Barlow, sans-serif;" placeholder="Ej: #123123"  >
                            </div>
                        </div>
      
                        <input name="idProyecto" id="idBloque" value="<?= $idProyecto ?>" hidden>
                   
                        <div id="msg_error" class="alert alert-danger" style="display: none" role="alert" ></div>
                        <div class="text-center" id="button-c-c" style="width: 100%;"><button class="btn btn-primary" id="button-c" name="crear" value="crear" type="submit" style="background-color: #33a6cc;">CREAR</button></div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>



<!-- MODAL EDITAR BLOQUE -->
<div  class="modal fade" role="dialog" tabindex="-1" id="editarBloque">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <h1 class="text-center" id="e_tittle-c" >Editar Bloque</h1><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div class="col-lg-6 col-xl-12" data-aos="fade-down" data-aos-delay="500">
                    <form enctype="multipart/form-data" role="form" method="POST"  action="editar_bloque.php">
                        <div class="input-group mb-3 edtFormMarg">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="e_tipo">Tipo</label>
                            </div>
                            <select class="custom-select" id="e_tipo" name ="e_tipo" required>
                                <option value="" selected>Seleccionar...</option>  
                                <option value="un_bloque">Un bloque</option>
                                <option value="doble">Dos Bloques</option>
                                <option value="triple_a" >Tres Bloques A</option>                                                       
                                <option value="triple_b" >Tres Bloques B</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 edtFormMarg">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="e_altura">Altura</label>
                            </div>
                            <input id="e_altura" name="e_altura"  class="form-control"  placeholder="Ej: 100px, 150pt, 50% (pantalla)">
                            <div class="input-group-append">
                                <select class="custom-select" id="e_unidad" name ="e_unidad" >
                                    <option value="px">px</option>
                                    <option value="pt">pt</option>
                                    <option value="vh" selected>%</option>                                                       
                                </select>
                            </div>
                        </div>
                        <!-- Bloque1 -->
                        <div id="e_bloque1" class="bloque input-group" style="display: none">
                            <label>BLOQUE 1</label>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="e_titulo1">Título</label>
                                </div>
                                <input class="form-control" type="text" id="e_titulo1" name="e_titulo1" style="font-family: Barlow, sans-serif;">
                            </div>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="e_subtitulo1">Subtitulo</label>
                                </div>
                                <input class="form-control" type="text" id="e_subtitulo1" name="e_subtitulo1" style="font-family: Barlow, sans-serif;">
                            </div>
                            <div class="input-group mb-3 edtFormMarg" width="300px">
                                <div class="input-group-prepend" >
                                    <label class="input-group-text" for="e_texto1">Texto</label>
                                </div>
                                <input class="form-control" type="text" id="e_texto1" name="e_texto1" style="font-family: Barlow, sans-serif;"   >
                                <div class="input-group-append">
                                    <select class="custom-select" id="e_alineacion1" name ="e_alineacion1" >
                                        <option value="left">Izquierda</i></option>
                                        <option value="center">Centro</option>
                                        <option value="right">Derecha</i></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="custom-file" style="margin-bottom: 1rem">
                                <div class="input-group-prepend" width="40%">
                                    <label class="custom-file-label"  id="label_e_fondo1"  for="e_fondo1">Fondo </label>
                                </div>
                                <input class="custom-file-input" type="file" id="e_fondo1" name="e_fondo1" onchange="e_actualizar_label1()" lang="es">
                            </div> 
                            
   
                            <div class="input-group mb-3 edtFormMarg">
                                <div class="input-group-prepend" width="40%">
                                    <label class="input-group-text" for="e_color1">Color Texto</label>
                                </div>
                                <input class="form-control" type="text" id="e_color1" name="e_color1" style="font-family: Barlow, sans-serif;" placeholder="Ej: #123123"  >
                            </div>
                        </div>

                        <!-- Bloque2 -->
                        <div id="e_bloque2" class="bloque input-group" style="display: none">
                            <label>BLOQUE 2</label>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="e_titulo2">Título</label>
                                </div>
                                <input class="form-control" type="text" id="e_titulo2" name="e_titulo2" style="font-family: Barlow, sans-serif;">
                            </div>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="e_subtitulo2">Subtitulo</label>
                                </div>
                                <input class="form-control" type="text" id="e_subtitulo2" name="e_subtitulo2" style="font-family: Barlow, sans-serif;">
                            </div>
                            <div class="input-group mb-3 edtFormMarg" width="300px">
                                <div class="input-group-prepend" >
                                    <label class="input-group-text" for="e_texto2">Texto</label>
                                </div>
                                <input class="form-control" type="text" id="e_texto2" name="e_texto2" style="font-family: Barlow, sans-serif;"   >
                                <div class="input-group-append">
                                    <select class="custom-select" id="e_alineacion2" name ="e_alineacion2" >
                                        <option value="left">Izquierda</i></option>
                                        <option value="center">Centro</option>
                                        <option value="right">Derecha</i></option>
                                    </select>
                                </div>
                            </div>

                            <div class="custom-file" style="margin-bottom: 1rem">
                                <div class="input-group-prepend" width="40%">
                                    <label class="custom-file-label"  id="label_e_fondo2" for="e_fondo2">Fondo </label>
                                </div>
                                <input class="custom-file-input" type="file" id="e_fondo2" name="e_fondo2" onchange="e_actualizar_label2()" lang="es">
                            </div>


                            <div class="input-group mb-3 edtFormMarg">
                                <div class="input-group-prepend" width="40%">
                                    <label class="input-group-text" for="e_color2">Color Texto</label>
                                </div>
                                <input class="form-control" type="text" id="e_color2" name="e_color2" style="font-family: Barlow, sans-serif;" placeholder="Ej: #123123"  >
                            </div>
                        </div>
                        <!-- Bloque3 -->
                        <div id="e_bloque3" class="bloque input-group" style="display: none">
                            <label>BLOQUE 3</label>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="e_titulo3">Título</label>
                                </div>
                                <input class="form-control" type="text" id="e_titulo3" name="e_titulo3" style="font-family: Barlow, sans-serif;">
                            </div>
                            <div class="input-group mb-3 edtFormMarg" >
                                <div class="input-group-prepend" width="300px">
                                    <label class="input-group-text" for="e_subtitulo3">Subtitulo</label>
                                </div>
                                <input class="form-control" type="text" id="e_subtitulo3" name="e_subtitulo3" style="font-family: Barlow, sans-serif;">
                            </div>
                            <div class="input-group mb-3 edtFormMarg" width="300px">
                                <div class="input-group-prepend" >
                                    <label class="input-group-text" for="e_texto3">Texto</label>
                                </div>
                                <input class="form-control" type="text" id="e_texto3" name="e_texto3" style="font-family: Barlow, sans-serif;"   >
                                <div class="input-group-append">
                                    <select class="custom-select" id="e_alineacion3" name ="e_alineacion3" >
                                        <option value="left">Izquierda</i></option>
                                        <option value="center">Centro</option>
                                        <option value="right">Derecha</i></option>
                                    </select>
                                </div>
                            </div>

                            <div class="custom-file" style="margin-bottom: 1rem">
                                <div class="input-group-prepend" width="40%">
                                    <label class="custom-file-label"  id="label_e_fondo3" for="e_fondo3">Fondo </label>
                                </div>
                                <input class="custom-file-input" type="file" id="e_fondo3" name="e_fondo3"  onchange="e_actualizar_label3()"lang="es">
                            </div>


                            <div class="input-group mb-3 edtFormMarg">
                                <div class="input-group-prepend" width="40%">
                                    <label class="input-group-text" for="e_color3">Color Texto</label>
                                </div>
                                <input class="form-control" type="text" id="e_color3" name="e_color3" style="font-family: Barlow, sans-serif;" placeholder="Ej: #123123"  >
                            </div>
                        </div>
                        <input  name="e_idBloque" id="e_idBloque"  hidden>
                   
                        <div id="msg_error" class="alert alert-danger" style="display: none" role="alert" ></div>
                        <div class="text-center" id="button-c-c" style="width: 100%;"><button class="btn btn-primary" id="button-c" name="editar" value="editar" type="submit" style="background-color: #33a6cc;">EDITAR</button></div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .input-group-text{
        width: 100%;
    }
    .input-group-prepend{
        min-width: 120px;
    }

</style>
<script >
    $("#e_tipo").change(function () {
            var bloque = this.value;
            switch (bloque) {
              case "un_bloque":
                  $("#e_bloque1").show();
                  $("#e_bloque2").hide();
                  $("#e_bloque3").hide();
                break;
              case "doble":
                  $("#e_bloque1").show();
                  $("#e_bloque2").show();
                  $("#e_bloque3").hide();
                  break;
              case"triple_a":
                  $("#e_bloque1").show();
                  $("#e_bloque2").show();
                  $("#e_bloque3").show();
                  break;
              case "triple_b":
                  $("#e_bloque1").show();
                  $("#e_bloque2").show();
                  $("#e_bloque3").show();
                  break;
            }
    });
    
     $("#tipo").change(function () {
            var bloque = this.value;
            switch (bloque) {
              case "un_bloque":
                  $("#bloque1").show();
                  $("#bloque2").hide();
                  $("#bloque3").hide();
                break;
              case "doble":
                  $("#bloque1").show();
                  $("#bloque2").show();
                  $("#bloque3").hide();
                  break;
              case"triple_a":
                  $("#bloque1").show();
                  $("#bloque2").show();
                  $("#bloque3").show();
                  break;
              case "triple_b":
                  $("#bloque1").show();
                  $("#bloque2").show();
                  $("#bloque3").show();
                  break;
            }
    });

    function actualizar_label1(){
        var valor = $('#fondo1').val();
        $('#label_fondo1').html(valor.replace("C:\\fakepath\\",""));
    }
    function actualizar_label2(){
        var valor = $('#fondo2').val();
        $('#label_fondo2').html(valor.replace("C:\\fakepath\\",""));
    }    function actualizar_label3(){
        var valor = $('#fondo3').val();
        $('#label_fondo3').html(valor.replace("C:\\fakepath\\",""));
    }

    function e_actualizar_label1(){
        var valor = $('#e_fondo1').val();
        $('#label_e_fondo1').html(valor.replace("C:\\fakepath\\",""));
    }
    function e_actualizar_label2(){
        var valor = $('#e_fondo2').val();
        $('#label_e_fondo2').html(valor.replace("C:\\fakepath\\",""));
    }    function e_actualizar_label3(){
        var valor = $('#e_fondo3').val();
        $('#label_e_fondo3').html(valor.replace("C:\\fakepath\\",""));
    }




    


</script>




?>