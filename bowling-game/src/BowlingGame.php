<?php

class BowlingGame
{
    protected $rolls = [];

    protected $frameScore = [];

    protected $previous = 0;

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $roll = 0;

        for ($frame = 1; $frame < 10; $frame++) {
            $this->frameScore[$frame] = 0;

            if ($this->scoredASpare($roll)) {
                $this->frameScore[$frame] += $this->rolls[$roll];
                $roll += 2;
            } else if ($this->scoredAStrike($roll)) {
                $this->frameScore[$frame] += $this->rolls[$roll] + $this->rolls[$roll+1];
                $roll += 1;
            } else {
                $this->frameScore[$frame] += $this->rolls[$roll] + $this->rolls[$roll+1];
                $roll += 2;
            }
        }

        return array_sum($frameScore);
    }

    public function scoredASpare($roll) {
        return $this->rolls[$roll] + $this->rolls[$roll+1] == 10;
    }

    public function scoredAStrike($roll) {
        return $this->rolls[$roll] == 10;
    }
}
