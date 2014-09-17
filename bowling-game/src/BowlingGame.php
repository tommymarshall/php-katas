<?php

class BowlingGame
{
    const FRAMES_PER_GAME = 10;

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

        for ($frame = 1; $frame <= self::FRAMES_PER_GAME; $frame++) {
            if ($this->rolledAStrike($roll)) {
                $this->frameScore[$frame] = 10 + $this->strikeBonus($roll);

                $roll += 1;
            } else if ($this->rolledASpare($roll)) {
                $this->frameScore[$frame] = 10 + $this->spareBonus($roll);

                $roll += 2;
            } else {
                $this->frameScore[$frame] = $this->scoreNormally($roll);

                $roll += 2;
            }
        }

        return array_sum($this->frameScore);
    }

    protected function rolledASpare($roll) {
        return $this->rolls[$roll] + $this->rolls[$roll+1] == 10;
    }

    protected function rolledAStrike($roll) {
        return $this->rolls[$roll] == 10;
    }

    protected function strikeBonus($roll) {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    protected function spareBonus($roll) {
        return $this->rolls[$roll + 2];
    }

    protected function scoreNormally($roll) {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

}
