<html>

<head>
    <title>Inscription</title>
    <script language="JavaScript">
       
       function verification() {
            if (document.getElementById("nom").value == "") { alert("Veuillez taper votre nom!"); return false;}
       
    
            if (document.getElementById("email").value == "") { alert("Veuillez entrer votre adresse e-mail!"); return false;}
           if (document.getElementById("email").value.indexOf('@') == -1) { alert("Adresse e-mail incorrecte!"); return false; }    
        }
	

    </script>
	</head>
<body>
 <?php

    
	if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['pass']))
	{
		if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email'])and !empty($_POST['pass']))
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
				$sql2="insert into utilisateur(nom, prenom,email,pass) values('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['email']."','".$_POST['pass']."')";
				$bdd->exec($sql2);
				echo"<center>Utilisateur ".$_POST['nom']." est ajouté avec succés</center>";
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
