<?php
/**
 * This file is part of Phiremock.
 *
 * Phiremock is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Phiremock is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Phiremock.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Mcustiel\Phiremock\Client\Utils;

use Mcustiel\Phiremock\Domain\Condition;
use Mcustiel\Phiremock\Domain\Conditions\MatchersEnum;

class Is
{
    /**
     * @param mixed $value
     *
     * @return \Mcustiel\Phiremock\Domain\Condition
     */
    public static function equalTo($value)
    {
        return new Condition(MatchersEnum::EQUAL_TO, $value);
    }

    /**
     * @param string $value
     *
     * @return \Mcustiel\Phiremock\Domain\Condition
     */
    public static function matching($value)
    {
        return new Condition(MatchersEnum::MATCHES, $value);
    }

    /**
     * @param string $value
     *
     * @return \Mcustiel\Phiremock\Domain\Condition
     */
    public static function sameStringAs($value)
    {
        return new Condition(MatchersEnum::SAME_STRING, $value);
    }

    /**
     * @param string $value
     *
     * @return \Mcustiel\Phiremock\Domain\Condition
     */
    public static function containing($value)
    {
        return new Condition(MatchersEnum::CONTAINS, $value);
    }

    /**
     * @param string|array|\JsonSerializable $value
     *
     * @return \Mcustiel\Phiremock\Domain\Condition
     */
    public static function sameJsonObjectAs($value)
    {
        if (\is_string($value)) {
            return new Condition(MatchersEnum::SAME_JSON, $value);
        }

        return new Condition(MatchersEnum::SAME_JSON, json_encode($value));
    }
}