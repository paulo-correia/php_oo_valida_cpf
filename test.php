<?php

include "cpf.class.php";
$cpf = new Cpf();
echo $cpf->limpa_caracteres("loL.OOO.OOO/lL");
echo "<br>\n";
echo $cpf->valida_cpf("111.111.111-11");
