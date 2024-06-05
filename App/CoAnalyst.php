<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">asjkdhkasdhkasjhd
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            width: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }
        .display-flex {
            display: flex;
            flex-wrap: wrap;
        }
        .size-menu {
            width: 76px;
            height: 76px;
        }
        .full-size {
            height: 100%;
            width: 100%;
        }
        .icon-merge {
            justify-content: center;
            align-items: center;
        }
        .icon-color, .menu-icon {
            background-color: #444444;
            color: #FFFFFF;
        }
        .main-menu {
            height: 1143px;
            background-color: #EBEBEB;
        }
        .headers {
            background-color: #ffffff;
            width: 100%;
            height: 76px;
            display: contents;
        }
        .border-color {
            border-bottom: 1px solid rgba(170, 170, 170, 0.30);
        }
        .text-row {
            font-size: 22px;
            font-weight: bold; 
        }
        .icon-text {
            align-content: center;
            padding: 15px;
        }
        .user-info {
            padding: 2px;
        }
        .text-user {
            text-align: end;
        }
        .content {
            flex-grow: 1; /* Ocupa el espacio restante */
            background-color: #ffffff;
        }
        .header-title{
            display: flex;
            border-bottom: 1px solid rgba(170, 170, 170, 0.30);
            width: 100%;
            height: 76px;
        }
        .title-row{
            width: 50%;
            background-color: #ffffff;
            align-content: center;
        }
        .end-aling{
            text-align: end;
        }
        .column-font{
            font-size: 18px;
            font-family: 'Montserrat', sans-serif;
        }
        .data-container{
            border: 1px solid rgba(170, 170, 170, 0.30);
            border-radius: 5px;
            /* margin-block: 4px; */
            margin-left: 3%;
            margin-right: 3%;
        }
        .data-input{
            width: 96%;
        }
        textarea{
            border: 2px solid rgba(170, 170, 170, 0.30);
            border-radius: 5px;
        }
        h5{
            color: #444444;
            font-family: 'Montserrat', sans-serif;

        }

        .icon-animation :hover{
            color: #444444;
            background-color: #FFFFFF;
            border-radius: 9px;
            padding-block: 11px;
            width: 72%;
        }
        .table {
            width: 100%;
            border-collapse: collapse; /* Elimina el espacio entre los bordes de las celdas */
            font-family: 'Montserrat', sans-serif;
            
        }

        .table th, .table td {
            padding: 12px 15px; /* Añade padding para hacer las celdas más espaciosas */
            text-align: left; /* Alinea el texto a la izquierda */
            border-bottom: 1px solid rgba(170, 170, 170, 0.30); /* Línea de separación entre filas */
        }

        .table thead {
            background-color: #ffffff; /* Color de fondo para el encabezado */
            color: #333; /* Color de texto para el encabezado */
        }

        .table tbody tr:hover {
            background-color: #f9f9f9; /* Color de fondo al pasar el mouse */
        }
        .title-table{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .search-input{
            margin-right: 30px;
        }
        .btn-submit{
            background-color: #606060;
            color: #FFFFFF;
            border: 1px solid rgb(96, 96, 96, 0.30);
            border-radius: 5px;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
            width: 120px;
            height: 32px;
            font-weight: bold;
        }
        .input-text{
            color: #000000;
            border: 1px solid rgb(96, 96, 96, 0.30);
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
            width: 206px;
            height: 32px;
        }

        .column-data{
            display: flex;
            flex-wrap: nowrap;
            margin: auto;
            width: 100%;
        }

        .data-info{
            background-color: #606060;
            width: 270px;
            border-radius: 16px;
        }
        .text-inter{
            color: #FFFFFF;
            text-align: justify;
            margin-left: 25px;
        }
        label{
            color: #FFFFFF;
            font-weight: bold;
        }
        .column{
            margin-top: 18px;
            margin-bottom: 5px;
        }
        .input-code{
            justify-content: flex-end;
            padding-right: 25px;
            display: flex;
        }
        .btn-code{
            border: 1px solid rgb(255, 255, 255);
            background-color: #606060;
            color: #FFFFFF;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            width: 120px;
            height: 32px;
        }
        .btn-code:hover{
            color: #000000;
            background-color: #ffffff;
            border: 1px solid #606060;
            font-weight: bold;

        }
    </style>
</head>
<body>
    <header class="display-flex">
        <div class="main-menu">
            <div class="size-menu">
                <div class="menu-icon display-flex full-size icon-merge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </div>
                <div class="icon-animation icon-header display-flex full-size icon-merge ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
                <div class="icon-animation icon-header display-flex full-size icon-merge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                    </svg>
                </div>
                <div class=" icon-animation icon-header display-flex full-size icon-merge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="header-title">
                <div class="title-row">
                    <p class="text-row " style="padding-left: 15px;">@ Analyst Code</p>
                </div>
                <div class="title-row">
                    <div class="colum-text" style="display: flex; justify-content: flex-end;">
                        <div class="inter-text">
                            <p class="column-font" style="margin: 10px;">Renee McKelvey  </p>
                            <p style="font-size:14px; text-align: end; margin: 0;">Usuario</p>
                        </div>
                        <div class="icon-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-image-alt" viewBox="0 0 16 16">
                                <path d="M7 2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0m4.225 4.053a.5.5 0 0 0-.577.093l-3.71 4.71-2.66-2.772a.5.5 0 0 0-.63.062L.002 13v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="title">
                <div style="padding-left: 50px; font-size: 22px;">
                    <h4>@ Funcion:</h4>
                </div>
            </div>
            <form action="CoAnalystController.php" method="post">
                <div class="column-data display-flex">
                    <div class="data-container" style="border: 2px solid rgba(170, 170, 170, 0.30); width: 75%;">
                        <div class="data-title" style="margin-left: 25px;">
                            <div class="title-table">
                                <h5>Ingrese la función a analizar!</h5>
                                <div class="icon" style="width: 55px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-terminal" viewBox="0 0 16 16">
                                        <path d="M6 9a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3A.5.5 0 0 1 6 9M3.854 4.146a.5.5 0 1 0-.708.708L4.793 6.5 3.146 8.146a.5.5 0 1 0 .708.708l2-2a.5.5 0 0 0 0-.708z"/>
                                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="data-inter display-flex">
                            <div class="data-input" style="margin-left: 25px; margin-bottom: 25px;">
                                <textarea style="width: 97%;height: 100%;" name="code" id="code" cols="40" rows="20" placeholder="Type here"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="data-info">
                        <div class="row">
                            <div class="column" style="display: flex;
                            justify-content: space-between;">
                                <h4 class="text-inter">Seleccione lenguaje</h4>
                                <div class="icon" style="
                                    width: 55px;
                                    align-content: center;
                                    color: #fff;
                                ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-terminal" viewBox="0 0 16 16">
                                        <path d="M6 9a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3A.5.5 0 0 1 6 9M3.854 4.146a.5.5 0 1 0-.708.708L4.793 6.5 3.146 8.146a.5.5 0 1 0 .708.708l2-2a.5.5 0 0 0 0-.708z"/>
                                        <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="column">
                                <input class="text-inter only-one'" type="checkbox" name="language" value="python" id="python" >
                                <label for="Python">Python</label>
                            </div>
                            <div class="column">
                                <input class="text-inter" type="checkbox" name="language" value="php" id="php" >
                                <label for="php">PHP</label>
                            </div>
                            <div class="column">
                                <input class="text-inter only-one'" type="checkbox" name="language" value="javaScript" id="javaScript" >
                                <label for="js">JavaScript</label>
                            </div>
                            <div class="column">
                                <h4 class="text-inter only-one'">Proximamente</h4>
                            </div>
                            <div class="column">
                                <input class="text-inter only-one'" type="checkbox" name="language" value="java" id="java" disabled="disabled">
                                <label for="java">java</label>
                            </div>
                            <div class="column">
                                <input class="text-inter only-one'" type="checkbox" name="language" value="c#" id="c#"  disabled="disabled">
                                <label for="c#">C#</label>
                            </div>
                            <div class="column">
                                <div class="input-code">
                                    <input type="submit" value="enviar codigo" class="btn-code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <br>
            <div class="data-container" style="border: 2px solid rgba(170, 170, 170, 0.30);">
                <div class="data-title" style="margin-left: 25px;">
                    <div class="title-table" >
                        <h5>Estadisticas</h5>
                        <div class="search-input">
                            <input type="text" name="" id="" placeholder="Buscar" class="input-text">
                            <input type="submit" value="Buscar" class="btn-submit">
                        </div>
                    </div>
                </div>
                <div class="data-input" style="margin: 18px; margin-bottom: 25px;">
                    <!--<textarea style="width: 99%;height: 100%;" name="code" id="code" cols="40" rows="20" placeholder="Type here"></textarea>-->
                    <table class="table" style="width: 100%;">
                        <thead>
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tiempo de ejecucion</th>
                            <th scope="col">Calidad</th>
                            <th scope="col">Complejidad</th>
                            <th scope="col">Complejidad</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>

                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>

                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>Larry the Bird</td>
                          </tr>
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </header>
    <script >
        document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                document.querySelectorAll('input[type="checkbox"]').forEach(function(other) {
                    if (other !== checkbox && other.checked) other.checked = false;
                });
            });
        });
    </script>
</body>
</html>
