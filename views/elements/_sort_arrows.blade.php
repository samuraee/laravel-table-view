<a class="pull-right {{in_array(config('app.locale'), ['fa', 'ar']) ? 'm-l-5' : 'm-r-5'}}" href="{{ $tableView->present()->sortArrowAnchorTagLinkForColumnWithName( $columnName ) }}">
    <i class="{{ $tableView->present()->sortArrowIconClassForColumnWithName( $columnName ) }}"></i>
</a>
