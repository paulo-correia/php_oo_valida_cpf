<?php
class Cpf {
        public function limpa_caracteres ($str_input) {
                $str_ret=null;
                for ($x=0; $x<strlen($str_input); $x++) {
                        if ( $str_input[$x]=="." || $str_input[$x]=="/" || $str_input[$x]=="-") {
                                continue;
                        }
                        if ($str_input[$x]=="o" || $str_input[$x]=="O") {
                                $str_ret.=0;
                                continue;
                        }
                        if ($str_input[$x]=="l" || $str_input[$x]=="L") {
                                $str_ret.=1;
                                continue;
                        }
                        $str_ret.=$str_input[$x];
                }
                return $str_ret;
        }
        public function mod11 ($str_input, $int_size) {
                $soma=0;
                $resto=0;
                $mult=0;
                for ($x=0; $x< $int_size; $x++) {
                        if ($int_size == 9 ) {
                                $mult=10-$x;
                        }
                        if ($int_size == 10 ) {
                                $mult=11-$x;
                        }
                        $soma+=intval($str_input[$x]) * $mult;
                }
                $resto=$soma % 11;
                if ($resto < 2 ) {
                        $ret_digito=0;
                } else {
                        $ret_digito=11 - $resto;
                }
                return $ret_digito;
        }
        public function valida_cpf ($str_input) {
                if (strlen($str_input)<1 || strlen($str_input)<11) {
                        return "Cpf Invalido !";
                }
                for ($y=0; $y<10; $y++) {
                        $str_cpf="";
                        for ($z=0;$z<11; $z++) {
                                $str_cpf.=$y;
                                $arr_cpfs_invalidos[$y]=$str_cpf;
                        }
                }
                if (in_array(self::limpa_caracteres($str_input), $arr_cpfs_invalidos)) {
                        return "Cpf Invalido !";
                }
                $cpf_limpo=self::limpa_caracteres($str_input);
                $digito1=self::mod11($cpf_limpo, 9);
                $digito2=self::mod11($cpf_limpo, 10);
                if  ( ($cpf_limpo[9]==$digito1) && ($cpf_limpo[10]==$digito2) ) {
                        return "Cpf Valido !";
                } else {
                        return "Cpf Invalido !";
                }
        }
}
