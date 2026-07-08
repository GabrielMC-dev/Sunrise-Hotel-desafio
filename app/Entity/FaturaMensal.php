<?php

namespace app\Entity;

require_once 'app/Db/Database.php';
use app\Db\Database;

require_once 'app/Entity/Hospedagem.php';
use app\Entity\Hospedagem;

use \PDO;


class FaturaMensal {
   public $id;
   public $ano;
   public $mes;
   public $totalHgem;
   public $faturamento;
//--------------------------------------------------------------------------//
public function cadastrarFaturamento() {
   $anoAtual =(int)date('Y');
   $mesAtual = (int)date('m');

   $hgem = new Hospedagem;
   $this->totalHgem = $hgem->getHospedagensTotMes($anoAtual,$mesAtual)[0]->total_qtd;
   $this->faturamento = $hgem->getFaturaMensal($anoAtual, $mesAtual)[0]->{'SUM(valor_tot)'};
   if($this->faturamento==null) {
         $this->faturamento = 0.00;
      }

   $existeFaturamento = $this->getFaturamento($anoAtual, $mesAtual);
   if(isset($existeFaturamento[0]->id)) {
      $this->id = $existeFaturamento[0]->id;
      $update = new Database('fatura_mensal');
      $update->updateFaturaMes($this->totalHgem, $this->faturamento, $this->id);
   }
   else {
      $this->ano = $anoAtual;
      $this->mes = $mesAtual;

      $insert = new Database('fatura_mensal');
      $insert->insert([
                        'id'                => $this->id,
                        'ano'               => $this->ano,
                        'mes'               => $this->mes,
                        'total_hospedagens' => $this->totalHgem,
                        'faturamento_total' => $this->faturamento
                     ]);
      }
}

public function getFaturamentos() {
   return (new Database('fatura_mensal'))->selectFatMen(null,null,null)
                                         ->fetchAll(PDO::FETCH_OBJ);
}

public function getFaturamento($ano,$mes) {
   return (new Database('fatura_mensal'))->selectFatMen(true,$ano,$mes)
                                         ->fetchAll(PDO::FETCH_OBJ);
}

}