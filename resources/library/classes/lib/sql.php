<?php


	//	Constantes SQL
	define("OBJECT","OBJECT",true);
	define("ARRAY_A","ARRAY_A",true);
	define("ARRAY_N","ARRAY_N",true);


	class db {

		// ==================================================================
		//	Constructeur de la DB - Connection au serveur et sélection de la BD

		function db($dbuser, $dbpassword, $dbname, $dbhost)
		{

			$this->dbh = @mysql_connect($dbhost,$dbuser,$dbpassword);

			if ( ! $this->dbh )
			{
				$this->print_error("<ol><b>Erreur de connection à la base de données!</b><li>Vérifier le nom d'utilisateur / mot de passe<li>Vérifier le hostname (adresse du serveur)<li>Est-ce que la base de données est bien fonctionnelle?</ol>");
			}


			$this->select($dbname);

		}

		// ==================================================================
		//	Sélection de la DB (Si une autre doit être sélectionnée)

		function select($db)
		{
			if ( !@mysql_select_db($db,$this->dbh))
			{
				$this->print_error("<ol><b>Erreur de sélection de la base de données <u>$db</u>!</b><li>Existe-elle?<li>Est-ce que la connection est valide?</ol>");
			}
			mysql_set_charset('utf8');
		}

		// ==================================================================
		//	Retour des erreurs SQL

		function print_error($str = "")
		{

			if ( !$str ) $str = mysql_error();

			// If there is an error then take note of it
			print "<blockquote><font face=arial size=2 color=ff0000>";
			print "<b>Erreur de SQL/BD --</b> ";
			print "[<font color=000077>$str</font>]";
			print "</font></blockquote>";
		}

		// ==================================================================
		//	Requête de base

		function query($query, $output = OBJECT)
		{

			// Log de comment la requête a été effectuée
			$this->func_call = "\$db->query(\"$query\", $output)";

			// Kill this
			$this->last_result = null;
			$this->col_info = null;

			// Mise en mémoire de la dernière requête pour fin de déboguage
			$this->last_query = $query;

			// Effectuer la requête via la fonction standard mysql_query
			$this->result = mysql_query($query,$this->dbh);

			if ( mysql_error() )
			{

				// S'il y a une erreur, en prendre note
				$this->print_error();

			}
			else
			{

				// Si this est une requête select valide
				if ( $this->result )
				{

					// =======================================================
					// Prendre note de la colonne info

					$i=0;
					while ($i < @mysql_num_fields($this->result))
					{
						$this->col_info[$i] = @mysql_fetch_field($this->result);
						$i++;
					}

					// =======================================================
					// Sauvegarder le résultat de la requête

					$i=0;
					while ( $row = @mysql_fetch_object($this->result) )
					{

						// Enregistrer les résultats dans une chaine principale
						$this->last_result[$i] = $row;

						$i++;
					}

					@mysql_free_result($this->result);

					// S'il y a des résultats, retourner true pour $db->query
					if ( $i )
					{
						return true;

					}
					else
					{
						return false;
					}

				}

			}
		}

		// ==================================================================
		//	Afficher une variable de la DB

		function get_var($query=null,$x=0,$y=0)
		{

			// Log de l'appel de la fonction
			$this->func_call = "\$db->get_var(\"$query\",$x,$y)";

			// S'il y a une requête, exécuter. Sinon utiliser les résultats mis en cache
			if ( $query )
			{
				$this->query($query);
			}

			// Extraire les variables des résultats en cache basé sur les valeurs x et y
			if ( $this->last_result[$y] )
			{
				$values = array_values(get_object_vars($this->last_result[$y]));
			}

			// S'il y a une valeur, la retourner. Sinon retourner null
			return $values[$x]?$values[$x]:null;
		}

		// ==================================================================
		//	Afficher une seule ligne de la table

		function get_row($query=null,$y=0,$output=OBJECT)
		{

			// Log de l'appel de la fonction
			$this->func_call = "\$db->get_row(\"$query\",$y,$output)";

			// S'il y a une requête, exécuter. Sinon utiliser les résultats mis en cache
			if ( $query )
			{
				$this->query($query);
			}

			// Si le résultat est un objet, retourner l'objet en utilisant row offset
			if ( $output == OBJECT )
			{
				return $this->last_result[$y]?$this->last_result[$y]:null;
			}
			// Si le résultat est un tableau associatif, le retourner comme ça
			elseif ( $output == ARRAY_A )
			{
				return $this->last_result[$y]?get_object_vars($this->last_result[$y]):null;
			}
			// Si le résultat est un tableau numérique, le retourner comme ça
			elseif ( $output == ARRAY_N )
			{
				return $this->last_result[$y]?array_values(get_object_vars($this->last_result[$y])):null;
			}
			// Si un résultat invalide a été appelé
			else
			{
				$this->print_error(" \$db->get_row(string query,int offset,output type) -- Le type d'output devrait être: OBJECT, ARRAY_A, ARRAY_N ");
			}

		}

		// ==================================================================
        //  Fonction d'affichage d'une colonne du résultat mis en cache basé sur
        //  l'index X


		function get_col($query=null,$x=0)
		{

			// S'il y a une requête, exécuter. Sinon utiliser les résultats mis en cache
			if ( $query )
			{
				$this->query($query);
			}

			// Extraire les valeurs des colonnes
			for ( $i=0; $i < count($this->last_result); $i++ )
			{
				$new_array[$i] = $this->get_var(null,$x,$i);
			}

			return $new_array;
		}

		// ==================================================================
		// Afficher le résultat comme un groupe de résultats (result set)

		function get_results($query=null, $output = OBJECT)
		{

			// Log de l'appel de la fonction
			$this->func_call = "\$db->get_results(\"$query\", $output)";

			// S'il y a une requête, exécuter. Sinon utiliser les résultats mis en cache
			if ( $query )
			{
				$this->query($query);
			}

			// Retourner un tableau d'objets. Chaque ligne est un objet
			if ( $output == OBJECT )
			{
				return $this->last_result;
			}
			elseif ( $output == ARRAY_A || $output == ARRAY_N )
			{
				if ( $this->last_result )
				{
					$i=0;
					foreach( $this->last_result as $row )
					{

						$new_array[$i] = get_object_vars($row);

						if ( $output == ARRAY_N )
						{
							$new_array[$i] = array_values($new_array[$i]);
						}

						$i++;
					}

					return $new_array;
				}
				else
				{
					return null;
				}
			}
		}


		// ==================================================================
        // Fonction d'affichage de meta data reliés à la dernière requête


		function get_col_info($info_type="name",$col_offset=-1)
		{

			if ( $this->col_info )
			{
				if ( $col_offset == -1 )
				{
					$i=0;
					foreach($this->col_info as $col )
					{
						$new_array[$i] = $col->{$info_type};
						$i++;
					}
					return $new_array;
				}
				else
				{
					return $this->col_info[$col_offset]->{$info_type};
				}

			}

		}


		// ==================================================================
        // Filtragedes entrées pour éviter des injections SQL


	    function sql_quote($value)
        {
            if( get_magic_quotes_gpc() )
                {
                $value = stripslashes($value);
                }

        //check if this function exists
            if( function_exists( 'mysql_real_escape_string' ) )
                {
                $value = mysql_real_escape_string($value, $this->dbh);
                }
        //for PHP version < 4.3.0 use addslashes
            else
                {
                $value = addslashes($value);
                }
            return $value;
                }


		// ==================================================================
        // Affichage d'une façon lisible des variables d'entrées


		function vardump($mixed)
		{

			echo "<blockquote><font color=000090>";
			echo "<pre><font face=arial>";

			if ( ! $this->vardump_called )
			{
				echo "<font color=800080>Chargement des variables..</b></font>\n\n";
			}

			print_r($mixed);
			echo "\n\n<b>Dernière requête:</b> ".($this->last_query?$this->last_query:"NULL")."\n";
			echo "<b>Dernier appel de fonction:</b> " . ($this->func_call?$this->func_call:"None")."\n";
			echo "<b>derniers enregistrements chargés:</b> ".count($this->last_result)."\n";
			echo "</font></pre></font></blockquote>";
			echo "\n<hr size=1 noshade color=dddddd>";

			$this->vardump_called = true;

		}

		// Alias pour la fonction ci-haut
		function dumpvars($mixed)
		{
			$this->vardump($mixed);
		}

		// ==================================================================
        // Affiche la dernière requête étant envoyée à la DB et un tableau des
        //  résultats (s'il y a lieu)

		function debug()
		{

			echo "<blockquote>";


			if ( ! $this->debug_called )
			{
				echo "<font color=800080 face=arial size=2>Debug..</b></font><p>\n";
			}
			echo "<font face=arial size=2 color=000099><b>Requête --</b> ";
			echo "[<font color=000000><b>$this->last_query</b></font>]</font><p>";

				echo "<font face=arial size=2 color=000099><b>Résultat de la requête..</b></font>";
				echo "<blockquote>";

			if ( $this->col_info )
			{

				// =====================================================
				// Premières rangées du résultat

				echo "<table cellpadding=5 cellspacing=1 bgcolor=555555>";
				echo "<tr bgcolor=eeeeee><td nowrap valign=bottom><font color=555599 face=arial size=2><b>(row)</b></font></td>";


				for ( $i=0; $i < count($this->col_info); $i++ )
				{
					echo "<td nowrap align=left valign=top><font size=1 color=555599 face=arial>{$this->col_info[$i]->type} {$this->col_info[$i]->max_length}<br><font size=2><b>{$this->col_info[$i]->name}</b></font></td>";
				}

				echo "</tr>";

				// ======================================================
				// Affiche les résultats

			if ( $this->last_result )
			{

				$i=0;
				foreach ( $this->get_results(null,ARRAY_N) as $one_row )
				{
					$i++;
					echo "<tr bgcolor=ffffff><td bgcolor=eeeeee nowrap align=middle><font size=2 color=555599 face=arial>$i</font></td>";

					foreach ( $one_row as $item )
					{
						echo "<td nowrap><font face=arial size=2>$item</font></td>";
					}

					echo "</tr>";
				}

			} // is c'est le dernier
			else
			{
				echo "<tr bgcolor=ffffff><td colspan=".(count($this->col_info)+1)."><font face=arial size=2>Aucun résultat</font></td></tr>";
			}

			echo "</table>";

			} // if col_info
			else
			{
				echo "<font face=arial size=2>Aucun résultat</font>";
			}

			echo "</blockquote></blockquote><hr noshade color=dddddd size=1>";


			$this->debug_called = true;
		}


	}

$db = new db(DB_USER, DB_PASS, DB_NAME, DB_SERVER);

?>