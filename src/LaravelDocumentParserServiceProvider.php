<?php
declare(strict_types=1);

namespace ArtMksh\LaravelFileParser;

use ArtMoksh\DocumentParserLaravel\DocumentParserManager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelDocumentParserServiceProvider extends PackageServiceProvider
{
    public function packageRegistered()
    {
        $this->app->singleton(DocumentParserManager::class, function () {

            $manager = new DocumentParserManager;

            $parsers = collect(config('document-parser.parsers', []));

            $parsers->each(function ($parser, $type) use ($manager) {

                $manager->registerParser($type, app()->make($parser));
            });

            return $manager;
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-document-parser')
            ->hasConfigFile();
    }
}