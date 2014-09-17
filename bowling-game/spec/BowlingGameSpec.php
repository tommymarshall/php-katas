<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    function it_scores_a_gutter_game_as_zero()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->roll(0);
        }

        $this->score()->shouldBe(0);
    }

    function it_scores_the_sum_of_all_knocked_down_pins_for_a_game()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->roll(1);
        }

        $this->score()->shouldBe(20);
    }

    function it_score_130_for_all_spares_and_gutters_on_last_two_frames()
    {
        for ($i = 0; $i < 18; $i++) {
            $this->roll(5);
        }
        $this->roll(0);
        $this->roll(0);

        $this->score()->shouldBe(130);
    }

    function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $this->roll(2);
        $this->roll(8);
        $this->roll(5);

        for ($i = 0; $i < 17; $i++) {
            $this->roll(0);
        }

        $this->score()->shouldBe(20);
    }

    function it_scores_150_for_a_very_spuradic_game()
    {
        $this->roll(8);
        $this->roll(0);
        $this->roll(3);
        $this->roll(6);
        $this->roll(10);
        $this->roll(10);
        $this->roll(4);
        $this->roll(5);
        $this->roll(10);
        $this->roll(9);
        $this->roll(1);
        $this->roll(2);
        $this->roll(7);
        $this->roll(10);
        $this->roll(3);
        $this->roll(7);
        $this->roll(10);

        $this->score()->shouldBe(150);
    }

    function it_scores_300_for_a_perfect_game()
    {
        for ($i = 0; $i < 12; $i++) {
            $this->roll(10);
        }

        $this->score()->shouldBe(300);
    }

    function it_scores_30_for_a_late_bloomer_game()
    {
        for ($i = 0; $i < 18; $i++) {
            $this->roll(0);
        }

        for ($j = 0; $j < 3; $j++) {
            $this->roll(10);
        }

        $this->score()->shouldBe(30);
    }

    function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $this->roll(10);
        $this->roll(3);
        $this->roll(3);

        for ($i = 0; $i < 17; $i++) {
            $this->roll(0);
        }

        $this->score()->shouldBe(22);
    }
}
