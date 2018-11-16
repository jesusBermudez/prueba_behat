Proyecto prueba técnica de Mango 
============================================
# Aclaraciones y notas para ejecutar el codigo

## Software que necesitamos para utilizar behat con selenium

Necesitaremos que se tenga instalado los siguientes lenguajes y herramientas:

         - php 7.1
         - composer: https://getcomposer.org/doc/00-intro.md

## Descargar la ultima version chromedriver si el sistema operativo es Linux

Si utilizas linux hay que descargar la ultima version  en el siguiente link:

http://chromedriver.chromium.org/downloads

Nota: en el caso de utilizar mac no hace falta hacer nada

## Levantar selenium con chromedriver

Ejecutar el siguiente comando para levantar selenium standalone:

$ java -jar -Dwebdriver.chrome.driver=./bin/chromedriver  bin/selenium-server-standalone-3.4.0.jar 

## Ejecutar la feature para ver como interactua con la web

    - Ejecutar el comando php composer.phar install la primera vez antes de empezar a trabjar con behat
    para instalar las dependencias
    
    - Luego lanzando este sencillo comando dentro del proyecto "$ bin/behat" funcionara correctamente.

## Problemas encontrados durante la prueba 

    - El comportamiento de la web a traves del test e2e y manual para las pruebas no se comportaba igual.
    - No me ha sido posible comparar las cantidades he mirado desde el DOM y conseguia obetener la cantidad
    pero luego con el test no me era posible.
    - Entiendo que la parte de escribir los scenarios hacian referencia al registro por lo que decia el enunciado.
    - No me ha dado tiempo a trabajar con la parte de Maven tal y como habia hablado con Ferran.
    - Tenia la duda de que si el test tenia que en la segunda vez que selecciona el producto tiene que volver
    a ser el mismo o el producto es otro diferente(no me ha sido posible preguntarlo antes de las 15H).
    - Pienso que detallo suficiente para poder ejecutar el codigo con Behat igualmente cualquier consulta me 
    podies contacatar cuando deseeis.
    - Me ha llevado algo mas de tiempo de lo estipulado que seria en un inicio.



