<?php

require_once('ChannelViewingPeriod.php');
class Conversion
{
    public const NUM_OF_FIRST_ARGUMENT = 1;
    public const SPLIT_LENGTH = 2;

    public function dealConversion(ChannelViewingPeriod $channelViewingPeriod): void
    {
        $argument = array_slice($channelViewingPeriod->getArgument(), self::NUM_OF_FIRST_ARGUMENT);
        $argument = array_chunk($argument, self::SPLIT_LENGTH);
        $viewingPeriod = $this->createChannelViewingPeriod($argument);
        $channelViewingPeriod->changeViewingPeriod($viewingPeriod);
    }

    public function createChannelViewingPeriod(array $argument): array
    {
        $channelViewingPeriod = [];
        foreach ($argument as $argv) {
            $chan = $argv[0];
            $num = [$argv[1]];
            if (array_key_exists($chan, $channelViewingPeriod)) {
                $channelViewingPeriod[$chan] = array_merge($num, $channelViewingPeriod[$chan]);
            } else {
                $channelViewingPeriod[$chan] = $num;
            }
        }
        return $channelViewingPeriod;
    }
}
