<?php 
include 'includes/nav.php'
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .animate-form {
            animation: slide-up 1s ease-out;
        }

        @keyframes slide-up {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Efecto en el botón al pasar el cursor */
        .btn-primary {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Efecto de la alerta de error */
        .alert {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4 animate-form" style="max-width: 400px; width: 100%; background-color: #f8f9fa;">
            <h3 class="card-title text-center mb-4 text-primary">Iniciar Sesión</h3>
            
            <form method="post" action="login2.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" name="nombre" id="username" class="form-control" placeholder="Ingrese su nombre de usuario" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>

        </div>
    </div>
    <?php 
include 'includes/footer.php'
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>