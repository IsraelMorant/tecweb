<?php 

//Ejercicio 1
function multiplo(){


if (isset($_GET['numero'])&&isset($_GET['enviarNum'])) {
    $num=$_GET['numero'];
    if( $num%5==0 && $num%7==0 ){
echo "El numero es multiplo de 5 y 7 <br>";
}else{

    echo "El numero NO es multiplo de 5 y 7 <br>";
}
}else{

    $num=0;
}

}

//Ejercicio 2
function tresAleatorios($matriz,$termino,$fila){

if ($termino==true) {
   $total = $fila*3;
echo  $total. " Numeros obtenidos en  ".$fila." iteraciones <br>";

return;
}
 $impar=0;
    $par=0;
  //  $col1=0;
   // $col2=0;
  // $col3=0;
    $matriz[$fila][1]=random_int(100,999);
    $matriz[$fila][2]=random_int(100,999);
    $matriz[$fila][3]=random_int(100,999);
  //  $col1= $matriz[$fila][1];
  //  $col2= $matriz[$fila][2];
   // $col3= $matriz[$fila][3];
 

   // echo "Evaluaciones:".($col1 % 2). ($col2 % 2). ($col3 % 2);
    if( ($matriz[$fila][1] % 2) != 0 ) $impar+=1;
    if( ($matriz[$fila][2] % 2) == 0) $par+=1;
    if( ($matriz[$fila][3] % 2)!= 0) $impar+=1;

    if($impar == 2 && $par == 1) $termino=true;
   // echo "Numero de impares:".$impar. "Numero de pares".$par."<br>";
    echo $matriz[$fila][1] . " " . $matriz[$fila][2] . " ". $matriz[$fila][3] ."<br>";
    tresAleatorios($matriz,$termino,$fila + 1);


 
}

//Ejercicio 3
function encontrarNumero(){
    if(isset($_GET['numero'] ) && isset($_GET['enviarNum'])){
        $dado=$_GET['numero'];
        $termina=false;
        while ($termina==false) {
            $ale=rand(1,20);
            $auxRedo=ceil($ale);
            if (($ale-$auxRedo)==0) {
                if (($ale % $dado)==0) {
                    $termina=true;
                    echo "Numero encontrado: ".$ale."<br>";
                }
            }
        }
    }

    

}

//Ejercicio 4


function arregloAscii(){

    $arr=[];
    for ($i=97; $i <=122 ; $i++) { 

        $arr[$i]=chr($i);
    }

    echo "<h2>Tabla de Valores</h2>";
        echo "<table>";//Inicio de la tabla

        echo "<tr>";

        echo "<th>Indice</th>";
        echo "<th>Valor</th>";
        echo "</tr>";
    foreach ($arr as $key => $value) {
        

        

        echo "<tr>";
        echo "<td>".$key."</td>";
        echo "<td>".$value."</td>";
        echo "</tr>";

        
    }

    echo "</table>";//Fin de la tabla
}



function verificarSE(){



    if (isset($_POST['sexo']) && isset($_POST['edad']) && isset($_POST['verificar'])) {
       $sexo=$_POST['sexo'];
       $edad=$_POST['edad'];
       
        if ($sexo=="femenino" && $edad >= 18 && $edad <=35) {

            echo "Bienvenida, usted esta en el rango de edad permitido";

        }elseif ($sexo=="masculino" && $edad >= 18 && $edad <=35) {

             echo "Bienvenido, usted esta en el rango de edad permitido";
        }else {
            echo "Usted no se encuentra en el rango permitido de edad";
        }
                

        
    }
}


