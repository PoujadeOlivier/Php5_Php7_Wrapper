<?php

$version = explode('.',PHP_VERSION);

if($version[0] < 7)
{
	
	@mysql_connect('localhost', 'identifiant', 'motdepasse') or die('Connexion à la base de données impossible');
	@mysql_select_db('nomdelabase') or die('base de données inexistante');
	@mysql_set_charset('utf8');

}
else
{



	
	/*##########################################################################
			CONNEXION A LA BASE DE DONNEES
	##########################################################################*/
	$mysqli = new mysqli("localhost", "identifiant", 'motdepasse', 'nomdelabase');
	/* Vérification de la connexion */
	if (mysqli_connect_errno()) {
		printf("Échec de la connexion : %s\n", mysqli_connect_error());
		exit();
	}
	if (!$mysqli->set_charset("utf8")) {
		printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $mysqli->error);
	}

	
	
	
	
	
	
	//###############################################################	
	//########## PORTAGE DE FONCTION PHP5 VERS PHP7	
	//###############################################################	
	
	
	
    function mysql_connect($a, $b, $c)
	{
		return true;
    }


    function mysql_select_db($a)
	{
		
		return true;
    }    
	
    function mysql_set_charset($a)
	{
		//ici ça ne fonctionne pas, je ne comprend pas, ce n'est pas grave pour cette fonction,
		//car je le déclare après le musqli.
		//global $mysqli;
		//return $mysqli->set_charset($a);
		return true;
    }  	

    function mysql_query($query)
	{
        global $mysqli;
        if($query)
		{
            $result = $mysqli->query($query);
            return $result;
        }
    }  		

	
    function mysql_num_rows($result){
        if($result){
            $row_cnt = $result->num_rows;;
            return $row_cnt;
        }
    }
	
    function mysql_error(){
        global $mysqli;
        $error = $mysqli->error;
        return $error;
    }
	
	function mysql_fetch_assoc($result){
    if($result){
        $row =  $result->fetch_assoc();
         return $row;
       }
	}	


	function mysql_real_escape_string($q) {
		global $mysqli;
		//return mysqli_real_escape_string($mysqli,$q);
		return $mysqli->real_escape_string($q);
	}
	

	//mysqli_escape_string — Alias de mysqli_real_escape_string()
	function mysql_escape_string($q) {
		global $mysqli;
		return $mysqli->real_escape_string($q);
	}		
	
	
	function mysql_fetch_array($result){
		if($result){
			$row =  $result->fetch_assoc();
			return $row;
		}
	}
	
	
	
	
	function mysql_insert_id(){
			global $mysqli;
			$lastInsertId = $mysqli->insert_id;
			return $lastInsertId;
	}
	
	
	
	
	function mysql_affected_rows(){
			global $mysqli;
			$NbreDeLignesAffectes = $mysqli->affected_rows;
			return $NbreDeLignesAffectes;
	}






	//########## autres que mysql
	
	//exemple de présentation si on est pas sûr
	//mais comme on est sûr que ça n'existe pas, je vire le contrôle....
	/*
	if( !function_exists( 'split' ) )
	{
		function split( $pattern, $string, $limit = -1 )
		{
			return preg_split( '/' . preg_quote( $pattern, '/' ) . '/', $string, $limit );
		}
	}
	*/
	
	
	
	
	function ereg_replace( $pattern, $replacement, $string )
	{
		return preg_replace( '/' . preg_quote( $pattern, '/' ) . '/', $replacement, $string );
	}
	
	
	
	function eregi_replace( $pattern, $replacement, $string )
	{
		return preg_replace( '/' . preg_quote( $pattern, '/' ) . '/i', $replacement, $string );
	}
	
	
	
	function ereg( $pattern, $string, $regs = null )
	{
		if( $regs ) return preg_match( '/' . preg_quote( $pattern, '/' ) . '/', $string, $regs );
		else return preg_match( '/' . preg_quote( $pattern, '/' ) . '/', $string );
	}
	
	
	
	function eregi( $pattern, $string, $regs = null )
	{
		if( $regs ) return preg_match( '/' . preg_quote( $pattern, '/' ) . '/i', $string, $regs );
		else return preg_match( '/' . preg_quote( $pattern, '/' ) . '/i', $string );
	}
	
	
	
	function split( $pattern, $string, $limit = -1 )
	{
		return preg_split( '/' . preg_quote( $pattern, '/' ) . '/', $string, $limit );
	}
	
	
	
	function spliti( $pattern, $string, $limit = -1 )
	{
		return preg_split( '/' . preg_quote( $pattern, '/' ) . '/i', $string, $limit );
	}
	
	
	
	
	//###############################################################	
	//########## FIN OLIV PORTAGE DES FONCTION PHP VERS PHP7	
	//###############################################################	
	

	
}










?>
