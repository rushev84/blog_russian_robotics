<?php

namespace App\Orchid\Resources;

use App\Models\Category;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;

class PostResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->title('Title')
                ->placeholder('Enter title here'),

//            Input::make('description')
//                ->title('Description')
//                ->placeholder('Enter description here'),

            TextArea::make('description')
                ->rows(20),

            Select::make('category_id')
                ->title('Category')
                ->fromModel(Category::class, 'name'),

            Input::make('slug')
                ->title('Slug')
                ->placeholder('Enter slug here'),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id')
                ->width('100px'),
            TD::make('title')
                ->width('800px'),
//            TD::make('description')
//                ->width('600px'),

//            TD::make('created_at', 'Date of creation')
//                ->render(function ($model) {
//                    return $model->created_at->toDateTimeString();
//                })
//                ->width('100px'),
//
//            TD::make('updated_at', 'Update date')
//                ->render(function ($model) {
//                    return $model->updated_at->toDateTimeString();
//                })
//                ->width('100px'),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('title'),
            Sight::make('description'),
            Sight::make('content'),
            Sight::make('category')
                ->render(function ($post) {
                    return $post->category->name;
                }),
            Sight::make('slug'),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
