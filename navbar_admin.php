<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper2" style="width: 200px;">
    <div class="sidebar-heading ">Bloques</div>
    <div class="list-group list-group-flush" >
        <?php


        //Comrpobar su el usuario existe
        include_once 'assets/config/config.php';
        $buscar_bloques = $con->prepare("SELECT * FROM bloque where idProyecto = ".$idProyecto);
        $buscar_bloques->execute();

        if ($buscar_bloques->rowCount() > 0) {
            // output data of each row
            while ($row = $buscar_bloques->fetch()) {
                echo '<div class="btn-group  bg-light"" role="group" aria-label="Basic example" >
                                <a href="#'.$row['idBloque'].'" type="button" class="list-group-item list-group-item-action bg-light" data-toggle="tooltip" title="Ir al bloque"style="border-radius: 0px;width: 70%">'.$row['idBloque'].'</a>
                                <button type="button" class="list-group-item list-group-item-action bg-light" style="border-radius: 0px;width: 30%;color: #f96363;" data-toggle="tooltip" title="Eliminar" onclick="confirmarBloque('.$row['idBloque'].')"><i class="fas fa-trash"></i></button>
                                <button type="button" class="list-group-item list-group-item-action bg-light" style="border-radius: 0px;width: 30%;color: #389fed;" data-toggle="tooltip" title="Eliminar" onclick="editar_bloque('.$row['idBloque'].',\''.$row['tipo'].'\',\''.$row['altura'].'\',\''.$row['titulo1'].'\',\''.str_replace("'" ,"",$row['subtitulo1']).'\',\''.str_replace("'" ,"",$row['texto1']).'\',\''.$row['img_url1'].'\',\''.$row['alineacion1'].'\',\''.$row['color1'].'\',\''.$row['titulo2'].'\',\''.$row['subtitulo2'].'\',\''.$row['texto2'].'\',\''.$row['img_url2'].'\',\''.$row['alineacion2'].'\',\''.$row['color2'].'\',\''.$row['titulo3'].'\',\''.$row['subtitulo3'].'\',\''.$row['texto3'].'\',\''.$row['img_url3'].'\',\''.$row['alineacion3'].'\',\''.$row['color3'].'\'  )"><i class="fas fa-edit"></i></button>
                            </div>';
            }
        }


        ?>

        <a  class="list-group-item list-group-item-action bg-primary" type="button" data-toggle="modal" data-target="#nuevoBloque" style="position: absolute; bottom: 50px; width: 100%; color: white;text-align: center">Nuevo Bloque</a>
        <a href="admin.php" class="list-group-item list-group-item-action bg-secondary" style="position: absolute; bottom: 0; width: 100%; color: white; text-align: center">Volver</a>

    </div>
    <script>

        function confirmarBloque(id) {
            if (confirm("¿Desea eliminar el objeto seleccionado? Esta acción no se puede deshacer.")) {
                delete_itemBloque(id);
            }
        }

        // Borrar un Area
        function delete_itemBloque(idProyecto) {
            var url_php = 'eliminar_bloque.php';
            var data_form = {
                id: idProyecto
            }

            $.ajax({
                type: 'POST',
                url: url_php,
                data: data_form,
                dataType: 'json',
                async: true,

            })
                .done(function ajaxDone(res) {
                    console.log(res);
                })
                .fail(function ajaxError(e) {

                    console.log(e);
                })
                .always(function ajaxAlways(e) {

                    console.log("'Final de la llamada ajax.'");
                    window.location = window.location.pathname;
                })
        }


        function editar_bloque(idBloque, tipo, altura,
                               titulo1, subtitulo1, texto1, img_url1, alineacion1, color1,
                               titulo2, subtitulo2, texto2, img_url2, alineacion2, color2,
                               titulo3, subtitulo3, texto3, img_url3, alineacion3, color3){

            //alert(idBloque);
            $('#e_idBloque').attr('value',idBloque);
            $('#e_tipo').val(tipo);
            var aux = altura.split("");
            if (aux.length === 4){
                var real_altura = aux[0]+aux[1];
                var unidad = aux[2]+aux[3];
                /*if (unidad === 'vh') unidad = '';*/
            }
            if(aux.length === 5){
                var real_altura = aux[0]+aux[1]+aux[2];
                var unidad = aux[3]+aux[4];
               /* if (unidad === 'vh') unidad = '%';*/
            }

            $('#e_altura').val(real_altura);
            $('#e_unidad').val(unidad);
            $('#e_titulo1').val(titulo1);
            $('#e_subtitulo1').val(subtitulo1);
            $('#e_texto1').val(texto1);
            $('#e_img_url1').val(img_url1);
            $('#e_alineacion1').val(alineacion1);
            $('#e_color1').val(color1);
            $('#e_titulo2').val(titulo2);
            $('#e_subtitulo2').val(subtitulo2);
            $('#e_texto2').val(texto2);
            $('#e_img_url2').val(img_url2);
            $('#e_alineacion2').val(alineacion2);
            $('#e_color2').val(color2);
            $('#e_titulo3').val(titulo3);
            $('#e_subtitulo3').val(subtitulo3);
            $('#e_texto3').val(texto3);
            $('#e_img_url3').val(img_url3);
            $('#e_alineacion3').val(alineacion3);

            $('#label_e_fondo1').html(img_url1);
            $('#label_e_fondo2').html(img_url2);
            $('#label_e_fondo3').html(img_url3);
            //$('#e_fondo1').val(img_url1);
            //$('#e_fondo2').val(img_url2);
            //$('#e_fondo3').val(img_url3);


            $('#editarBloque').modal('show');

            $("#e_tipo").change();

        }


    </script>

</div>
<!-- /#sidebar-wrapper -->

