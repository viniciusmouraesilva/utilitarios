<?php

class verificarDados {

	//nome dos dados em post separados por |. Exemplo: dado1|dado2
	
	public function verificarPostEGetPHP7($nomes_post) {	

		if(strstr($nomes_post,'|')) {

			$array = explode('|', $nomes_post);

			$total_enviado = count($array);

			$i = 0;

			$dados = [];

			while($i < $total_enviado) {

				//operador null colesce
				$dados["{$array[$i]}"] = $_POST["{$array[$i]}"] ?? $_GET["{$array[$i]}"] ?? '';

				$i++;
			}

			return $dados;	

		}else {
			return '';
		}
	}

	public function limparString($dado) {

		try {

			if(is_string($dado)) {

				$filtrado = filter_var($dado,FILTER_SANITIZE_STRING);

				return $filtrado;

			}else {
				throw new Exception();
			}

		}catch(Exception $ex) {
			return '';
		}
	}

}
