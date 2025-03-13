
<!doctype html>
<html lang="en">
    <head>
        <title>Pagina principal</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
            
        />

        <style>
        body {
            background-size: cover;
            background:rgba(62, 162, 29, 0.21);
        }
        h1{
            color:rgb(0, 0, 0); /* Amarillo dorado */
                text-shadow: 2px 2px 5px rgba(205, 215, 1, 0.6);
                font-size: 40px;
                font-weight: bold;
        }
        .container{

            opacity: 0.9;
        }
        .login-container {
            min-height: 100vh; /* Ocupa toda la pantalla */
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.59);
            max-width: 400px;
            width: 100%;
        }
        .card-header {
            text-align: center;
            background:rgb(0, 255, 85);
            color: white;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-header img {
            width: 100px;
            height: 100px;
        }
        .btn-primary {
            width: 100%;
            background-color:rgb(61, 157, 50);
        }
        .btn-primary:hover {
        background-color:rgba(0, 0, 0, 0.93);
    }
        .cabesado{
            color: rgb(255, 0, 0);
            border-radius: 15px;
            text-align: center;
            background:rgba(144, 149, 143, 0);
        }
        .btn-regresar {
        background-color:rgba(13, 135, 0, 1);
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        position: absolute;
    }

    .btn-regresar:hover {
        background-color:rgba(0, 0, 0, 0.93);
    }
    </style>
    </head>

    <body>  

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                
                <!-- Formulario para inicio de sesion -->
                </div>    
                <div class="col-md-4">
                <br> <br> <br><br><br><br>
                    <form action="/config/validar.php" method="post">   <!--//secciones/index.php-->
                 <div class="card">
                    <div class= "cabesado">
                    <br>
                    <img src="img/logo.png" class="img-thumbnail"
                                width="130"
                                height="130" 
                                posision="center"/>
                            
                                
                        <h1>BIENVENIDOS</h1> 
                    </div>
                    <div class="card-body">

                

                    <div class="mb-3">
                        <label for="usuario" class="form-label">CORREO DE USUARIO</label>
                        <input
                            type="email" required
                            class="form-control"
                            name="usuario"
                            id="usuario"
                            aria-describedby="helpId"
                            placeholder="usuario"
                        >
    
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">CONTRASEÑA</label>
                        <input
                            type="password" required
                            class="form-control"
                            name="password"
                            id="contraseña"
                            aria-describedby="helpId"
                            placeholder="ingresa contraseña"
                        />
    
                    </div>
                    
                    <button
                        type="submit"
                        class="btn btn-primary"
                        method="POST"
                    >
                        INICIAR SESION
                    </button>
                    
                    
                        
                    </div>
                   
                </form>
                    
                 </div>
                 
                </div>       
        </div><br><br>
        <button class="btn-regresar" onclick="location.href='index.php'">Regresar</button>


        <!-- Bootstrap JavaScript Libraries -->
        <script>
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script>
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
