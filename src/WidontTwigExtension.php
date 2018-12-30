<?php
declare(strict_types=1);

namespace src\app\http\twigextensions;

use Twig_Filter;
use Twig_Markup;
use Twig_Extension;

class WidontTwigExtension extends Twig_Extension
{
    public function getFilters(): array
    {
        return [new Twig_Filter('widont', [$this, 'widontFilter'])];
    }

    private function widont(string $str): string
    {
        // This regex is a beast, tread lightly
        $widontTest = "/([^\s])\s+(((<(a|span|i|b|em|strong|acronym|caps|sub|sup|abbr|big|small|code|cite|tt)[^>]*>)*\s*[^\s<>]+)(<\/(a|span|i|b|em|strong|acronym|caps|sub|sup|abbr|big|small|code|cite|tt)>)*[^\s<>]*\s*(<\/(p|h[1-6]|li)>|$))/i";

        return preg_replace($widontTest, '$1&nbsp;$2', $str);
    }

    public function widontFilter(string $str): Twig_Markup
    {
        return new Twig_Markup($this->widont($str), 'UTF-8');
    }
}
