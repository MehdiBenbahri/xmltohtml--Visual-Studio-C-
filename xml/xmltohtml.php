<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            body{
                background-color: #7330b2;
            }
        </style>
    </head>
    <body>
        <br>
        <br>
        <br>
        <form action='script.php' method='post'>
            

        </div>
        <div class="container body-content">
            <div class="panel panel-default col-md-6 col-md-offset-3">
                <br>
                <div class="panel-title text-center"><b>Ou est votre Fichier XML?</b></div>
                <div class="panel-body text-center">
                    <p>Nom du fichier | Chemin d'accès (si il n'est pas dans le dossier du projet):</p>
                    <p><i>Exemple: <b>'oxfo.xml'</b> ou <b>'C:\Users\(nom de l'utilisateur)\Desktop\monxml.xml '</b> </i></p>
                    <input type="text" class="form-control" name="path" required>
                    <br>
                    <button type="submit" class="col-md-6 col-md-offset-3 btn btn-success">Envoyer</button>
                </div>
            </div>
    </form>

</body>
</html>