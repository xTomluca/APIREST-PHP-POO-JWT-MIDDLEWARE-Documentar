<?php
class usuario
{
    public $nombre;
    public $password;
    public $id;

/* final especiales para slimFramework*/
     public function BorrarUsuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("
        delete
        from usuario
        WHERE id=:id");
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->rowCount();
    }

   /*public static function BorrarUsuarioPorAnio($año)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("
        delete
        from usuario
        WHERE jahr=:anio");
            $consulta->bindValue(':anio',$año, PDO::PARAM_INT);
            $consulta->execute();
            return $consulta->rowCount();

    }*/
   public function ModificarUsuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("
        update usuario
        set nombre='$this->nombre',
        password='$this->password'
        WHERE id='$this->id'");
        return $consulta->execute();
    }
   
 
    public function InsertarElusuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (id,nombre,password)values('$this->id','$this->nombre','$this->password')");
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

    /* public function ModificarUsuarioParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("
        update usuario
        set nombre=:nombre,
        password=:password
        WHERE id=:id");
        $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
        $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
        $consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $consulta->execute();
    }*/

    /*public function InsertarElUsuarioParametros()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,interpret,jahr)values(:nombre,:password,:anio)");
        $consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
        $consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }*/

    /*public function Guardarusuario()
    {

        if($this->id>0)
            {
                $this->ModificarUsuarioParametros();
            }else {
                $this->InsertarElusuarioParametros();
            }

    }*/

    public static function TraerTodoLosUsuario()
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
    $consulta =$objetoAccesoDato->RetornarConsulta("select nombre,password,id from usuario")
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
   }

   public static function TraerUnUsuario($id) 
   {
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
       $consulta =$objetoAccesoDato->RetornarConsulta("select nombre,password,id from usuario where id = $id");
       $consulta->execute();
       $usuarioBuscado= $consulta->fetchObject('usuario');
       return $usuarioBuscado;  
   }

   /*public static function TraerUnUsuarioAnio($id,$anio) 
   {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("select  titel as nombre, interpret as password,jahr as año from usuario  nombre id=? AND jahr=?");
           $consulta->execute(array($id, $anio));
           $usuarioBuscado= $consulta->fetchObject('usuario');
             return $usuarioBuscado;				

           
   }*/

   /*public static function TraerUnUsuarioAnioParamNombre($id,$anio) 
   {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("select  titel as nombre, interpret as password,jahr as año from usuario  nombre id=:id AND jahr=:anio");
           $consulta->bindValue(':id', $id, PDO::PARAM_INT);
           $consulta->bindValue(':anio', $anio, PDO::PARAM_STR);
           $consulta->execute();
           $usuarioBuscado= $consulta->fetchObject('usuario');
             return $usuarioBuscado;				

           
   }*/
   
   /*public static function TraerUnUsuarioAnioParamNombreArray($id,$anio) 
   {
           $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
           $consulta =$objetoAccesoDato->RetornarConsulta("select  titel as nombre, interpret as password,jahr as año from usuario  nombre id=:id AND jahr=:anio");
           $consulta->execute(array(':id'=> $id,':anio'=> $anio));
           $consulta->execute();
           $usuarioBuscado= $consulta->fetchObject('usuario');
             return $usuarioBuscado;				

           
   }*/

   public function mostrarDatos()
   {
         return "Metodo mostar:".$this->nombre."  ".$this->password."  ".$this->id;
   }
}
?>
    
    
