<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Book extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Book>
     */
    public static $model = \App\Models\Book::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        "title",
        "genre",
        "published_date",
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Image::make("Cover", "cover_pic")
                ->disk("public")
                ->disableDownload()
                ->squared(),

            Text::make("Title")
                ->sortable()
                ->required()
                ->creationRules("unique:books,title")
                ->updateRules("unique:books,title,{{resourceId}}"),

            Number::make("Pages", "page_no")
                ->rules("required", "min:1", "max:10000")
                ->filterable()
                ->hideFromIndex(),

            Number::make("Copies", "copies")
                ->sortable()
                ->required()
                ->help("The number of all the copies are available"),

            Boolean::make("Featured", "is_featured")
                ->help("Whether this book is featured on the homepage.")
                ->filterable(),

            // Select::make("Genre", "genre")->options([
            //     "Love" => "Love Story",
            //     "Issekai" => "Reincarnation",
            //     "Horror" => "Horror and Thriller",
            //     "Story" => "Story or slice of life",
            // ]),

            Trix::make("Blurb", "blurb"),

            Date::make("Published On", "published_date"),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
