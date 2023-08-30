<?php

require_once('ChannelViewingPeriod.php');
class Calculator
{
    public const NUM_OF_SIXTY_MINUTES = 60;
    public function calcViewingPeriodTotal(ChannelViewingPeriod $channelViewingPeriod): void
    {
        $viewingPeriod = [];
        foreach ($channelViewingPeriod->getViewingPeriod() as $period) {
            $viewingPeriod = array_merge($period, $viewingPeriod);
        }
        $totalPeriod = array_sum($viewingPeriod);
        $totalMinutes = round(($totalPeriod / self::NUM_OF_SIXTY_MINUTES), 1);
        $channelViewingPeriod->changeViewingPeriodTotal($totalMinutes);
    }
}
