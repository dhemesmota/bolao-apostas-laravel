@if (!$search && $list)
    <!-- quando usar a paginação do laravel -->
    <div class="d-flex justify-content-center">
        {{$list->links()}}
    </div>
@endif