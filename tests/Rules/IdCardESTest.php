<?php

namespace Torralbodavid\IdentityCardChecker\Tests;

use Torralbodavid\IdentityCardChecker\Rules\IdCardES;

class IdCardESTest extends TestCase
{
    public function test_validation_fails_if_user_input_is_null()
    {
        $rule = new IdCardES();
        $rule = $rule->passes('id_validation', null);

        $this->assertFalse($rule);
    }

    public function test_validation_fails_if_user_input_is_empty()
    {
        $rule = new IdCardES();
        $rule = $rule->passes('id_validation', '');

        $this->assertFalse($rule);
    }

    public function test_validation_fails_if_cif_is_incorrect()
    {
        $rule = new IdCardES();
        $rule = $rule->passes('id_validation', 'Z76365788');

        $this->assertFalse($rule);
    }

    public function test_validation_passes_if_cif_is_correct()
    {
        $rule = new IdCardES();
        $rule = $rule->passes('id_validation', 'A58818501');

        $this->assertTrue($rule);
    }

    public function test_validation_fails_if_dni_is_incorrect()
    {
        $rule = new IdCardES();
        $rule = $rule->passes('id_validation', '88345123D');

        $this->assertFalse($rule);
    }

    public function test_validation_passes_if_dni_is_correct()
    {
        $rule = new IdCardES();
        $rule = $rule->passes('id_validation', '12345678Z');

        $this->assertTrue($rule);
    }

    public function test_validation_fails_if_nie_is_incorrect()
    {
        $rule = new IdCardES();
        $rule = $rule->passes('id_validation', 'Z1234566R');

        $this->assertFalse($rule);
    }

    public function test_validation_passes_if_nie_is_correct()
    {
        $rule = new IdCardES();
        $rule = $rule->passes('id_validation', 'Z1234567R');

        $this->assertTrue($rule);
    }
}
