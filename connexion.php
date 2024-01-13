<html>

<head>
    <title>Connexion</title>
    </head>
<body>
 <?php
if(isset($_POST['email']) and isset($_POST['pass']))
{
    if(!empty($_POST['email'])and !empty($_POST['pass']))
    {
        try
        {
            global $bdd;
            $bdd = new PDO('mysql:host=localhost;dbname=inscription;charset=utf8', 'root', '');
            
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    $sql1="select * from utilisateur where email='".$_POST['email']."'";
    $reponse = $bdd->query($sql1);
    $donnees = $reponse->fetch();

        if(empty($donnees))
        {   
            $sql2="insert into connexion (email,pass) values('".$_POST['email']."','".$_POST['pass']."')";
            $bdd->exec($sql2);
            echo"<center>Utilisateur ".$_POST['email']." est ajouté avec succés</center>";
        }
        else
        echo "<center>Utilisateur existe déja !!!</center>";
    } 
    header("Location: projet.html");
    exit();
}
?>
</body>

</html>
