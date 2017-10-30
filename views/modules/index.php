<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="views/assets/css/main.css">
    </head>
    <body>
        <section class="container--login">
            <article>
                <img src="views/assets/image/logo.png" alt="">
                <form action="validar-inicio-sesion" method="post" id="form">
                  <h2>iniciar sesion</h2>
                  <label for="name--form">Documento de Identidad: </label>
                  <input type="number" id="name--form" name="data" required>
                  <button type="submit" class="btn-pass-form">Siguiente</button>
                </form>
                <?php if (isset($_SESSION['MESSAGE_ERROR'])) {?>
                    <div class="alert--error">
                        <?php
                          echo $_SESSION['MESSAGE_ERROR'];
                          unset($_SESSION['MESSAGE_ERROR']);
                         ?>
                    </div>
               <?php } ?>
                
            </article>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    </body>
</html>
