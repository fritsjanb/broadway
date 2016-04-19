<?php

/*
 * This file is part of the broadway/broadway package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Broadway\Domain\Testing;

use Broadway\Domain\DateTime;

interface DateTimeGenerator
{
    /**
     * @return DateTime
     */
    public function generate();
}
