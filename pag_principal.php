

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENIDO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/pag_principal.css">
    <link rel="icon" href="img/escudo_unipamplona.jpg">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <h4 class="text-light">Logo</h4>
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="user fas fa-user-circle"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item menuperfil cerrar" href="#">
                                <i class="fas fa-tools m-1"></i>
                                Ajustes
                            </a>
                            <a class="dropdown-item menuperfil cerrar" href="index.php">
                                <i class="fas fa-sign-out-alt m-1"></i>
                                Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="#" data-toggle="modal" data-target="#modalGenerarAsistencia"><i class="fa fa-archive"></i><span>GENERAR ASISTENCIA</span></a>
                    <a href="#" data-toggle="modal" data-target="#modalEditarAsistencia"><i class="fa fa-pencil-square-o"></i><span>EDITAR ASISTENCIA</span></a>
                    <a href="#" data-toggle="modal" data-target="#modalHistorial"><i class="fa fa-history"></i><span>HISTORIAL</span></a>
                    <a href="#" data-toggle="modal" data-target="#modalEliminarAsistencia"><i class="fa fa-times"></i><span>ELIMINAR</span></a>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Modal Generar Asistencia -->
    <div class="modal fade" id="modalGenerarAsistencia" tabindex="-1" aria-labelledby="modalGenerarAsistenciaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGenerarAsistenciaLabel">Generar Asistencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php include("php/obtenermateria.php");?>

                    <form action="php/generar_asistencia.php" method="post">
                        
                    <div class="form-group">
                            <label for="codigo_docente">Codigo del Docente</label>
                            <input type="text" class="form-control" name="codigo_docente">
                        </div>

                        <div class="form-group">
                            <label for="materia">Materia</label>
                            <select name="materia">
                            <?php   while($datos = mysqli_fetch_array($query))
                                {             
                            ?>
                                <option value="<?php echo $datos['id']?>"><?php echo $datos['Nombre_materia']?></option>
                            <?php
                                }
                            ?>
                            </select>
                            
                        </div>
                                                        
                        <button type="submit" value="Enviar" class="btn btn-primary">Guardar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Asistencia -->
    <div class="modal fade" id="modalEditarAsistencia" tabindex="-1" aria-labelledby="modalEditarAsistenciaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarAsistenciaLabel">Editar Asistencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="materia-editar">Materia</label>
                            <input type="text" class="form-control" id="materia-editar" placeholder="Ingresa la materia">
                        </div>
                        <div class="form-group">
                            <label for="salon-editar">Salón</label>
                            <input type="text" class="form-control" id="salon-editar" placeholder="Ingresa el salón">
                        </div>
                        <div class="form-group">
                            <label for="fecha-editar">Fecha</label>
                            <input type="date" class="form-control" id="fecha-editar">
                        </div>
                        <div class="form-group">
                            <label for="hora-editar">Hora</label>
                            <input type="time" class="form-control" id="hora-editar">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Historial -->
    <div class="modal fade" id="modalHistorial" tabindex="-1" aria-labelledby="modalHistorialLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHistorialLabel">Historial de Asistencias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Aquí puedes poner una tabla o una lista para mostrar el historial -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                            </tr>
                        </thead>
                        <?php include("php/historial.php");
                            while($mostrar=mysqli_fetch_array($resul)){
                        ?>
                        
                        <tbody>
                            <td><?php echo $mostrar['id']?></td>
                            <td><?php echo $mostrar['Materia_id']?></td>
                            <td><?php echo $mostrar['Asistencia_docente_codigo']?></td>
                            <td><?php echo $mostrar['FECHA']?></td>
                            <td><?php echo $mostrar['HORA']?></td>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Asistencia -->
    <div class="modal fade" id="modalEliminarAsistencia" tabindex="-1" aria-labelledby="modalEliminarAsistenciaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarAsistenciaLabel">Eliminar Asistencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="php/eliminar.php" method="POST">
                        <div class="form-group">
                        <select name="materia1">
                            <?php   include('php/obtenermateria.php');
                            while($datos = mysqli_fetch_array($query))
                                {             
                            ?>
                                <option value="<?php echo $datos['id']?>"><?php echo $datos['Nombre_materia']?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fecha_eliminar">Fecha</label>
                            <input type="date" class="form-control" name="fecha_eliminar">
                        </div>
                        
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
</body>
</html>