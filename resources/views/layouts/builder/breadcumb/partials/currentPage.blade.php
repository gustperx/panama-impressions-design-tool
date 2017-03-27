@if(isset($breadcrumb['currentPage']))

    <div class="pull-right">
        <i
                class="livicon icon3"

                data-name="{{ array_has($breadcrumb['currentPage'], 'data-name') ? $breadcrumb['currentPage']['data-name'] ? $breadcrumb['currentPage']['data-name'] : 'ghost' : 'eye-close' }}"

                data-size="{{ array_has($breadcrumb['currentPage'], 'data-size') ? $breadcrumb['currentPage']['data-size'] ? $breadcrumb['currentPage']['data-size'] : '20' : '20' }}"

                data-loop="{{ array_has($breadcrumb['currentPage'], 'data-loop') ? $breadcrumb['currentPage']['data-loop'] ? $breadcrumb['currentPage']['data-loop'] : 'true' : 'true' }}"

                data-c="{{ array_has($breadcrumb['currentPage'], 'data-c') ? $breadcrumb['currentPage']['data-c'] ? $breadcrumb['currentPage']['data-c'] : '#3d3d3d' : '#3d3d3d' }}"

                data-hc="{{ array_has($breadcrumb['currentPage'], 'data-hc') ? $breadcrumb['currentPage']['data-hc'] ? $breadcrumb['currentPage']['data-hc'] : '#3d3d3d' : '#3d3d3d' }}"
        >

        </i>

        {{ array_has($breadcrumb['currentPage'], 'title') ? $breadcrumb['currentPage']['title'] ? $breadcrumb['currentPage']['title'] : 'null' : 'no definido' }}

    </div>

@else

    {{-- No a definido la pagina actual --}}

@endif