function buscarAuto(){


    //Creando el arreglo
    $autos= array(
        //Primer auto
        "UBN6338" =>array(
            "auto"=>array(
                "marca"=> "HONDA",
                 "modelo"=> "2020",
                 "tipo" => "camioneta",

            ),

            "propetario"=> array(

                "nombre" => "Alfonzo Esparza",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "C.U., Jardines de San Manuel",


            ),

        ),

    //Segundo auto

     
        "UBN6339" =>array(
            "auto"=>array(
                "marca"=> "MAZDA",
                 "modelo"=> "2019",
                 "tipo" => "sedan",

            ),

            "propetario"=> array(

                "nombre" => "Ma. del Consuelo Molina",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "97 oriente",


            ),

        ),


        //Tercero auto
         "UBN6340" =>array(
            "auto"=>array(
                "marca"=> "HONDAY",
                 "modelo"=> "2004",
                 "tipo" => "camioneta",

            ),

            "propetario"=> array(

                "nombre" => "Consuelo del Pilar",
                "ciudad" => "Puebla, Atlixco.",
                "direccion" => "20 Oriente",


            ),

        ),
        //Cuarto auto
          "UBN6341" =>array(
            "auto"=>array(
                "marca"=> "Mercedez",
                 "modelo"=> "2000",
                 "tipo" => "sedan",

            ),

            "propetario"=> array(

                "nombre" => "Pilar Pilar",
                "ciudad" => "Puebla, Chol.",
                "direccion" => "4 Oriente",


            ),

        ),

        //Quinto auto

          "UBN6342" =>array(
            "auto"=>array(
                "marca"=> "Mercedez",
                 "modelo"=> "2002",
                 "tipo" => "sedan",

            ),

            "propetario"=> array(

                "nombre" => "Mechor",
                "ciudad" => "Puebla, Chol.",
                "direccion" => "4 Poniente",


            ),

        ),
        //Sexto auto


         "UBN6343" =>array(
            "auto"=>array(
                "marca"=> "BMW",
                 "modelo"=> "2025",
                 "tipo" => "sedan",

            ),

            "propetario"=> array(

                "nombre" => "Baltazar Si",
                "ciudad" => "Puebla, Tepojuma.",
                "direccion" => "4 Sur",


            ),

        ),
        //Septimo auto
           "UBN6344" =>array(
            "auto"=>array(
                "marca"=> "Reanult",
                 "modelo"=> "2025",
                 "tipo" => "Deportivo",

            ),

            "propetario"=> array(

                "nombre" => "Vanessa ",
                "ciudad" => "Puebla, Atlixco.",
                "direccion" => "4 Sur",


            ),

        ),
        //Octavo auto

            "UBN6345" =>array(
            "auto"=>array(
                "marca"=> "Audi",
                 "modelo"=> "2020",
                 "tipo" => "Deportivo",

            ),

            "propetario"=> array(

                "nombre" => "Jorge De la fuente ",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "9 Norte",


            ),

        ),
        //Noveno auto

           "UBN6346" =>array(
            "auto"=>array(
                "marca"=> "Izuzu",
                 "modelo"=> "2020",
                 "tipo" => "Camion",

            ),

            "propetario"=> array(

                "nombre" => "Jose Martinez ",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "88 Norte",


            ),

        ),
        //Decimo auto

          "UBN6347" =>array(
            "auto"=>array(
                "marca"=> "GMC",
                 "modelo"=> "2010",
                 "tipo" => "Camioneta",

            ),

            "propetario"=> array(

                "nombre" => "Elizabeth ",
                "ciudad" => "Puebla, Tinaguismanalco.",
                "direccion" => "50 Norte",


            ),

        ),
        //Decimo Segundo auto


        "UBN6348" =>array(
            "auto"=>array(
                "marca"=> "FORD",
                 "modelo"=> "2005",
                 "tipo" => "Camioneta",

            ),

            "propetario"=> array(

                "nombre" => "Karol ",
                "ciudad" => "Puebla, Tinaguismanalco.",
                "direccion" => "790 Norte",


            ),

        ),
        //Decimo Tercero auto

         "UBN6349" =>array(
            "auto"=>array(
                "marca"=> "Chevrlolet",
                 "modelo"=> "2004",
                 "tipo" => "Sedan",

            ),

            "propetario"=> array(

                "nombre" => "Abril ",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "60 Oriente",


            ),

        ),
        //Decimo Cuarto auto

         "UBN6350" =>array(
            "auto"=>array(
                "marca"=> "Honda",
                 "modelo"=> "2007",
                 "tipo" => "Sedan",

            ),

            "propetario"=> array(

                "nombre" => "Meliza ",
                "ciudad" => "Puebla, Atlixco.",
                "direccion" => "33 Oriente",


            ),

        ),
        //Decimo Quinto auto

         "UBN6351" =>array(
            "auto"=>array(
                "marca"=> "Audi",
                 "modelo"=> "2007",
                 "tipo" => "Deportivo",

            ),

            "propetario"=> array(

                "nombre" => "Silvana ",
                "ciudad" => "Puebla, Atlixco.",
                "direccion" => "0 Oriente",


            ),

        ),
        

         //Decimo Quinto auto

         "UBN6352" =>array(
            "auto"=>array(
                "marca"=> "Mercedez",
                 "modelo"=> "2009",
                 "tipo" => "Deportivo",

            ),

            "propetario"=> array(

                "nombre" => "Heber ",
                "ciudad" => "Puebla, Atlixco.",
                "direccion" => "880 Oriente",


            ),

        ),

    );

    //Verificando el contenido del arreglo

   // print_r($autos);

   //Busqueda por matricula


   if (isset($_POST['matricula']) && isset($_POST['buscar'])) {
    $matricula = $_POST['matricula'];


    foreach ($autos as $matriculaKey => $datos) {


        if ($matriculaKey == $matricula) {
            echo "Dato encontrado Matricula: ". $matriculaKey. "<br>";
            echo "<h2>Datos del Auto: <br></h2>";
            foreach ($datos as $datoskey => $datosValue) {
                if ($datoskey == "auto") {
                   foreach ($datosValue as $key => $value) {
                    echo $key.":".$value."<br>";
                   }
                }
                
                if ($datoskey == "propetario") {
                    echo "<h2>Datos del Propetario: <br></h2>";
                   foreach ($datosValue as $key => $value) {
                    echo $key.":".$value."<br>";
                   }
                }
            }
        }
        
    }





    //Mostrad todos los autos registrados
if (isset($_POST["ver"])) {
   
   
    $cont=0;

    foreach ($autos as $matriculaKey => $datos) {

        
                $cont++;
            
            echo "<h2>Datos del Auto: No.".$cont." <br></h2>";

            echo "Matricula:".$matriculaKey."<br>";
            foreach ($datos as $datoskey => $datosValue) {
                if ($datoskey == "auto") {
                   foreach ($datosValue as $key => $value) {
                    echo $key.":".$value."<br>";
                   }
                }
                
                if ($datoskey == "propetario") {
                    echo "<h2>Datos del Propetario: No.".$cont. "<br></h2>";
                   foreach ($datosValue as $key => $value) {
                    echo $key.":".$value."<br>";
                   }
                }
            }
        
        
    }
   
} else {
    
}
  
   }






   
}

?>