<?php
declare(strict_types=1);

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace buzzingpixel\twigwidont;

use Twig\TwigFilter;
use Twig\Markup;
use Twig\Extension\AbstractExtension;

class WidontTwigExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [new TwigFilter('widont', [$this, 'widontFilter'])];
    }

    private function widont(string $str): string
    {
        // This regex is a beast, tread lightly
        $widontTest = "/([^\s])\s+(((<(a|span|i|b|em|strong|acronym|caps|sub|sup|abbr|big|small|code|cite|tt)[^>]*>)*\s*[^\s<>]+)(<\/(a|span|i|b|em|strong|acronym|caps|sub|sup|abbr|big|small|code|cite|tt)>)*[^\s<>]*\s*(<\/(p|h[1-6]|li)>|$))/i";

        return preg_replace($widontTest, '$1&nbsp;$2', $str);
    }

    public function widontFilter(string $str): Markup
    {
        return new Markup($this->widont($str), 'UTF-8');
    }
}
