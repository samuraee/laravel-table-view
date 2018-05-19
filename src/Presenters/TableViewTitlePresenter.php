<?php

namespace Tartan\LaravelTableView\Presenters;

use Request;

class TableViewTitlePresenter
{
    /**
     * @param Tartan\LaravelTableView\LaravelTableView $laravelTableView
     * @param int $dataCollectionSize
     * @return string
     */
    public static function formattedTitle( $laravelTableView, $dataCollectionSize )
    {
        $modelName = $laravelTableView->name();

        if ( $dataCollectionSize !== 1 )
        {
            $modelName = str_plural( $modelName );
        }

        return self::titleWithTableFilters( $modelName, $dataCollectionSize );
    }

    /**
     * @param string $modelName
     * @param int $dataCollectionSize
     * @return string
     */
    private static function titleWithTableFilters( $modelName, $dataCollectionSize )
    {
        $title = $dataCollectionSize > 0 ? number_format($dataCollectionSize) : 0;

        if ( ! Request::has('q') )
        {
            return trans('dt.total_entity', ['entity' => trans('dt.entity.'.$modelName), 'no' => $title]);
        }

        return trans('dt.total_entity_filtered', ['entity' => trans('dt.entity.'.$modelName), 'no' => $title, 'q' => Request::get('q')]);
    }
}