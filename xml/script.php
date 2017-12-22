
<?php


    include 'v_entete.php';
    //Le chemin de votre xml
    $path = $_POST['path'];

    function getTypeOfMember($lettre) {
        switch ($lettre) {
            case 'T':
                return "type : classe, interface, struct, enum, délégué";

            case 'F':
                return "champ";

            case 'M':
                return "méthode (notamment des méthodes spéciales telles que des constructeurs, des opérateurs, etc.)";

            case 'P':
                return "propriété (notamment des indexeurs ou autres propriétés indexées)";

            case 'N':
                return "namespace";

            case 'E':
                return "événement";

            case '!':
                return "chaîne d’erreur";

            case '':
                return "Vous ne pouvez pas ajouter de commentaires de documentation à un espace de noms,<br> mais vous pouvez faire des références cref à des commentaires,<br> si cela est pris en charge.";
        }
    }

    $i = 0;
    $use_errors = libxml_use_internal_errors(true);
    $xml = simplexml_load_file($path) or die("Error: Cannot create object");




    echo '<table class="table">';
    echo '<caption><h3>' . $xml->assembly->name . "<br>" . '<h4>Documentation du projet ' . $xml->assembly->name . '</h4>' . '</h3> Script de génération xmltohtml pour Visual Studio - par Mehdi Benbahri</caption> 

  ';
    echo "<tr>
            <th> Type du membre </th>
           <th class='col-md-4'>Classe/Methode</th>
           <th>Description</th>
			<th class='col-md-1'>Exception</th>
			<th>Description des paramètre(s)</th>
       </tr>";

    while ($i < count($xml->members->member)) {
        $desr = $xml->members->member[$i]->summary;
        $nom = $xml->members->member[$i]['name'];
        $autre = $xml->members->member[$i]->exception;
        $param = $xml->members->member[$i]->param;
        $see = $xml->members->member[$i]->summary->see['cref'];

        echo "
   <tr>
        <td>";
        echo '<b>' . substr($nom, 0, 1) . '</b><br><i>' . getTypeOfMember(substr($nom, 0, 1)) . '</i>';
        echo "</td>
       <td>";
        echo substr($nom, 2);
        echo "</td>
       <td>$desr  <i><b>";
        echo substr($see, 2);
        echo "</b></i></td>
		<td class='text-primary'>";
        if (!empty($autre)) {
            echo $autre;
        } else {
            echo '<span class="glyphicon glyphicon-remove-sign text-danger"></span>';
        };
        echo "</td>
		 <td>";
        foreach ($param as $par) {
            if (!empty($par)) {
                echo $par . ' ; <br> ';
            } else {
                echo '<span class="glyphicon glyphicon-remove-sign text-danger"></span>';
            }
        }
        echo "</td>
   </tr>
";
        $i++;
    }
    echo '</table>';


    include 'v_footer.php';

?>