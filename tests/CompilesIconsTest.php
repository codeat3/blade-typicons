<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeTypicons\BladeTypiconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('typ-adjust-brightness')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 6.934l1-2.934c.072-.213.078-.452 0-.682-.188-.553-.789-.848-1.341-.659-.553.189-.847.788-.659 1.341l1 2.934zM4 11c-.213-.072-.452-.078-.682 0-.553.188-.848.789-.659 1.341.189.553.788.847 1.341.659l2.934-1-2.934-1zM12 17.066l-1 2.934c-.072.213-.078.452 0 .682.188.553.789.848 1.341.659.553-.189.847-.788.659-1.341l-1-2.934zM21.341 11.657c-.188-.553-.788-.848-1.341-.659l-2.934 1 2.934 1c.213.072.452.078.682 0 .552-.188.847-.789.659-1.341zM5.636 7.05l2.781 1.367-1.367-2.781c-.1-.202-.265-.375-.482-.482-.524-.258-1.157-.042-1.415.482-.257.523-.041 1.157.483 1.414zM5.153 17.432c-.257.523-.041 1.156.482 1.414.523.257 1.157.041 1.414-.482l1.367-2.781-2.781 1.367c-.201.099-.374.263-.482.482zM18.363 16.949l-2.781-1.367 1.367 2.781c.1.202.264.375.482.482.523.257 1.156.041 1.414-.482s.042-1.157-.482-1.414zM18.844 6.566c.258-.524.042-1.157-.481-1.415-.523-.257-1.157-.041-1.414.482l-1.369 2.783 2.782-1.368c.202-.1.375-.264.482-.482zM12 7.5c-2.481 0-4.5 2.019-4.5 4.5s2.019 4.5 4.5 4.5 4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('typ-adjust-brightness', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 6.934l1-2.934c.072-.213.078-.452 0-.682-.188-.553-.789-.848-1.341-.659-.553.189-.847.788-.659 1.341l1 2.934zM4 11c-.213-.072-.452-.078-.682 0-.553.188-.848.789-.659 1.341.189.553.788.847 1.341.659l2.934-1-2.934-1zM12 17.066l-1 2.934c-.072.213-.078.452 0 .682.188.553.789.848 1.341.659.553-.189.847-.788.659-1.341l-1-2.934zM21.341 11.657c-.188-.553-.788-.848-1.341-.659l-2.934 1 2.934 1c.213.072.452.078.682 0 .552-.188.847-.789.659-1.341zM5.636 7.05l2.781 1.367-1.367-2.781c-.1-.202-.265-.375-.482-.482-.524-.258-1.157-.042-1.415.482-.257.523-.041 1.157.483 1.414zM5.153 17.432c-.257.523-.041 1.156.482 1.414.523.257 1.157.041 1.414-.482l1.367-2.781-2.781 1.367c-.201.099-.374.263-.482.482zM18.363 16.949l-2.781-1.367 1.367 2.781c.1.202.264.375.482.482.523.257 1.156.041 1.414-.482s.042-1.157-.482-1.414zM18.844 6.566c.258-.524.042-1.157-.481-1.415-.523-.257-1.157-.041-1.414.482l-1.369 2.783 2.782-1.368c.202-.1.375-.264.482-.482zM12 7.5c-2.481 0-4.5 2.019-4.5 4.5s2.019 4.5 4.5 4.5 4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('typ-adjust-brightness', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 6.934l1-2.934c.072-.213.078-.452 0-.682-.188-.553-.789-.848-1.341-.659-.553.189-.847.788-.659 1.341l1 2.934zM4 11c-.213-.072-.452-.078-.682 0-.553.188-.848.789-.659 1.341.189.553.788.847 1.341.659l2.934-1-2.934-1zM12 17.066l-1 2.934c-.072.213-.078.452 0 .682.188.553.789.848 1.341.659.553-.189.847-.788.659-1.341l-1-2.934zM21.341 11.657c-.188-.553-.788-.848-1.341-.659l-2.934 1 2.934 1c.213.072.452.078.682 0 .552-.188.847-.789.659-1.341zM5.636 7.05l2.781 1.367-1.367-2.781c-.1-.202-.265-.375-.482-.482-.524-.258-1.157-.042-1.415.482-.257.523-.041 1.157.483 1.414zM5.153 17.432c-.257.523-.041 1.156.482 1.414.523.257 1.157.041 1.414-.482l1.367-2.781-2.781 1.367c-.201.099-.374.263-.482.482zM18.363 16.949l-2.781-1.367 1.367 2.781c.1.202.264.375.482.482.523.257 1.156.041 1.414-.482s.042-1.157-.482-1.414zM18.844 6.566c.258-.524.042-1.157-.481-1.415-.523-.257-1.157-.041-1.414.482l-1.369 2.783 2.782-1.368c.202-.1.375-.264.482-.482zM12 7.5c-2.481 0-4.5 2.019-4.5 4.5s2.019 4.5 4.5 4.5 4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-typicons.class', 'awesome');

        $result = svg('typ-adjust-brightness')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 6.934l1-2.934c.072-.213.078-.452 0-.682-.188-.553-.789-.848-1.341-.659-.553.189-.847.788-.659 1.341l1 2.934zM4 11c-.213-.072-.452-.078-.682 0-.553.188-.848.789-.659 1.341.189.553.788.847 1.341.659l2.934-1-2.934-1zM12 17.066l-1 2.934c-.072.213-.078.452 0 .682.188.553.789.848 1.341.659.553-.189.847-.788.659-1.341l-1-2.934zM21.341 11.657c-.188-.553-.788-.848-1.341-.659l-2.934 1 2.934 1c.213.072.452.078.682 0 .552-.188.847-.789.659-1.341zM5.636 7.05l2.781 1.367-1.367-2.781c-.1-.202-.265-.375-.482-.482-.524-.258-1.157-.042-1.415.482-.257.523-.041 1.157.483 1.414zM5.153 17.432c-.257.523-.041 1.156.482 1.414.523.257 1.157.041 1.414-.482l1.367-2.781-2.781 1.367c-.201.099-.374.263-.482.482zM18.363 16.949l-2.781-1.367 1.367 2.781c.1.202.264.375.482.482.523.257 1.156.041 1.414-.482s.042-1.157-.482-1.414zM18.844 6.566c.258-.524.042-1.157-.481-1.415-.523-.257-1.157-.041-1.414.482l-1.369 2.783 2.782-1.368c.202-.1.375-.264.482-.482zM12 7.5c-2.481 0-4.5 2.019-4.5 4.5s2.019 4.5 4.5 4.5 4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-typicons.class', 'awesome');

        $result = svg('typ-adjust-brightness', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" version="1.2" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 6.934l1-2.934c.072-.213.078-.452 0-.682-.188-.553-.789-.848-1.341-.659-.553.189-.847.788-.659 1.341l1 2.934zM4 11c-.213-.072-.452-.078-.682 0-.553.188-.848.789-.659 1.341.189.553.788.847 1.341.659l2.934-1-2.934-1zM12 17.066l-1 2.934c-.072.213-.078.452 0 .682.188.553.789.848 1.341.659.553-.189.847-.788.659-1.341l-1-2.934zM21.341 11.657c-.188-.553-.788-.848-1.341-.659l-2.934 1 2.934 1c.213.072.452.078.682 0 .552-.188.847-.789.659-1.341zM5.636 7.05l2.781 1.367-1.367-2.781c-.1-.202-.265-.375-.482-.482-.524-.258-1.157-.042-1.415.482-.257.523-.041 1.157.483 1.414zM5.153 17.432c-.257.523-.041 1.156.482 1.414.523.257 1.157.041 1.414-.482l1.367-2.781-2.781 1.367c-.201.099-.374.263-.482.482zM18.363 16.949l-2.781-1.367 1.367 2.781c.1.202.264.375.482.482.523.257 1.156.041 1.414-.482s.042-1.157-.482-1.414zM18.844 6.566c.258-.524.042-1.157-.481-1.415-.523-.257-1.157-.041-1.414.482l-1.369 2.783 2.782-1.368c.202-.1.375-.264.482-.482zM12 7.5c-2.481 0-4.5 2.019-4.5 4.5s2.019 4.5 4.5 4.5 4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeTypiconsServiceProvider::class,
        ];
    }
}
