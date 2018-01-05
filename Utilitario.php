<?php

class verificarDados {

	public function verificarPostEGetPHP7($nomes_post) {	

		if(strstr($nomes_post,'|')) {

			$array = explode('|',$nomes_post);

			$total_enviado = count($array);

			$i = 0;

			$dados = [];

			//operador null colesce
			while($i < $total_enviado) {

				$dados["{$array[$i]}"] = $_POST["{$array[$i]}"] ?? $_GET["{$array[$i]}"] ?? '';

				$i++;
			}

			return $dados;	

		}else {
			return '';
		}
	}