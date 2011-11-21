<?php

  abstract class Generique {

    private $vars;
    private $autoIncrement=false;
    protected $idPDO;

    //constructeur
    public function __construct(){
      $this->vars=array();
    }

    //fonctions basiques
    public function __get($key){
      return $this->vars[$key];
    }

    public function __set($key,$value){
      return $this->vars[$key]=$value;
    }

    public function load($array){
        $retour=true;
      if(is_array($array)){
        foreach($array as $key=>$value){
          $retour = $retour && $this->vars[$key]=$value;
          }
        return $retour;
      }
      }

    public function unload($keys=NULL){
      if(is_null($keys)){
        return $this->vars=array();
      }elseif(is_array($keys)){
        $retour=true;
        foreach($keys as $key){
          $retour = $retour && $this->unload($key);
        }
      }elseif(isset($this->vars[$keys])){
        unset($this->vars[$keys]);
      }
    }

 /**
   * autoincrement : méthode à appeler si la classe est associée à une table
   * dont l'identifiant est défini par autoincrement
   */
    public function autoIncrement(){
      $this->autoIncrement=true;
    }

    public function idPDO(&$idPDO){
      $this->idPDO=$idPDO;
    }


    // fonctions de sauvegarde et de restauration pas session
    public function setSession($nom){
      return $_SESSION[$nom]=$this->vars;
    }

    public function getSession($nom){
      return $this->load($_SESSION[$nom]);
    }

    // fonctions de sauvegarde et de restauration pas cookies
    public function setCookie($nom){
      foreach($this->vars as $key=>$value){
        setCookie(get_class($this).'_'.$nom.'_'.$key,$value);
      }
    }

    public function getCookie($nom){
      foreach($_COOKIE as $key=>$value){
        $nom=substr($key,strpos($key,'_',strpos($key,'_')+1)+1);
        $this->__set($nom,$value);
      }
    }

    //fonctions de sauvegarde et de restauration par bdd
    public function setDB($table,$primaryKey){
    $query='select count(*) as nb
            from '.$table.'
            where '.$primaryKey.'="'.$this->vars[$primaryKey].'"';
      foreach($this->idPDO->query($query,PDO::FETCH_ASSOC) as $ligne){
        $nb=$ligne['nb'];
      }
      if($nb>0){
        $query='update '.$table.' set ';
        foreach($this->vars as $key=>$value){
          if($key!=$primaryKey){
            $query.=' '.$key.'="'.$value.'", ';
          }
        }
        $query=substr($query,0,-2);
        $query.=' where '.$primaryKey.'="'.$this->vars[$primaryKey].'"';

        return $this->idPDO->exec($query);
      }else{
        if($this->autoIncrement){
     foreach($this->idPDO->query('SHOW TABLE STATUS
                                  like \''.$table.'\'',PDO::FETCH_ASSOC)
        as $ligne){
              $this->vars[$primaryKey]=$ligne['Auto_increment'];
          }
         }
       $query='insert into '.$table.'('.implode(' ,',array_keys($this->vars)).')
               values ("'.implode('","',array_values($this->vars)).'")';
        $resultat=$this->idPDO->exec($query);
        return $resultat;
      }
    }
    //affecte les attributs à partir des données en base
    public function getDB($table,$primaryKey){
       $query='select *
               from '.$table.'
               where '.$primaryKey.'="'.$this->vars[$primaryKey].'"';
      $result=$this->idPDO->query($query,PDO::FETCH_ASSOC);
            if(sizeof($result)>0){
                foreach($result as $ligne){
                    $this->load($ligne);
                }
                return true;
            }else{
                return false;
            }
    }

    /**
      * definit les attributs à partir de la variable POST
      * (à utiliser pou récupérer les données d'un formulaire)
      */
    public function setPOST(){
      foreach($_POST as $key=>$value){
        if(isset($this->vars[$key])){
          $this->vars[$key]=$value;
        }
      }
    }

    //fonctions de debug
    public function debug(){
      echo '<hr /> Class : '.get_class($this).'<br />';
      foreach($this->vars as $key=>$value){
        echo $key.'=>'.$value.'<br />';
      }
    }

    //convertit la classe en XML
    public function toXML(){
      $xml='';
      $xml.='<'.get_class($this).'>'."\n";
      foreach($this->vars as $key=>$value){
        $xml.='<'.$key.'>';
        if(is_object($value)){
          $xml.=$value->toXML();
        }elseif(is_array($value)){
          $xml.=serialize($value);
        }else{
          $xml.=$value;
        }
        $xml.='</'.$key.'>'."\n";
      }
      $xml.='</'.get_class($this).'>'."\n";
      return $xml;
    }

     //fonction pour afficher l'objet dans un tableau
        public function toTable($visible=array(),$pre='',$post=''){
            $text='<tr>'.$pre;
            $cols=array_keys($visible);
            foreach($this->vars as $key=>$value){
                if(in_array($key,$cols)){
                    $text.='<td>';
                    switch($visible[$key]){
                        case 'url':
                          $text.='<a href="'.$value.'" target="_blank">URL</a>';
                            break;
                        default:
                            $text.=htmlentities($value);
                            break;
                    }
                    $text.= '</td>';
                }
            }
            $text.=$post.'</tr>';
            return $text;
        }

   /** Image resize pour créer des thumbnails ou pour contrôler le format des
     * images uploadées par les utilisateurs
     *
     * ** Ne pas oublier d'ajouter enctype="multipart/form-data"  au formulaire
     *
     * $filename = $HTTP_POST_FILES['ufile']['name'][0]
     * $source = $HTTP_POST_FILES['ufile']['tmp_name'][0]
     * $width =  largeur de l'image
     * $height = hauteur de l'image
     */
   function resize_image($filename, $tmpname, $xmax, $ymax)
   {
              $imagename = $HTTP_POST_FILES['ufile']['name'][0];
              $source = $HTTP_POST_FILES['ufile']['tmp_name'][0];
              $target = "../photos/".$imagename;
              move_uploaded_file($source, $target);

              $imagepath = $imagename;
              $save = "../photos/" . $imagepath; //La nouvelle image modifiée
              $file = "../photos/" . $imagepath; //L'image originale

              list($width, $height) = getimagesize($file) ;

              $modwidth = $width;

              $diff = $width / $modwidth;

              $modheight = $height / $diff;
              $tn = imagecreatetruecolor($modwidth, $modheight) ;
              $image = imagecreatefromjpeg($file) ;
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

              imagejpeg($tn, $save, 100) ;

              $save_thumb = "../photos/thumb/" . $imagepath; //La nouvelle image modifiée


              list($width, $height) = getimagesize($file) ;

              $modwidth = $width;

              $diff = $width / $modwidth;

              $modheight = $height / $diff;
              $tn = imagecreatetruecolor($modwidth, $modheight) ;
              $image = imagecreatefromjpeg($file) ;
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

              imagejpeg($tn, $save_thumb, 100) ;
   }


   // Redirection de page par header
   function redirect_to( $location = NULL ) {
	if($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}


    }

?>