<?php

require_once('Conversion.php');
require_once('Calculator.php');

class ChannelViewingPeriod
{
    public function __construct(
        private array $argument,
        private ?Conversion $conversion = null,
        private ?Calculator $calculator = null,
        private array $viewingPeriod = [],
        private float $viewingPeriodTotal = 0
    ) {
        $this->argument = $argument;
        $this->conversion = new Conversion();
        $this->calculator = new Calculator();
    }
    public function getArgument(): array
    {
        return $this->argument;
    }

    public function getViewingPeriod(): array
    {
        return $this->viewingPeriod;
    }
    public function changeViewingPeriod(array $period): void
    {
        $this->viewingPeriod = $period;
    }

    public function changeViewingPeriodTotal(float $period): void
    {
        $this->viewingPeriodTotal = $period;
    }

    public function startProgram(): void
    {
        $this->conversionToArgument();
        $this->resultToDisplay();
        $this->end();
    }
    public function conversionToArgument(): void
    {
        $this->conversion->dealConversion($this);
    }

    private function resultToDisPlay(): void
    {
        $this->calculator->calcViewingPeriodTotal($this);
        echo $this->viewingPeriodTotal . PHP_EOL;
        foreach ($this->viewingPeriod as $channel => $period) {
            echo $channel . ' ' . array_sum($period) . ' ' . count($period) . PHP_EOL;
        }
    }
    private function end(): void
    {
        exit();
    }
}
