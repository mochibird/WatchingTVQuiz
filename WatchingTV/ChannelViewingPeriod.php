<?php

namespace WatchingTV;

require_once('Converter.php');
require_once('Calculator.php');

use WatchingTV\Converter;
use WatchingTV\Calculator;

class ChannelViewingPeriod
{
    public function __construct(
        private array $argument,
        private ?Converter $converter = null,
        private ?Calculator $calculator = null,
        private array $viewingPeriod = [],
        private float $viewingPeriodTotal = 0
    ) {
        $this->argument = $argument;
        $this->converter = new Converter();
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
        $this->converter->dealConversion($this);
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
