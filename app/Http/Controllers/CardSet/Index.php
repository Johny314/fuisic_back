<?php

namespace App\Http\Controllers\CardSet;

use App\Data\Card\CardSet as Data;
use App\Models\Card\CardSet as CardSetModel;
use App\Enums\Uri;
use App\OpenApi\Get;
use App\OpenApi\Parameter\Filter;
use App\OpenApi\Parameter\Page;
use App\OpenApi\Parameter\PerPage;
use App\OpenApi\Parameter\Sort;
use App\OpenApi\Response\IndexPaginatedResponse;
use App\OpenApi\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\LaravelData\PaginatedDataCollection;
use Spatie\QueryBuilder\QueryBuilder;

class Index extends Controller
{
    #[Get(
        path: Uri::card_set,
        tag: Tag::card_set,
        summary: 'Список наборов карточек, с пагинацией',
    )]
    #[Sort(['id', 'name'])]
    #[Filter(name: 'name', example: 'Основы алгебры')]
    #[Page]
    #[PerPage]

    #[IndexPaginatedResponse(Data::class, description: 'Список наборов карточек')]
    public function __invoke(Request $request): PaginatedDataCollection
    {
        $models = QueryBuilder::for(CardSetModel::query())
            ->allowedSorts(['id', 'name'])
            ->allowedFilters(['name'])
            ->orderByDesc('created_at')
            ->paginate(
                perPage: $request->per_page,
                page: $request->page
            );

        return Data::collect($models, PaginatedDataCollection::class);
    }
}
