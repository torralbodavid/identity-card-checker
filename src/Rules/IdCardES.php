<?php

namespace Torralbodavid\IdentityCardChecker\Rules;

use Illuminate\Contracts\Validation\Rule;

class IdCardES implements Rule
{
    private const REGEX = [
        'dni' => '/^(([KLM]\d{7})|(\d{8}))([A-Z])$/',
        'nie' => '/^[XYZ]\d{7,8}[A-Z]$/',
        'cif' => '/^([ABCDEFGHJNPQRSUVW])(\d{7})([0-9A-J])$/',
    ];
    private const DNI_VALIDATION_CHARS = 'TRWAGMYFPDXBNJZSQVHLCKE';
    private const NIE_VALIDATION_CHARS = 'XYZ';
    private string $idCard;

    public function passes($attribute, $value)
    {
        if ($value === null) {
            return false;
        }

        $this->idCard = $value;

        foreach (self::REGEX as $type => $regex) {
            if (preg_match($regex, $this->idCard)) {
                return $this->{$type}();
            }
        }

        return false;
    }

    public function message()
    {
        return "identity-card-checker::messages.incorrect_id_card";
    }

    /**
     * @inerhitDoc http://www.interior.gob.es/ca/web/servicios-al-ciudadano/dni/calculo-del-digito-de-control-del-nif-nie
     * @return bool
     */
    private function dni(): bool
    {
        $idNumber = filter_var($this->idCard, FILTER_SANITIZE_NUMBER_INT);
        $validationNumber = $idNumber % 23;
        $char = self::DNI_VALIDATION_CHARS[$validationNumber];

        if ($this->idCard === $idNumber . $char) {
            return true;
        }

        return false;
    }

    /**
     * @inerhitDoc https://www.mapa.gob.es/app/materialvegetal/docs/CIF.pdf
     * @return bool
     */
    private function cif(): bool
    {
        $validation = $this->idCard[2] + $this->idCard[4] + $this->idCard[6];

        for ($i = 1; $i < 8; $i += 2) {
            $validation += (int)substr((2 * $this->idCard[$i]), 0, 1) + (int)substr((2 * $this->idCard[$i]), 1, 1);
        }

        $n = 10 - substr($validation, strlen($validation) - 1, 1);

        if ($this->idCard[8] == chr(64 + $n) || $this->idCard[8] == substr($n, strlen($n) - 1, 1)) {
            return true;
        }

        return false;
    }

    /**
     * @inerhitDoc http://www.interior.gob.es/ca/web/servicios-al-ciudadano/dni/calculo-del-digito-de-control-del-nif-nie
     * @return bool
     */
    private function nie(): bool
    {
        $charPosition = strpos(self::NIE_VALIDATION_CHARS, $this->idCard[0]);
        $idNumber = filter_var($this->idCard, FILTER_SANITIZE_NUMBER_INT);
        $validationNumber = ($charPosition . $idNumber) % 23;
        $char = self::DNI_VALIDATION_CHARS[$validationNumber];

        if ($this->idCard === $this->idCard[0] . $idNumber . $char) {
            return true;
        }

        return false;
    }
}
