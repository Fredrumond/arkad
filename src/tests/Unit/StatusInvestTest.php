<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
Use App\Components\StatusInvest;

class StatusInvestTest extends TestCase
{
    public function createStatusInvestName($value,$type)
    {
        $statusInvest = new StatusInvest();
        $statusInvest->setName($value,$type);
        return $statusInvest;
    }

    public function createStatusInvesElement($value)
    {
        $statusInvest = new StatusInvest();
        $statusInvest->setElement($value);
        return $statusInvest;
    }

    public function testSetNameAcao()
    {
        $statusInvest = $this->createStatusInvestName('VIVT3 - TELEFÔNICA BRASIL ON: cotação e indicadores','acoes');
        $this->assertEquals('VIVT3 - TELEFÔNICA BRASIL ',$statusInvest->getName());
    }

    public function testSetNameFundo()
    {
        $statusInvest = $this->createStatusInvestName('HSML11 - HSI MALL FDO INV IMOB: dividendos e cotação','fundos');
        $this->assertEquals('HSML11 - HSI MALL FDO INV IMOB',$statusInvest->getName());
    }

    public function testCurrentPrice()
    {
        $statusInvest = $this->createStatusInvesElement('Valor atualR$48,79 arrow_downward-0,73%');
        $this->assertEquals('48,79',$statusInvest->currentPrice());
    }

    public function testCurrentVariation()
    {
        $statusInvest = $this->createStatusInvesElement('Valor atualR$48,79 arrow_downward-0,73%');
        $this->assertEquals('-0,73%',$statusInvest->currentVariation());
    }

    public function testMinPriceLastWeekends()
    {
        $statusInvest = $this->createStatusInvesElement('Min. 52 semanasR$39,35Min. mêsR$ 48,79');
        $this->assertEquals('39,35',$statusInvest->minPriceLastWeekends());
    }

    public function testMinPriceMonth()
    {
        $statusInvest = $this->createStatusInvesElement('Min. 52 semanasR$39,35Min. mêsR$ 48,79');
        $this->assertEquals('48,79',$statusInvest->minPriceMonth());
    }

    public function testMaxPriceLastWeekends()
    {
        $statusInvest = $this->createStatusInvesElement('Máx. 52 semanasR$50,92Máx. mêsR$ 49,15');
        $this->assertEquals('50,92',$statusInvest->maxPriceLastWeekends());
    }

    public function testMaxPriceMonth()
    {
        $statusInvest = $this->createStatusInvesElement('Máx. 52 semanasR$50,92Máx. mêsR$ 49,15');
        $this->assertEquals('49,15',$statusInvest->maxPriceMonth());
    }

    // public function testDividendYield()
    // {
    //     $value = 'Dividend Yieldhelp_outlineIndicador utilizado para relacionar os proventos pagos por uma companhia e o preço atual de suas ações.Observação:O Dividend Yield foi calculado com base no valor bruto dos proventos com a DATA COM entre 03/03/2021 e 03/03/2022. Amortizações não são consideradas no cálculo.7,14%Últimos 12 mesesR$ 3,4811';
    //     $statusInvest = new StatusInvest();
    //     $statusInvest->setElement($value);
    //     print_r($statusInvest->dividendYield());
    //     $this->assertContains('[percent]', $statusInvest->dividendYield());
    //     $this->assertContains('[value]', $statusInvest->dividendYield());
    // }
}
